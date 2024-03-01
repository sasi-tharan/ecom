<?php

namespace App\Models;

use App\Models\Group;
use App\Models\SubGroup;
use App\Models\Department;
use App\Models\ProductImage;
use App\Models\ProductThumbnail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'department_id',
        'group_id',
        'sub_group_id',
        'sku',
        'barcode',
        'brand',
        'product_name',
        'description',
        'sg_1',
        'sg_2',
        'sg_3',
        'capacity',
        'units',
        'case',
        'dimension',
        'supplier_info',
        'cost_price_before_vat',
        'inventory_status',
        'location',
        'age_restricted',
        'price_wsp',
        'vat',
        'profit_margin',
        'rrp',
        'reseller_margin',
        'trending',
        'featured',
        'status',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'bulk_category_1',
        'bulk_category_price_1',
        'bulk_category_2',
        'bulk_category_price_2',
        'bulk_category_3',
        'bulk_category_price_3',
        'linked_item_1',
        'linked_item_2',
        'linked_item_3',
    ];

    // Define relationships here, for example:

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }

    public function subGroup()
    {
        return $this->belongsTo(SubGroup::class, 'sub_group_id');
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    /**
     * Get the product thumbnails associated with the product.
     */
    public function productThumbnails()
    {
        return $this->hasMany(ProductThumbnail::class, 'product_id', 'id');
    }
}
