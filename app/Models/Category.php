<?php

namespace App\Models;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    use HasFactory;
    public $table = 'categories';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'id',
        'name',
        'created_at',
        'updated_at',
    ];

    public function products(){

        return $this->hasMany(Product::class);
    }
    public function subCategories(){

        return $this->hasMany(SubCategory::class);
    }
}
