{{-- Yang dibawah Blade --}}
@extends('layout/aplikasi')

@section('konten')
<div class="text-center fs-4">{{$judul}}</div>
<p class="text-center mt-3 fs-5">Halaman Kontak Lorem ipsum, dolor sit amet consectetur adipisicing elit. Totam minima doloribus unde consequuntur explicabo culpa nemo minus accusantium reiciendis delectus.</p>
<p>
  <ul>
    <li>Email:{{$kontak['email']}}</li>
    <li>Youtube:{{$kontak['discord']}}</li>
  </ul>
</p>
@endsection
    
