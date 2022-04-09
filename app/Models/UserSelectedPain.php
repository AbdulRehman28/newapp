<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSelectedPain extends Model
{
    use HasFactory;
    protected $table='user_selected_pains';

    public function pains(){
        return $this->belongsTo(Pain::class, 'id');
    }
}
