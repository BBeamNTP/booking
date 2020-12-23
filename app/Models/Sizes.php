<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sizes extends Model
{
    protected $table = 'size';
    protected $primaryKey = 'id';
    protected $fillable = [
        'product_id',
        'size_name',
        'status',
    ];
    public $timestamps = true;
}
