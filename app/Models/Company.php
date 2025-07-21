<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'master_companies';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'company_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_company',
        'phone_company',
        'address_company',
    ];

    /**
     * Get the users for the company.
     */
    public function users()
    {
        return $this->hasMany(User::class, 'company_id', 'company_id');
    }

    /**
     * Get the branches for the company.
     */
    public function branches()
    {
        return $this->hasMany(Branch::class, 'company_id', 'company_id');
    }

    /**
     * Get the customers for the company.
     */
    public function customers()
    {
        return $this->hasMany(Customer::class, 'company_id', 'company_id');
    }

    /**
     * Get the suppliers for the company.
     */
    public function suppliers()
    {
        return $this->hasMany(Supplier::class, 'company_id', 'company_id');
    }

    /**
     * Get the inventories for the company.
     */
    public function inventories()
    {
        return $this->hasMany(Inventory::class, 'company_id', 'company_id');
    }

    /**
     * Get the orders for the company (keeping backward compatibility).
     */
    public function orders()
    {
        return $this->hasMany(Order::class, 'company_id', 'company_id');
    }
}
