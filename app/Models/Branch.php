<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'master_branches';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'branch_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
        'name_branch',
        'phone_branch',
        'address_branch',
    ];

    /**
     * Get the company that owns the branch.
     */
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'company_id');
    }

    /**
     * Get the users associated with this branch.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'master_users_branches', 'branch_id', 'user_id');
    }

    /**
     * Get the item stocks for this branch.
     */
    public function itemStocks()
    {
        return $this->hasMany(ItemBranch::class, 'branch_id', 'branch_id');
    }
}
