<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductBeach extends Model
{
    use HasFactory;
    protected $fillable = ['beach_name','location', 'hotline','web_avail','price','note'];
    protected $table = 'product_beaches';
}
