<?php

namespace App\Http\Controllers;
use App\Models\apm_alls;
use App\Models\area_apms;
use App\Models\kriteria_apms;

use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriteria = kriteria_apms::simplePaginate(10);
 
        return view('kriteria.index',compact('kriteria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kriteria = kriteria_apms::all();
        return view('kriteria.create',compact('kriteria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kriteria' => 'required',
           
        ]);
 
        kriteria_apms::create($request->all());
 
        return redirect()->route('kriteria.index')
            ->with('success','Kriteria created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_kriteria)
    {
        $kriteria = kriteria_apms::find($id_kriteria);
        return view('kriteria.edit',compact('kriteria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kriteria' => 'required',
            
        ]);
        $kriteria = kriteria_apms::find($id);    
        $kriteria->update($request->all());
 
        return redirect()->route('kriteria.index')
            ->with('success','Kriteria updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kriteria = kriteria_apms::find($id);
        $kriteria->delete();
 
        return redirect()->route('kriteria.index')
        ->with('success','Kriteria deleted successfully');
    }
}
