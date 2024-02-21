@extends('layout/aplikasi')

@section('konten')
<form method="POST"action="{{'/siswa/'.$data->nomor_induk }}" enctype="multipart/form-data">
    {{-- csrf adalah Token yang di hidden --}}
    {{-- Penggunaan Session Pada input atau Kolom, apabila di refresh. data yang sudah diketik sebelum nya. tidak akan hilang --}}
    @csrf
    {{-- Untuk Mengetahui method dari edit, bisa di liat dari 'php artisan route:list' --}}
    @method('PUT')
    <a href="/siswa" class="btn btn-secondary">Kembali</a>
    <div class="mb-3">
        <h4>Nomor NIK anda: {{$data->nomor_induk}}</h4>
    </div>
          <div class="form-floating mb-3 ">
            <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" value="{{$data->nama}}" >
            <label for="nama">Nama</label>
          </div>
          <div class="mb-3">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" name="alamat" >{{$data->alamat}}</textarea>
          </div>
          <div class="mb-3">
            @if ($data->foto)
                <div class="mb-3">
                <img style="max-width:150px; max-height:150px" src="{{ url('foto').'/'. $data->foto}}"/>
                </div>
            @endif
            <label for="foto" class="form-label">Foto</label>
            <input class="form-control" type="file" naid="foto" name="foto">
          </div>
          <div class="mb-3">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
    </div>
</form>
@endsection
