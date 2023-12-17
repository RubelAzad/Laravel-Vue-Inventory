<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['name','department_id','designation_id','branch_id','shift_id','email','phone','address','salary','photo','nid','joining_date','status','created_by','updated_by'];
}
