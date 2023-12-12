<?php

namespace App\Models;

use sluggable;
use App\Models\ProductColor;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
   
    use HasFactory;
    protected $table = 'products';
    protected $fillable =[
        'category_id',
        'name',
        'slug',
        'brand',
        'description',
        'original_price',
        'selling_price',
        'quantity',
        'trending',
        'status',

    ];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
     public function productImages(){
        return $this->hasMany(ProductImage::class,'product_id','id');

     }
//  public $directory = "/uploads/products/";
//     public function getImageAttribute($value){
//         if($value){
//             return asset($this->directory.$value);
//         }
//         else{
//             return null;
//         }
//     }
public function productColors(){
    return $this->hasMany(ProductColor::class,'product_id','id');
}
}
