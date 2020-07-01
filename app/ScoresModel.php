<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScoresModel extends Model
{
    protected $table = 'scores';
    
    protected $fillable = [
        'uid', 'score_positive', 'ml_score_positive', 'dsa_score_positive', 'java_score_positive',
        'correct_java_basic', 'correct_java_medium', 'correct_java_high', 'correct_ml_basic','correct_ml_medium',
        'correct_ml_high','correct_dsa_basic','correct_dsa_medium','correct_dsa_high','average_score',
        'java_eq','ml_eq','dsa_eq','recommended_course',
    ];
}
