<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warehouses = Warehouse::all();
        return response()->json($warehouses);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            $validateData = $request->validate([
            'warehouse_name' => 'required|unique:warehouses|max:255',
            ]);
           $warehouse = new Warehouse;
           $warehouse->warehouse_name = $request->warehouse_name;
           $warehouse->warehouse_contact = $request->warehouse_contact;
           $warehouse->warehouse_email = $request->warehouse_email;
           $warehouse->warehouse_mobile = $request->warehouse_mobile;
           $warehouse->warehouse_address = $request->warehouse_address;
           $warehouse->status = '1';
           $warehouse->created_by = $request->created_by;
           $warehouse->updated_by = $request->updated_by;
           $warehouse->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $warehouse=Warehouse::where('id', $id)->first();
        return response()->json($warehouse);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update=Warehouse::find($id)->update([
            'warehouse_name' => $request->warehouse_name,
            'warehouse_contact' => $request->warehouse_contact,
            'warehouse_email' => $request->warehouse_email,
            'warehouse_mobile' => $request->warehouse_mobile,
            'warehouse_address' => $request->warehouse_address,
            'status' => '1',
            'created_by' => $request->created_by,
            'updated_by' => $request->updated_by,
             ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $warehouse=Warehouse::find($id)->delete();

    }
}
