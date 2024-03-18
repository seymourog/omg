<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;
    protected $fillable = [
        'valute_id',
        'num_code',
        'char_code',
        'nominal',
        'name',
        'value',
        'vunit_rate',
    ];
}
