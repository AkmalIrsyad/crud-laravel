@extends('layout/aplikasi')

@section('konten')
    <div class="w-20 center border rounded border-primary px-3 py-3 mx-auto">
    <h1 class="text-center">Register</h1>
    <form action="/sesi/create" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">name</label>
        <input type="text" name="name" class="form-control" id="email" value="{{Session::get('name')}}">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">email</label>
        <input type="text" name="email" class="form-control" id="email" value="{{Session::get('email')}}">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password">
    </div>
    <div class="mb-3 d-grid">
        <button type="submit" name="submit" class="btn btn-primary">Register</button>
        </div>
        <div class="mb-3 d-grid text-center ">
            Udah Punya Akun?
            <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="/sesi">
                Login
              </a>
        </div>
    </div>
</form>
@endsection
