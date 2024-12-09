<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PosHunterSentence extends Model
{
    protected $table = 'pos-hunter_table';
    protected $fillable = [
        'sentence',
        'difficulty',
    ];
}
