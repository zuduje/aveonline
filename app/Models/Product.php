<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'observation',
        'price',
        'taxes',
        'amount',
        'status',
        'image_name',
        'reference'
    ];
    protected $guarded = ['id'];
    use SoftDeletes;
}
