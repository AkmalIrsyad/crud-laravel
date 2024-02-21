@extends('layout/aplikasi')

@section('konten')

<a href="{{'/siswa/'}}" class="btn btn-secondary btn-sm">Kembali</a>

<div class="container mb-3">
    <h3>{{$data->nama}}</h3>
    <div class="mb-3">
      <p>NIK : {{$data->nomor_induk}} </p>
    </div>
    <div class="mb-3">
      <p>Alamat: {{$data->alamat}}</p>
    </div>
    <div class="mb-3">
        @if($data->foto)
                <div class="mb-3">
                Foto: <img style="max-width:150px; max-height:150px" src="{{ url('foto').'/'. $data->foto}}"/>
                </div>
        @endif
    </div>
</div>
@endsection
