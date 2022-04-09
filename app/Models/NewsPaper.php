<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsPaper extends Model
{
    // use SoftDeletes;
    use MultiTenantModelTrait;
    use HasFactory;

    public $table = 'newspapers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'date'
    ];

    protected $fillable = [
        'id',
        'title',
        'date'
    ];

    // public function painPainTypes()
    // {
    //     return $this->hasMany(PainType::class, 'pain_id', 'id');
    // }

    // public function created_by()
    // {
    //     return $this->belongsTo(User::class, 'created_by_id');
    // }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
    // public function userSelectedPains(){

    //     return $this->hasMany(UserSelectedPain::class, 'pain_table_id');

    // }
}
