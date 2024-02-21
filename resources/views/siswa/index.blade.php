@extends('layout/aplikasi')

@section('konten')
<a href="/siswa/create" class="btn btn-primary" class="mb-3">Tambah Data</a>
<div class="mb-3">
    <p class="fst-normal fs-4 text-center">Tampilan CRUD Dalam Bentuk Table </p>
</div>
<table class="table table-striped">
    <thead>
      <tr>
        <th>Foto</th>
        <th>NIK</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
      <tr>
        <td>
            @if ($item->foto)
            <img style="max-width:50px; max-height:50px" src="{{ url('foto').'/'.$item->foto }}"/>
        @endif
        </td>
        <td>{{ $item->nomor_induk}}</td>
        <td>{{ $item->nama}}</td>
        <td>{{ $item->alamat}}</td>
        {{-- Untuk mengetahui Polanya (method,alamat yang di akses), yaitu "php artisan route:list" --}}
        <td>
        <a href="{{url('/siswa/'.$item->nomor_induk)}}" class="btn btn-secondary btn-sm">Detail</a>
        <a href="{{url('/siswa/'.$item->nomor_induk.'/edit')}}" class="btn btn-warning btn-sm">edit</a>
        <form onsubmit="return confirm('Yakin Mau Hapus Data?')" class="d-inline" action="{{'/siswa/'.$item->nomor_induk}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm" type="submit">Delete
            </button>
        </form>
    </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="mb-3">
    <p class="fst-normal fs-4 text-center">Tampilan CRUD Dalam Bentuk Cards </p>
</div>
  <div class="row">
    @foreach ($data as $item)
      <div class="col-md-4">
        <div class="card mb-3" style="max-width: 540px;">
          <div class="row g-0">
            <div class="col-md-4">
              @if ($item->foto)
                <img src="{{ url('foto').'/'.$item->foto }}" class="img-fluid rounded-start">
              @endif
            </div>
            <div class="col-md-8">
              <div class="card-body shadow">
                <h5 class="card-title">{{$item->nama}}</h5>
                <p class="card-text">{{$item->alamat}}</p>
                <p class="card-text"><small class="text-body-secondary">NIK by {{$item->nomor_induk}}</small></p>
                <div class="">
                    <a href="{{url('/siswa/'.$item->nomor_induk)}}" class="btn btn-secondary" type="button">Detail</a>
                    <a href="{{url('/siswa/'.$item->nomor_induk.'/edit')}}" class="btn btn-warning" type="button">Edit</a>
                    <form onsubmit="return confirm('Yakin Mau Hapus Data?')" class="d-inline" action="{{'/siswa/'.$item->nomor_induk}}" method="POST">
                        @csrf
                        @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
  {{$data->links()}}
@endsection

