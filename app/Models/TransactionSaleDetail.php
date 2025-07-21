<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        'costprice',
        'sell_price',
        'subtotal',
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
        'costprice' => 'decimal:2',
        'sell_price' => 'decimal:2',
        'subtotal' => 'decimal:2',
        'discount_amount' => 'decimal:2',
        'discount_percentage' => 'decimal:2',
        'total_amount' => 'decimal:2',
    ];

    /**
     * Get the transaction sale for this detail.
     */
    public function transactionSale()
    {
        return $this->belongsTo(TransactionSale::class, 'transaction_sales_id', 'transaction_sales_id');
    }

    /**
     * Get the item for this detail.
     */
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id', 'item_id');
    }
}
