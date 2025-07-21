<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesType extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'master_sales_types';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'sales_type_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_sales_type',
    ];

    /**
     * Get the transaction sales for this sales type.
     */
    public function transactionSales()
    {
        return $this->hasMany(TransactionSale::class, 'sales_type_id', 'sales_type_id');
    }
}
