<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QAModel extends Model
{
    protected $table = 'qa_db';
    
    protected $fillable = [
        'subject', 'question', 'correct_option', 'other_option1', 'other_option2', 'other_option3',
        'answer_explanation', 'answer_diagram', 'subject_solve_rate','level',
    ];
}
