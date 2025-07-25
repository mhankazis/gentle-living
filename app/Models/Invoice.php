<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     * We use transaction_sales as the base for invoices
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

    protected $casts = [
        'date' => 'datetime',
        'subtotal' => 'decimal:2',
        'discount_amount' => 'decimal:2',
        'discount_percentage' => 'decimal:2',
        'total_amount' => 'decimal:2',
        'paid_amount' => 'decimal:2',
        'change_amount' => 'decimal:2',
    ];

    // Accessors for backward compatibility with existing Invoice views
    public function getInvoiceNumberAttribute()
    {
        return $this->number;
    }

    public function getAmountAttribute()
    {
        return $this->total_amount;
    }

    public function getStatusAttribute()
    {
        return $this->paid_amount >= $this->total_amount ? 'paid' : 'unpaid';
    }

    public function getDueDateAttribute()
    {
        return $this->date->addDays(30); // Default 30 days payment term
    }

    public function getPaidAtAttribute()
    {
        return $this->paid_amount >= $this->total_amount ? $this->updated_at : null;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'branch_id');
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id', 'payment_method_id');
    }

    public function salesType()
    {
        return $this->belongsTo(SalesType::class, 'sales_type_id', 'sales_type_id');
    }

    public function details()
    {
        return $this->hasMany(TransactionSaleDetail::class, 'transaction_sales_id', 'transaction_sales_id');
    }
}
