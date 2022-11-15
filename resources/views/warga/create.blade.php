@extends('layouts.master')

@section('content')
<h1>Create Warga</h1>
<div class="container">
<form action="/warga/store" method="POST">
    @csrf
    <input type="text" name="nama"><br>
    <input type="text" name="nik"><br>
    <input type="text" name="no_kk"><br>
    <select name="jenis_kelamin">
        <option value="">Pilih jenis Kelamin</option>
        <option value="L">Laki - Laki</option>
        <option value="P">Perempuan</option>
    </select><br>
    <textarea name="alamat" rows="10"></textarea><br>
    <input type="submit" name="submit" value="Save">
</form>
</div>
@endsection