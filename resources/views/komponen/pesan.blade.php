{{-- ini adalah variable global yang bisa ditangkap langsung --}}
{{-- variable $item ngambil dari index.blade.php  --}}
@if ($errors->any())
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach ($errors->all() as $item)
            <li>{{$item}}</li>
        @endforeach
    </ul>
  </div>
@endif

@if (Session::get('success')) <!--menangkap variable success di SiswaController -->
<div class="alert alert-success">{{Session::get('success')}}</div> <!--Dengan isian dari with yang ada di SiswaController -->
@endif
</ul>
