<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;
    protected $fillable = ['warehouse_name','warehouse_contact','warehouse_email','warehouse_mobile','warehouse_address','status','created_by','updated_by'];
}
