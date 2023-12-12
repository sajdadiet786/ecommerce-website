<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $table ='sliders';
    protected $fillable=[
        'title',
        'description',
        'image',
        'status'
    ];
    public $directory = "/uploads/slider/";
    public function getImageAttribute($value){
        if($value){
            return asset($this->directory.$value);
        }
        else{
            return null;
        }
    }
}

