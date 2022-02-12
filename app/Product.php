<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Product
 *
 * @property int $id
 * @property int $category_id
 * @property int $supplier_id
 * @property string $title
 * @property int $code
 * @property string|null $root
 * @property string|null $buying_price
 * @property string|null $selling_price
 * @property string|null $buying_date
 * @property string|null $image
 * @property int $product_quantity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Category $category
 * @property-read \App\Supplier $supplier
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereBuyingDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereBuyingPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProductQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereRoot($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSellingPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSupplierId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Product extends Model
{
    protected $fillable = [
        'category_id',
        'supplier_id',
        'title',
        'code',
        'root',
        'buying_price',
        'selling_price',
        'buying_date',
        'image',
        'product_quantity',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
