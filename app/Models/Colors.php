<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colors extends Model
{
    protected $table = 'colors';
    protected $primaryKey = 'id';
    protected $fillable = [
        'product_id',
        'color_name',
        'status',
    ];
    public $timestamps = true;
}
