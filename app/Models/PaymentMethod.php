<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentMethod extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'master_payment_methods';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'payment_method_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_payment_method',
    ];

    /**
     * Get the transaction sales for this payment method.
     */
    public function transactionSales()
    {
        return $this->hasMany(TransactionSale::class, 'payment_method_id', 'payment_method_id');
    }
}
