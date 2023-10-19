@extends('layout.layout')
@section('title','Tambah Barang ')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <span class="h1">
                    Tambah Pegawai   
                </span>
            </div>
            <div class="card-body">
                <form method="POST" action="simpan">
                    @csrf
                    <div class="row">
                        <p>
                            <hr>
                    </div>
                    <div class="">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Username</label> 
                                <input type="text" class="form-control" name="username" placeholder="Username minimal 8 karakter"/>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" />
                                @csrf
                            </div>
                            <div class="form-group">
                                <label>Peran</label><br>
                                <select name="peran" class="form-control">
                                    <option value="asisten dokter">Asisten Dokter</option>
                                    <option value="apoteker">Apoteker</option>
                                </select>
                            </div>
                            <div class="col-md-4 mt-4 display-flex">
                                <button type="submit" class="btn btn-success">SIMPAN</button>
                                
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection