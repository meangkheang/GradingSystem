<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScoreSubject extends Model
{
    use HasFactory;

    protected $fillable =['subject_id','score_id','grade','shift_id'];

    public function score(){
        return $this->hasOne(Score::class,'id','score_id');
    }
}
