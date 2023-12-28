<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function index(){
        $products = Product::with('category')->get();
        return response()->json([
            'products'=>$products
        ]);
    }
    public function store(Request $request){
        $validateData = $request->validate([
            'product_name' => 'required|unique:products|max:255',
            'product_code' => 'required|unique:products|max:255',
           ]);

         if ($request->photo) {
            $position= strpos($request->photo, ';');
            $sub=substr($request->photo, 0, $position);
            $ext=explode('/', $sub)[1];
            $name=time().".".$ext;
            $img=Image::make($request->photo)->resize(240,200);
            $upload_path='backend/product/';
            $image_url=$upload_path.$name;
            $img->save($image_url);

            $product = new Product;
            $product->product_name = $request->product_name;
            $product->product_code = $request->product_code;
            $product->category_id = $request->category_id;
            $product->product_stock = $request->product_stock;
            $product->product_buying_price = $request->product_buying_price;
            $product->product_cost_price = $request->product_cost_price;
            $product->product_selling_price = $request->product_selling_price;
            $product->product_buying_date = $request->product_buying_date;
            $product->product_selling_date = $request->product_selling_date;
            $product->product_note = $request->product_note;
            $product->product_qty = $request->product_qty;
            $product->supplier_id = $request->supplier_id;
            $product->tax_id = $request->tax_id;
            $product->vat_id = $request->vat_id;
            $product->unit_id = $request->unit_id;
            $product->brand_id = $request->brand_id;
            $product->warehouse_id = $request->warehouse_id;
            $product->discount_product = $request->discount_product;
            $product->feature_product = $request->feature_product;
            $product->discount_product_start_date = $request->discount_product_start_date;
            $product->discount_product_end_date = $request->discount_product_end_date;
            $product->discount_product_price = $request->discount_product_price;
            $product->tax_method =  $request->tax_method;
            $product->status = '1';
            $product->created_by = $request->created_by;
            $product->updated_by = $request->updated_by;
            $product->photo = $image_url;
            $product->save();



        }else{
           $product = new Product;
           $product->product_name = $request->product_name;
            $product->product_code = $request->product_code;
            $product->category_id = $request->category_id;
            $product->product_stock = $request->product_stock;
            $product->product_buying_price = $request->product_buying_price;
            $product->product_cost_price = $request->product_cost_price;
            $product->product_selling_price = $request->product_selling_price;
            $product->product_buying_date = $request->product_buying_date;
            $product->product_selling_date = $request->product_selling_date;
            $product->product_note = $request->product_note;
            $product->product_qty = $request->product_qty;
            $product->supplier_id = $request->supplier_id;
            $product->tax_id = $request->tax_id;
            $product->vat_id = $request->vat_id;
            $product->unit_id = $request->unit_id;
            $product->brand_id = $request->brand_id;
            $product->warehouse_id = $request->warehouse_id;
            $product->discount_product = $request->discount_product;
            $product->feature_product = $request->feature_product;
            $product->discount_product_start_date = $request->discount_product_start_date;
            $product->discount_product_end_date = $request->discount_product_end_date;
            $product->discount_product_price = $request->discount_product_price;
            $product->tax_method =  $request->tax_method;
            $product->status = '1';
            $product->created_by = $request->created_by;
            $product->updated_by = $request->updated_by;
           $product->save();

        }
    }
    public function show($id){
        $product=Product::where('id', $id)->first();
        return response()->json($product);
    }

    public function update(Request $request,$id){
        $image=$request->newPhoto;
        if($image){
            $position= strpos($image, ';');
            $sub=substr($image, 0, $position);
            $ext=explode('/', $sub)[1];
            $name=time().".".$ext;
            $img=Image::make($image)->resize(240,200);
            $upload_path='backend/product/';
            $image_url=$upload_path.$name;
            $success=$img->save($image_url);
            if($success){
                $img=Product::find($id)->first();
                $image_path=$img->photo;
                if (!empty($image_path) && file_exists($image_path)) {
                    unlink($image_path);
                }
                $update=Product::find($id)->update([
                    'product_name' => $request->product_name,
                    'product_code' => $request->product_code,
                    'category_id' => $request->category_id,
                    'product_stock' => $request->product_stock,
                    'product_buying_price' => $request->product_buying_price,
                    'product_cost_price' => $request->product_cost_price,
                    'product_selling_price' => $request->product_selling_price,
                    'product_buying_date' => $request->product_buying_date,
                    'product_selling_date' => $request->product_selling_date,
                    'product_note' => $request->product_note,
                    'product_qty' => $request->product_qty,
                    'supplier_id' => $request->supplier_id,
                    'tax_id' => $request->tax_id,
                    'vat_id' => $request->vat_id,
                    'unit_id' => $request->unit_id,
                    'brand_id' => $request->brand_id,
                    'warehouse_id' => $request->warehouse_id,
                    'discount_product' => $request->discount_product,
                    'feature_product' => $request->feature_product,
                    'discount_product_start_date' => $request->discount_product_start_date,
                    'discount_product_end_date' => $request->discount_product_end_date,
                    'discount_product_price' => $request->discount_product_price,
                    'tax_method' => $request->tax_method,
                    'status' => '1',
                    'created_by' => $request->created_by,
                    'updated_by' => $request->updated_by,
                    'photo'=>$image_url,
                ]);
            }

        }else{
            
            $update=Product::find($id)->update([
                'product_name' => $request->product_name,
                'product_code' => $request->product_code,
                'category_id' => $request->category_id,
                'product_stock' => $request->product_stock,
                'product_buying_price' => $request->product_buying_price,
                'product_cost_price' => $request->product_cost_price,
                'product_selling_price' => $request->product_selling_price,
                'product_buying_date' => $request->product_buying_date,
                'product_selling_date' => $request->product_selling_date,
                'product_note' => $request->product_note,
                'product_qty' => $request->product_qty,
                'supplier_id' => $request->supplier_id,
                'tax_id' => $request->tax_id,
                'vat_id' => $request->vat_id,
                'unit_id' => $request->unit_id,
                'brand_id' => $request->brand_id,
                'warehouse_id' => $request->warehouse_id,
                'discount_product' => $request->discount_product,
                'feature_product' => $request->feature_product,
                'discount_product_start_date' => $request->discount_product_start_date,
                'discount_product_end_date' => $request->discount_product_end_date,
                'discount_product_price' => $request->discount_product_price,
                'tax_method' => $request->tax_method,
                'status' => '1',
                'created_by' => $request->created_by,
                'updated_by' => $request->updated_by,
                'photo'=>$request->photo
                 ]);

        }
    }

    public function destroy($id){
        $product=Product::find($id)->first();
        $photo=$product->photo;

        if($photo){
            unlink($photo);
            Product::find($id)->delete();

        }else{
            Product::find($id)->delete();
        }
    }
}
