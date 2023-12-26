<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    use HasFactory;
    protected $table ="taxs";
    protected $fillable = ['tax_name','tax_percent','status','created_by','updated_by'];
}
