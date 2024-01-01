<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $table ="suppliers";
    protected $fillable = ['supplier_name','supplier_email','supplier_phone','supplier_address','photo','supplier_balance','status','created_by','updated_by'];

}
