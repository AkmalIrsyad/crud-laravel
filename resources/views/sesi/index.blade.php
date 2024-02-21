@extends('layout/aplikasi')

@section('konten')
    <div class="w-20 center border rounded border-primary px-3 py-3 mx-auto">
    <h1 class="text-center">Login</h1>
    <div class="d-flex justify-content-center mt-4 mb-3">
    <img style="max-width:80px; max-height:80px" src="{{url('foto'.'/laravel.png')}}">
    </div>
    <p class="fs-5 text-center">Web CRUD sederhana menggunakan Framework Laravel</p>

    <form action="/sesi/login" method="POST">
    @csrf
    <div class="mb-3">
        <label for="email" class="form-label">email</label>
        <input type="text" name="email" class="form-control" id="email" value="{{Session::get('email')}}">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password">
    </div>
    <div class="mb-3 d-grid">
        <button type="submit" name="submit" class="btn btn-primary">login</button>
        </div>
        <div class="mb-3 d-grid text-center ">
            Belum Punya Akun?
            <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="/sesi/register">
                Register
              </a>
        </div>
    </div>
</form>
@endsection
