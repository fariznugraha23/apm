@extends('template')
 
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Edit APM</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('apm.index') }}"> Back</a>
            </div>
        </div>
    </div>
 
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
 
    <form action="{{ route('apm.update',$apm->id) }}" method="POST">
        @csrf
        @method('PUT')
 
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Area:</strong>
                    <select name="id_area" id="id_area" class="form-control">
                        <option value="{{ $apm->id_area }}">{{ $apm->area_apms->nama_area }}</option>
                        @foreach ($area as $id)
                            <option value="{{$id->id_area}}">{{ $id->nama_area}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Area RB:</strong>
                    <input type="number" name="area_rb" value="{{ $apm->area_rb }}" class="form-control" placeholder="Area RB">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Penilaian:</strong>
                    <input type="text" name="penilaian" value="{{ $apm->penilaian }}" class="form-control" placeholder="Penjelasan Aspek-aspek Penilaian">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>A:</strong>
                    <input type="text" name="a" value="{{ $apm->a }}" class="form-control" placeholder="Penjelasan Nilai mendapat A">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>B:</strong>
                    <input type="text" name="b" value="{{ $apm->b }}" class="form-control" placeholder="Penjelasan Nilai mendapat B">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>C:</strong>
                    <input type="text" name="c" value="{{ $apm->c }}" class="form-control" placeholder="Penjelasan Nilai mendapat C">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nilai:</strong>
                    <select name="nilai" id="nilai" class="form-control">
                        <option value="{{ $apm->nilai }}">{{ $apm->nilai }}</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Kriteria:</strong>
            <select name="id_kriteria" id="id_kriteria" class="form-control">
                <option value="{{ $apm->kriteria_apms->id_kriteria }}">{{ $apm->kriteria_apms->nama_kriteria }}</option>
                @foreach ($kriteria as $kriterias)
                    <option value="{{$kriterias->id_kriteria}}">{{ $kriterias->nama_kriteria}}</option>
                @endforeach
            </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Bobot:</strong>
                    <input type="number" name="bobot" value="{{ $apm->bobot }}" class="form-control" placeholder="Bobot Nilai">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Skor:</strong>
                    <input type="number" name="skor" value="{{ $apm->skor }}" class="form-control" placeholder="Skor Nilai">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Panduan Eviden:</strong>
                    <textarea class="form-control" style="height:150px" value="{{ $apm->panduan_eviden }}" name="panduan_eviden" placeholder="Panduan Eviden">{{ $apm->panduan_eviden }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Catatan Eviden:</strong>
                    <textarea class="form-control" style="height:150px"  value="{{ $apm->catatan_eviden }}" name="catatan_eviden" placeholder="Catatan Eviden">{{ $apm->catatan_eviden }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
 
    </form>
@endsection