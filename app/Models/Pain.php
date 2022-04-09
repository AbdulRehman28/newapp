<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pain extends Model
{
    // use SoftDeletes;
    use MultiTenantModelTrait;
    use HasFactory;

    public $table = 'pains';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'english',
        'korean',
        'spanish',
        'vietnamese',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];

    public function painPainTypes()
    {
        return $this->hasMany(PainType::class, 'pain_id', 'id');
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
    public function userSelectedPains(){

        return $this->hasMany(UserSelectedPain::class, 'pain_table_id');

    }
}
