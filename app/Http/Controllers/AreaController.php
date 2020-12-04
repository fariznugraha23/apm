<?php

namespace App\Http\Controllers;
use App\Models\apm_alls;
use App\Models\area_apms;
use App\Models\kriteria_apms;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $area = area_apms::simplePaginate(10);
        return view('area.index',compact('area'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        $area = area_apms::all();
        return view('area.create',compact('area'));
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
            'nama_area' => 'required',
           
        ]);
 
        area_apms::create($request->all());
 
        return redirect()->route('area.index')
            ->with('success','Post created successfully.');
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
    public function edit($id_area)
    {
        $area = area_apms::find($id_area);
        return view('area.edit',compact('area'));
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
            'nama_area' => 'required',
            
        ]);
        $area = area_apms::find($id);    
        $area->update($request->all());
 
        return redirect()->route('area.index')
            ->with('success','Area updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $area = area_apms::find($id);
        $area->delete();
 
        return redirect()->route('area.index')
        ->with('success','Area deleted successfully');
    }
}
