<?php

namespace App\Models;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class SubCategory extends Model
{
    use HasFactory;
    public $table = 'sub_categories';

    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $fillable = [
        'id',
        'name',
        'category_id',
        'created_at',
        'updated_at',

    ];

    public function category(){

        return $this->belongsTo(Category::class,'category_id');
    }
}
