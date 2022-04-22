<?php

namespace App\Models;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;
    public $table = 'products';

    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $fillable = [
        'id',
        'name',
        'sub_category_id',
        'created_at',
        'updated_at',

    ];

    public function productImage(){

        return $this->hasMany(ProductImage::class);
    }
    public function subCategory(){
        return $this->belongsTo(SubCategory::class,'sub_category_id');
    }
}
