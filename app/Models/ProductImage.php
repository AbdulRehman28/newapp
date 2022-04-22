<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ProductImage extends Model
{
    use HasFactory;
    public $table = 'product_images';

    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $fillable = [
        'id',
        'name',
        'product_id',
        'created_at',
        'updated_at',

    ];

    // public function subCategory(){

    //     return $this->belongsTo(SubCategory::class,'sub_category_id');
    // }
}
