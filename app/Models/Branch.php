<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $table ="branchs";
    protected $fillable = ['branch_name','status','created_by','updated_by'];

}
