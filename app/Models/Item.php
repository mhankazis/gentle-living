<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'master_items';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'item_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'name_item',
        'description_item',
        'ingredient_item',
        'netweight_item',
        'contain_item',
        'costprice_item',
    ];

    /**
     * Get the category that owns the item.
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    /**
     * Get the item details (pricing for different customer types).
     */
    public function details()
    {
        return $this->hasMany(ItemDetail::class, 'item_id', 'item_id');
    }

    /**
     * Get the branch stocks for this item.
     */
    public function branchStocks()
    {
        return $this->hasMany(ItemBranch::class, 'item_id', 'item_id');
    }
}
