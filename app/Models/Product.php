<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['product_name','product_code','category_id','product_stock','product_buying_price','product_cost_price','product_buying_date','product_selling_date','product_note','photo','product_qty','supplier_id','tax_id','vat_id','unit_id','brand_id','warehouse_id','tax_method','status','created_by','updated_by'];

}
