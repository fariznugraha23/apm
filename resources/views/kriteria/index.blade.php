@extends('template')
 
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Aplikasi APM</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('apm.create') }}"> Tambah Poin</a>
     
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
            <th><center>Area RB</center></th>
            <th><center>Penilaian</center></th>
            <th><center>A</center></th>
            <th><center>B</center></th>
            <th><center>C</center></th>
            <th><center>Nilai</center></th>
            <th><center>Kriteria</center></th>
            <!-- <th><center>Bobot</center></th>
            <th><center>Skor</center></th> -->
            <th><center>Panduan Eviden</center></th>
            <th><center>Catatan Eviden</center></th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        <?php $no =1;?>
        @foreach ($apm as $post)
        <tr>
            <td class="text-center"><?php echo $no;?></td>
            <td>{{ $post->area_apms->nama_area }}</td>
            <td>{{ $post->area_rb }}</td>
            <td>{{ $post->penilaian }}</td>
            <td>{{ $post->a }}</td>
            <td>{{ $post->b }}</td>
            <td>{{ $post->c }}</td>
            <td>
                <?php
                    echo strtoupper("$post->nilai");
                ?> 
                 
            </td>
            <td>{{ $post->kriteria_apms->nama_kriteria }}</td>
            <!-- <td>{{ $post->bobot }}</td>
            <td>{{ $post->skor }}</td> -->
            <td>{{ $post->panduan_eviden }}</td>
            <td>{{ $post->catatan_eviden }}</td>
            <td class="text-center">
                <form action="{{ route('apm.destroy',$post->id) }}" method="POST">
 
                    <a class="btn btn-info btn-sm" href="{{ route('apm.show',$post->id) }}">View</a>
 
                    <a class="btn btn-primary btn-sm" href="{{ route('apm.edit',$post->id) }}">Edit</a>
 
                    @csrf
                    @method('DELETE')
 
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        <?php $no++; ?>
        @endforeach
    </table>
 
    {!! $apm->links() !!}
 
@endsection