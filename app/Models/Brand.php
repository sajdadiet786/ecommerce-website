<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use Sluggable;
    use HasFactory;
    protected $table ='brands';
    protected $fillable=[
        'id',
        'name',
        'slug',
        'status',
        'category_id'
       
    ];

     public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public function products(){
        return $this->hasMany(Product::class,'brand','name');
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
