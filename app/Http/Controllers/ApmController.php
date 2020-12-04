<?php

namespace App\Http\Controllers;
use App\Models\apm_alls;
use App\Models\area_apms;
use App\Models\kriteria_apms;

use Illuminate\Http\Request;

class ApmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apm = apm_alls::paginate(5);
 
        return view('apm.index',compact('apm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $apm = apm_alls::all();
        $area = area_apms::all();
        $kriteria = kriteria_apms::all();
        return view('apm.create',compact('apm','area','kriteria'));
    }
    // public function createArea()
    // {
    //     $apm = apm_alls::all();
    //     $area = area_apms::all();
    //     $kriteria = kriteria_apms::all();
    //     return view('apm.create',compact('apm','area','kriteria'));
    // }
    // public function createKriteria()
    // {
    //     $apm = apm_alls::all();
    //     $area = area_apms::all();
    //     $kriteria = kriteria_apms::all();
    //     return view('apm.create',compact('apm','area','kriteria'));
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_area' => 'required',
            'area_rb' => 'required',
            'penilaian' => 'required',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'nilai' => 'required',
            'id_kriteria' => 'required',
            'bobot' => 'required',
            'skor' => 'required',
            'panduan_eviden' => 'required',
            'catatan_eviden' => 'required',
        ]);
 
        apm_alls::create($request->all());
 
        return redirect()->route('apm.index')
                        ->with('success','Post created successfully.');
    }

    // public function storeArea(Request $request)
    // {
    //     $request->validate([
    //         'nama_area' => 'required',
           
    //     ]);
 
    //     area_apms::create($request->all());
 
    //     return redirect()->route('apm.index')
    //                     ->with('success','Post created successfully.');
    // }
    // public function storeKriteria(Request $request)
    // {
    //     $request->validate([
    //         'nama_kriteria' => 'required',
           
    //     ]);
 
    //     kriteria_apms::create($request->all());
 
    //     return redirect()->route('apm.index')
    //         ->with('success','Post created successfully.');
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $apm = apm_alls::find($id);
        return view('apm.show',compact('apm'));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $area = area_apms::all();
        $kriteria = kriteria_apms::all();
        $apm = apm_alls::find($id);
        return view('apm.edit',compact('apm','area','kriteria'));
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
            'id_area' => 'required',
            'area_rb' => 'required',
            'penilaian' => 'required',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'nilai' => 'required',
            'id_kriteria' => 'required',
            'bobot' => 'required',
            'skor' => 'required',
            'panduan_eviden' => 'required',
            'catatan_eviden' => 'required',
        ]);
        $apm = apm_alls::find($id);    
        $apm->update($request->all());
 
        return redirect()->route('apm.index')
            ->with('success','APM updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $apm = apm_alls::find($id);
        $apm->delete();
 
        return redirect()->route('apm.index')
        ->with('success','APM deleted successfully');
    }
}
