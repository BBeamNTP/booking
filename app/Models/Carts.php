<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    protected $table = 'carts';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'product_id',
        'product_name',
        'color',
        'size',
        'quantity',
        'image_name',
        'image_path',
        'quantity',
        'status',
    ];
    public $timestamps = true;
}
