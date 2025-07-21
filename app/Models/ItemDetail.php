<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemDetail extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'master_items_details';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'item_detail_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'item_id',
        'customer_type_id',
        'cost_price',
        'sell_price',
    ];

    /**
     * Get the item that owns the detail.
     */
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id', 'item_id');
    }

    /**
     * Get the customer type for this pricing.
     */
    public function customerType()
    {
        return $this->belongsTo(CustomerType::class, 'customer_type_id', 'customer_type_id');
    }
}
