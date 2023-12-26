<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vat;
use Illuminate\Http\Request;

class VatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vats = Vat::all();
        return response()->json($vats);
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
            'vat_name' => 'required|unique:vats|max:255',
            'vat_percent' => 'required|unique:vats|max:255',
            ]);
           $vat = new Vat;
           $vat->vat_name = $request->vat_name;
           $vat->vat_percent = $request->vat_percent;
           $vat->status = '1';
           $vat->created_by = $request->created_by;
           $vat->updated_by = $request->updated_by;
           $vat->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vat=Vat::where('id', $id)->first();
        return response()->json($vat);
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
        $update=Vat::find($id)->update([
            'vat_name' => $request->vat_name,
            'vat_percent' => $request->vat_percent,
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
        $vat=Vat::find($id)->delete();

    }
}
