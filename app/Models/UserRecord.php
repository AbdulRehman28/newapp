<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pain;
use App\Models\PainType;
use App\Models\Language;
use App\Models\BodyPart;
use App\Models\PainSeverity;

class UserRecord extends Model
{
    use HasFactory;
    protected $table="user_records";

    public function pains(){

        return $this->belongsTo(Pain::class,'pain_id');
    }

    public function painTypes(){

        return $this->belongsTo(PainType::class,'pain_type_id');
    }

    public function language(){

        return $this->belongsTo(Language::class,'language_id');
    }

    public function bodypart(){

        return $this->belongsTo(BodyPart::class,'body_part_id');
    }
    public function severity(){

        return $this->belongsTo(PainSeverity::class,'severity_id');
    }
}
