<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Helpers\TransactionHelper;
use Illuminate\Support\Facades\DB;

class TransactionSale extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'transaction_sales';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'transaction_sales_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'branch_id',
        'payment_method_id',
        'user_id',
        'customer_id',
        'sales_type_id',
        'number',
        'date',
        'notes',
        'subtotal',
        'discount_amount',
        'discount_percentage',
        'total_amount',
        'paid_amount',
        'change_amount',
        'whatsapp',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'date' => 'datetime',
        'subtotal' => 'decimal:2',
        'discount_amount' => 'decimal:2',
        'discount_percentage' => 'decimal:2',
        'total_amount' => 'decimal:2',
        'paid_amount' => 'decimal:2',
        'change_amount' => 'decimal:2',
    ];

    /**
     * Get the branch for this transaction.
     */
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'branch_id');
    }

    /**
     * Get the payment method for this transaction.
     */
    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id', 'payment_method_id');
    }

    /**
     * Get the user (cashier) for this transaction.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    /**
     * Get the customer for this transaction.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }

    /**
     * Get the sales type for this transaction.
     */
    public function salesType()
    {
        return $this->belongsTo(SalesType::class, 'sales_type_id', 'sales_type_id');
    }

    /**
     * Get the transaction details (items).
     */
    public function details()
    {
        return $this->hasMany(TransactionSaleDetail::class, 'transaction_sales_id', 'transaction_sales_id');
    }

    /**
     * Recalculate and update transaction totals
     */
    public function recalculateTotals()
    {
        return TransactionHelper::recalculateTransactionTotals($this->transaction_sales_id);
    }

    /**
     * Validate transaction consistency
     */
    public function validateConsistency()
    {
        return TransactionHelper::validateTransactionConsistency($this->transaction_sales_id);
    }

    /**
     * Get remaining amount to be paid
     */
    public function getRemainingAmountAttribute()
    {
        return $this->total_amount - ($this->paid_amount ?? 0);
    }

    /**
     * Check if transaction is fully paid
     */
    public function getIsPaidAttribute()
    {
        return ($this->paid_amount ?? 0) >= $this->total_amount;
    }

    /**
     * Get payment status
     */
    public function getPaymentStatusAttribute()
    {
        $paidAmount = $this->paid_amount ?? 0;
        
        if ($paidAmount <= 0) {
            return 'unpaid';
        } elseif ($paidAmount >= $this->total_amount) {
            return 'paid';
        } else {
            return 'partial';
        }
    }

    /**
     * Boot the model
     */
    protected static function boot()
    {
        parent::boot();

        // Generate transaction number automatically
        static::creating(function ($transaction) {
            if (empty($transaction->number)) {
                $transaction->number = TransactionHelper::generateTransactionNumber($transaction->date);
            }
        });

        // Removed the saved event listener that was causing infinite loop
        // The totals are now calculated directly in the controller
    }
}
