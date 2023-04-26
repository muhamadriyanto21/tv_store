<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'product_id';
    use HasFactory;
    protected $fillable = [
        'product_idcategory',
        'name_product',
        'price',
        'details',
    ];
}
