<?php

namespace App\Models;

use sluggable;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $table ='categories';
    protected $fillable=[
        'id',
        'name',
        'slug',
        'description',
        'image',
        'title',
        'status',
       
    ];
    public $directory = "/uploads/category/";
    public function getImageAttribute($value){
        if($value){
            return asset($this->directory.$value);
        }
        else{
            return null;
        }
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public function products(){
        return $this->hasMany(Product::class,'category_id','id');
    }
    public function brands(){
        return $this->hasMany(Brand::class,'category_id','id')->where('status','1');
    }
    
}
