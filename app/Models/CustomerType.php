<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerType extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'master_customers_types';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'customer_type_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_customer_type',
    ];

    /**
     * Get the customers of this type.
     */
    public function customers()
    {
        return $this->hasMany(Customer::class, 'customer_type_id', 'customer_type_id');
    }

    /**
     * Get the item details (pricing) for this customer type.
     */
    public function itemDetails()
    {
        return $this->hasMany(ItemDetail::class, 'customer_type_id', 'customer_type_id');
    }
}
