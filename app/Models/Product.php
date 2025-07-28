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

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'item_id';
    }

    protected $fillable = [
        'category_id',
        'name_item',
        'description_item',
        'ingredient_item',
        'netweight_item',
        'contain_item',
        'costprice_item',
        'sell_price',
        'stock',
        'unit_item',
    ];

    protected $casts = [
        'costprice_item' => 'decimal:2',
        'sell_price' => 'decimal:2',
        'stock' => 'integer',
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

    // Accessor for sellingprice_item - now reads from sell_price field
    public function getSellingpriceItemAttribute()
    {
        return $this->sell_price ?? ($this->costprice_item ? $this->costprice_item * 1.5 : 0);
    }

    public function setSellingpriceItemAttribute($value)
    {
        $this->attributes['sell_price'] = $value;
    }

    // Backward compatibility for sell_price
    public function getSellPriceAttribute($value)
    {
        return $value ?? ($this->costprice_item ? $this->costprice_item * 1.5 : 0);
    }

    // Accessor for stock_item - now reads from stock field
    public function getStockItemAttribute()
    {
        return $this->stock ?? 0;
    }

    public function setStockItemAttribute($value)
    {
        $this->attributes['stock'] = $value;
    }

    // Add stock attribute - now reads from database field
    public function getStockAttribute($value)
    {
        return $value ?? 0;
    }

    // Add unit_item attribute - now reads from database field
    public function getUnitItemAttribute($value)
    {
        return $value ?? 'pcs'; // Default unit if not set
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
