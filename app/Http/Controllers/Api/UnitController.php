<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = Unit::all();
        return response()->json($units);
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
            'unit_name' => 'required|unique:units|max:255',
            'unit_code' => 'required|unique:units|max:255',
            ]);
           $unit = new Unit;
           $unit->unit_name = $request->unit_name;
           $unit->unit_code = $request->unit_code;
           $unit->unit_op_value = $request->unit_op_value;
           $unit->status = '1';
           $unit->created_by = $request->created_by;
           $unit->updated_by = $request->updated_by;
           $unit->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $unit=Unit::where('id', $id)->first();
        return response()->json($unit);
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
        $update=Unit::find($id)->update([
            'unit_name' => $request->unit_name,
            'unit_code' => $request->unit_code,
            'unit_op_value' => $request->unit_op_value,
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
        $unit=Unit::find($id)->delete();

    }
}
