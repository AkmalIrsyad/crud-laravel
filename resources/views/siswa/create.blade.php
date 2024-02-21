@extends('layout/aplikasi')

@section('konten')
<form method="POST"action="/siswa" enctype="multipart/form-data">
    {{-- csrf adalah Token yang di hidden --}}
    {{-- Penggunaan Session Pada input atau Kolom, apabila di refresh. data yang sudah diketik sebelum nya. tidak akan hilang --}}
    @csrf
    <a href="/siswa" class="btn btn-secondary mb-3">Kembali</a>
    <div class="container">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="NIK" placeholder="NIK" name="nomor_induk" value="{{Session::get('nomor_induk')}}">
            <label for="NIK">Nomor Induk</label>
          </div>
          <div class="form-floating mb-3 ">
            <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" value="{{Session::get('nama')}}" >
            <label for="nama">Nama</label>
          </div>
          <div class="mb-3">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" name="alamat" >{{Session::get('nomor_induk')}}</textarea>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input class="form-control" type="file" naid="foto" name="foto">
              </div>
          </div>
          <div class="mb-3">
            <button type="submit" class="btn btn-primary">SIMPAN</button>
          </div>
    </div>
</form>
@endsection
