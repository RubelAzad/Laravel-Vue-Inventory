<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['product_name','category_id','supplier_id','product_stock','product_buying_price','product_selling_price','product_buying_date','product_selling_date','product_note','photo','product_qty','status','created_by','updated_by'];

}
