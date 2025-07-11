<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorDetail extends Model
{
    use HasFactory;

    protected $fillable = ['visitor_name', 'group_name', 'company_number','phone_number', 'country','email','group_address','sex'];
}
