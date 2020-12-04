@extends('template')
 
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Aplikasi APM tambah Area</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('area.create') }}"> Tambah Area</a>
     
            </div>
        </div>
    </div>
 
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
 
    <table width="100%" class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th><center>Area</center></th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        
        @foreach ($area as $post)
        <tr>
            
            <td>{{ $post->id_area }}</td>
            <td>{{ $post->nama_area }}</td>
            
            
            <td class="text-center">
                <form action="{{ route('area.destroy',$post->id_area) }}" method="POST">
 
 
                    <a class="btn btn-primary btn-sm" href="{{ route('area.edit',$post->id_area) }}">Edit</a>
 
                    @csrf
                    @method('DELETE')
 
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
     
        @endforeach
    </table>
 
    {!! $area->links() !!}
 
@endsection