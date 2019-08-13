<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public $fillable = [
        'body',
        'question_id',
    ];
}
