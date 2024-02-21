<?php
// Routing
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SiswaController_;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route::get('/', function () {
//     return view('welcome');
// });

// 1
// 127.0.0.1:8000/ <h1>saya Siswa </h1>==> view welcome
// Route::get('/siswa', function () {
//     return "<h1>Saya Siswa</h1>";
// });
// 127.0.0.1:8000/ ==>
// Route::get('/siswa/{id}',function($id){
//     return "<h1> Halo saya adalah mahasiswa dengan ID $id </h1>";
// })->where('id','[0-9]+');
// 127.0.0.1:8000/ ==>
// Route::get('/siswa/{id}/{nama}',function($id,$nama){
//     return "<h1> Halo saya adalah mahasiswa dengan ID $id & nama $nama </h1>";
// })->where(['id'.'[0-9]+','nama' => '[A-Za-z]+']); // agar nama dan id hanya di isi angka dan nama di isi huruf


// Belajar Routing

// Route::get('siswa',[SiswaController::class,'index']);
// Route::get('siswa/{id}',[SiswaController::class,'detail'])->where('id','[0-9]+');

Route::resource('siswa', SiswaController_::class)->middleware('isLogin');

// Route::get('/', [HalamanController::class,'index']);
Route::get('/tentang', [HalamanController::class,'tentang']);
Route::get('/kontak', [HalamanController::class,'kontak']);


route::get('/sesi',[SessionController::class,'index'])->middleware('isTamu');
route::post('/sesi/login',[SessionController::class, 'login'])->middleware('isTamu');
route::get('/sesi/logout',[SessionController::class,'logout']);
route::get('/sesi/register',[SessionController::class,'register'])->middleware('isTamu');
route::post('/sesi/create',[SessionController::class,'create'])->middleware('isTamu');

Route::get('/',function (){
    return view('sesi/index');
}
);
