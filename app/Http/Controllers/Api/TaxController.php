<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tax;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taxs = Tax::all();
        return response()->json($taxs);
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
            'tax_name' => 'required|unique:taxs|max:255',
            'tax_percent' => 'required|unique:taxs|max:255',
            ]);
           $tax = new Tax;
           $tax->tax_name = $request->tax_name;
           $tax->tax_percent = $request->tax_percent;
           $tax->status = '1';
           $tax->created_by = $request->created_by;
           $tax->updated_by = $request->updated_by;
           $tax->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tax=Tax::where('id', $id)->first();
        return response()->json($tax);
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
        $update=Tax::find($id)->update([
            'tax_name' => $request->tax_name,
            'tax_percent' => $request->tax_percent,
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
        $tax=Tax::find($id)->delete();

    }
}
