<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\NewsPaper;

class NewsPaperDetail extends Model
{
    // use SoftDeletes;
    use MultiTenantModelTrait;
    use HasFactory;

    public $table = 'newspaper_details';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id',
        'newspaper_id',
        'page_no',
        'image_path'
    ];

    public function newsPaper()
    {
        return $this->belongsTo(NewsPaper::class, 'newspaper_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
