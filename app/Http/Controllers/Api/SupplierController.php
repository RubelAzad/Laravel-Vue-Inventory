<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SupplierController extends Controller
{

    public function index(){
        $suppliers = Supplier::all();
        return response()->json($suppliers);
    }
    public function store(Request $request){
        $validateData = $request->validate([
            'supplier_email' => 'required|unique:suppliers|max:255',

           ]);

         if ($request->photo) {
            $position= strpos($request->photo, ';');
            $sub=substr($request->photo, 0, $position);
            $ext=explode('/', $sub)[1];
            $name=time().".".$ext;
            $img=Image::make($request->photo)->resize(240,200);
            $upload_path='backend/supplier/';
            $image_url=$upload_path.$name;
            $img->save($image_url);

            $supplier = new Supplier;
            $supplier->supplier_name = $request->supplier_name;
            $supplier->supplier_email = $request->supplier_email;
            $supplier->supplier_phone = $request->supplier_phone;
            $supplier->supplier_address = $request->supplier_address;
            $supplier->supplier_balance = $request->supplier_balance;
            $supplier->photo = $image_url;
            $supplier->status = '1';
            $supplier->created_by = $request->created_by;
            $supplier->updated_by = $request->updated_by;
            $supplier->save();
        }else{
            $supplier = new Supplier;
            $supplier->supplier_name = $request->supplier_name;
            $supplier->supplier_email = $request->supplier_email;
            $supplier->supplier_phone = $request->supplier_phone;
            $supplier->supplier_address = $request->supplier_address;
            $supplier->supplier_balance = $request->supplier_balance;
            $supplier->status = '1';
            $supplier->created_by = $request->created_by;
            $supplier->updated_by = $request->updated_by;
            $supplier->save();

        }
    }
    public function show($id){
        $supplier=Supplier::where('id', $id)->first();
        return response()->json($supplier);
    }

    public function update(Request $request,$id){
        $image=$request->newPhoto;
        if($image){
            $position= strpos($image, ';');
            $sub=substr($image, 0, $position);
            $ext=explode('/', $sub)[1];
            $name=time().".".$ext;
            $img=Image::make($image)->resize(240,200);
            $upload_path='backend/employee/';
            $image_url=$upload_path.$name;
            $success=$img->save($image_url);
            if($success){
                $img=Supplier::find($id)->first();
                $image_path=$img->photo;
                unlink($image_path);
                $update=Supplier::find($id)->update([
                    'supplier_name' => $request->supplier_name,
                    'supplier_email' => $request->supplier_email,
                    'supplier_phone' => $request->supplier_phone,
                    'supplier_address' => $request->supplier_address,
                    'supplier_balance' => $request->supplier_balance,
                    'status' => '1',
                    'created_by' => $request->created_by,
                    'updated_by' => $request->updated_by,
                    'photo'=>$image_url,
                ]);
            }

        }else{
            $update=Supplier::find($id)->update([
                'supplier_name' => $request->supplier_name,
                'supplier_email' => $request->supplier_email,
                'supplier_phone' => $request->supplier_phone,
                'supplier_address' => $request->supplier_address,
                'supplier_balance' => $request->supplier_balance,
                'status' => '1',
                'created_by' => $request->created_by,
                'updated_by' => $request->updated_by,
                'photo'=>$request->photo
            ]);
        }
    }

    public function destroy($id){
        $supplier=Supplier::find($id)->first();
        $photo=$supplier->photo;

        if($photo){
            unlink($photo);
            Supplier::find($id)->delete();

        }else{
            Supplier::find($id)->delete();
        }
    }
}
