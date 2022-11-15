@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Daftar Warga') }}</div>

                <div class="card-body">
                <a href="/warga/create" class="btn btn-primary"> Add Warga</a>
    <table class="table table-bordered">
        <tr>
            <td>Nama</td>
            <td>Nik</td>
            <td>KK</td>
            <td>Jenis Kelamin</td>
            <td>Alamat</td>
            <td>Aksi</td>
        </tr>
        @foreach($warga as $w)
        <tr>
            <td>{{ $w->nama }}</td>
            <td>{{ $w->nik }}</td>
            <td>{{ $w->no_kk }}</td>
            <td>{{ $w->jenis_kelamin }}</td>
            <td>{{ $w->alamat }}</td>
            <td>
            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                <a class="btn btn-warning" href="/warga/{{ $w->id }}/edit">Edit</a>
                <form action="/warga/{{ $w->id }}" method="POST">
                    @csrf
                    @method('delete')
                    <input class="btn btn-danger" type="submit" value="Delete">

                </form>
            </div>
            </td>
        </tr>
        @endforeach
    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection