<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
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

    protected $fillable = [
        'category_id',
        'name_item',
        'description_item',
        'ingredient_item',
        'netweight_item',
        'contain_item',
        'costprice_item',
    ];

    protected $casts = [
        'costprice_item' => 'decimal:2',
    ];

    // Accessor for backward compatibility
    public function getNameAttribute()
    {
        return $this->name_item;
    }

    public function getDescriptionAttribute()
    {
        return $this->description_item;
    }

    // Backward compatibility for sellingprice_item to costprice_item
    public function getSellingpriceItemAttribute()
    {
        // Use costprice_item as base and add markup
        return $this->costprice_item ? $this->costprice_item * 1.5 : 0;
    }

    public function setSellingpriceItemAttribute($value)
    {
        // This is just for compatibility, we don't store it
    }

    // Backward compatibility for sell_price
    public function getSellPriceAttribute()
    {
        return $this->getSellingpriceItemAttribute();
    }

    // Backward compatibility for stock_item
    public function getStockItemAttribute()
    {
        // Return a default stock value since it's not in database
        return 10;
    }

    public function setStockItemAttribute($value)
    {
        // This is just for compatibility, we don't store it
    }

    // Add stock attribute
    public function getStockAttribute()
    {
        // Return total stock across all branches, or default value
        $branchStock = $this->branchStocks()->sum('stock');
        return $branchStock > 0 ? $branchStock : 10; // Default to 10 if no branch stock
    }

    // Add unit_item attribute
    public function getUnitItemAttribute()
    {
        return 'pcs'; // Default unit
    }

    // Add image attribute
    public function getImageAttribute()
    {
        return null; // No images in this database structure
    }

    public function getPriceAttribute()
    {
        return $this->costprice_item;
    }

    public function getIsActiveAttribute()
    {
        return true; // Default to active since the new database doesn't have this field
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'product_id', 'item_id');
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
