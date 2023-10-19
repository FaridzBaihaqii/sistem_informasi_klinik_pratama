@extends('layouts.layout')
@section('title','Edit data ')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <span class="h1">
                    Edit Data Pegawai  {{$akun->username}}
                </span>
            </div>
            <div class="card-body">
                <form method="POST" action="simpan">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-success">SIMPAN</button>
                        </div>
                        <p>
                            <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            
                            <div class="form-group">
                                <label>Username</label>
                                <input type="hidden" name="id_user" value="{{$akun->id_user}}" />
                                <input type="text" class="form-control" name="username" value="{{$akun->username}}"/>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" class="form-control" name="password"  value="{{$akun->password}}"/>
                            </div>
                            <div class="form-group">
                                <label>Peran</label><br>
                                <select name="peran" class="form-control">
                                    <option value="asisten dokter"  {{$akun->peran == 'asisten dokter' ? 'checked' : ''}}>Asisten Dokter</option>
                                    <option value="apoteker" {{$akun->peran == 'apoteker' ? 'checked' : ''}}>Apoteker</option>
                                    <option value="resepsionis" {{$akun->peran == 'resepsionis' ? 'checked' : ''}}>Apoteker</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection