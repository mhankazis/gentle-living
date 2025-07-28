<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class TransactionSaleDetail extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'transaction_sales_details';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'transaction_sales_detail_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transaction_sales_id',
        'item_id',
        'qty',
        'quantity',
        'price',
        'costprice',
        'sell_price',
        'subtotal',
        'total',
        'discount_amount',
        'discount_percentage',
        'total_amount',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'qty' => 'integer',
        'quantity' => 'integer',
        'price' => 'decimal:2',
        'costprice' => 'decimal:2',
        'sell_price' => 'decimal:2',
        'subtotal' => 'decimal:2',
        'total' => 'decimal:2',
        'discount_amount' => 'decimal:2',
        'discount_percentage' => 'decimal:2',
        'total_amount' => 'decimal:2',
    ];

    /**
     * Get the transaction for this detail.
     */
    public function transaction()
    {
        return $this->belongsTo(TransactionSale::class, 'transaction_sales_id', 'transaction_sales_id');
    }

    /**
     * Get the item for this detail.
     */
    public function item()
    {
        return $this->belongsTo(Product::class, 'item_id', 'item_id');
    }

    /**
     * Calculate line total
     */
    public function getLineTotalAttribute()
    {
        $subtotal = ($this->qty ?? 0) * ($this->sell_price ?? 0);
        $discount = ($this->discount_amount ?? 0) + 
                   (($subtotal * ($this->discount_percentage ?? 0)) / 100);
        
        return $subtotal - $discount;
    }

    /**
     * Boot the model for automatic calculations
     */
    protected static function boot()
    {
        parent::boot();

        // Validate and calculate totals before saving
        static::saving(function ($detail) {
            // Ensure qty and price are positive
            if (($detail->qty ?? 0) <= 0) {
                $detail->qty = 1; // Set minimum quantity
            }
            
            if (($detail->sell_price ?? 0) <= 0) {
                $detail->sell_price = 0; // Set minimum price
            }

            // Calculate totals
            $subtotal = $detail->qty * $detail->sell_price;
            $discountAmount = ($detail->discount_amount ?? 0) + 
                             (($subtotal * ($detail->discount_percentage ?? 0)) / 100);
            
            $detail->subtotal = $subtotal;
            $detail->total_amount = $subtotal - $discountAmount;
        });

        // Update parent transaction totals after saving/deleting
        static::saved(function ($detail) {
            $detail->updateTransactionTotals();
        });

        static::deleted(function ($detail) {
            $detail->updateTransactionTotals();
        });
    }

    /**
     * Update parent transaction totals
     */
    protected function updateTransactionTotals()
    {
        if ($this->transaction_sales_id) {
            $calculatedSubtotal = self::where('transaction_sales_id', $this->transaction_sales_id)
                ->sum(DB::raw('qty * sell_price'));

            DB::table('transaction_sales')
                ->where('transaction_sales_id', $this->transaction_sales_id)
                ->update([
                    'subtotal' => $calculatedSubtotal,
                    'total_amount' => $calculatedSubtotal, // Assume no additional discounts for now
                    'updated_at' => now()
                ]);
        }
    }
}
