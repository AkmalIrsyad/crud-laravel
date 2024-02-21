<?php
// php artisan Make:controller SiswaController_ --resource
namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class SiswaController_ extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = siswa::orderBy('nomor_induk','desc')->paginate(5); //klo tidak ditambahkan protect error (nambah huruf "S" ) FIX nya di models/siswa.php
        return view('siswa/index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('siswa/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('nomor_induk', $request->nomor_induk);
        Session::flash('nama', $request->nama);
        Session::flash('alamat', $request->alamat);
        // Validasi
        $request->validate([
            'nomor_induk' => 'required|numeric',
            'nama' => 'required',
            'alamat' => 'required',
            'foto'=>'required|mimes:jpeg,jpg,png,gif'//Ekstensi Foto
        ],
        [
            // Pesan Kolom
           'nomor_induk.required'=>'Nomor Induk Wajib Diisi',
           'nomor_induk.numeric'=>'Nomor Induk harus angka',
           'nama.required'=>'Nama Tidak Boleh Kosong',
           'alamat.required'=>'Alamat Tidak Boleh Kosong',
           'foto.required'=>'Silakan Masukan Foto',
           'foto.mimes'=> 'Format foto adalah Berkestensi JPEG,JPG,PNG, dan GIF'
    ]);
        $foto_file = $request->file('foto'); // Menangkap File 'foto' di 'Create.blade'
        $foto_ekstensi = $foto_file->extension(); // Dari Sebuah file, di mempunyai Ekstensi Berjenis apa?
        $foto_nama = date('ymdhis').".".$foto_ekstensi; // (tahun,bulan,jam,menit,detik) = Merubah nama file, mencegah samanya nama file
        $foto_file->move(public_path('foto'),$foto_nama); // memindahkan file yang diunggah oleh pengguna ke direktori 'public/foto' di server dengan nama yang ditentukan oleh variabel $foto_nama.

        $data = [
            'nomor_induk'=> $request->input('nomor_induk'),
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'foto' => $foto_nama // hanya menyimpan nama file saja, karena file nya sudah disimpan di directory 'public/foto'
        ];
        siswa::create($data);
        return redirect('siswa')->with('success','Data Berhasil Di input'); // setelah data berhasil masuk, maka langsung redirect ke halaman siswa dan memberi notif jika data berhasil input, dengan menggunakan variabe 'success' yang akan di tangkap di pesan.blade
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $data = siswa::where('nomor_induk',$id)->first();
        return view('siswa/show')->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $data = siswa::where('nomor_induk', $id)->first();
        return view('siswa/edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required'
        ],[
            'nomor_induk.required'=>'Nomor Induk Wajib Diisi',
           'nomor_induk.numeric'=>'Nomor Induk harus angka',
           'nama.required'=>'Nama Tidak Boleh Kosong',
           'alamat.required'=>'Alamat Tidak Boleh Kosong',
    ]);
    $data = [
        'nama'=> $request->input('nama'),
        'alamat'=>$request->input('alamat'),
    ];
    // validasi (pengecekan)
    if($request->hasFile('foto')){
        $request->validate([
            'foto'=>'mimes:jpeg,jpg,png,gif'
        ],[
            'foto.mimes'=>'Foto hanya diperbolehkan Berekstensi JPEG,JPG,PNG, dan GIF'
        ]);
        // Proses Mengupload foto Baru
        $foto_file = $request->file('foto'); // Menangkap File 'foto' di 'Create.blade'
        $foto_ekstensi = $foto_file->extension(); // Dari Sebuah file, di mempunyai Ekstensi Berjenis apa?
        $foto_nama = date('ymdhis').".".$foto_ekstensi; // (tahun,bulan,jam,menit,detik) = Merubah nama file, mencegah samanya nama file
        $foto_file->move(public_path('foto'),$foto_nama); // memindahkan file yang diunggah oleh pengguna ke direktori 'public/foto' di server dengan nama yang ditentukan oleh variabel $foto_nama.

        // Menghapus Foto lama
        $data_foto = siswa::where('nomor_induk',$id)->first();
        File::delete(public_path('foto').'/'.$data_foto->foto);

        // Upload nama Foto
        $data['foto'] = $foto_nama;
    }

    siswa::where('nomor_induk',$id)->update($data);
    return redirect('siswa/')->with('success','Berhasi Melakukan Update Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $data = siswa::where('nomor_induk',$id)->first();
        File::delete(public_path('foto').'/'.$data->foto); //File::delete(public_path('foto').'/'.$data->foto);: Baris ini bertujuan untuk menghapus file foto siswa dari direktori 'public/foto'.


        siswa::where('nomor_induk',$id)->delete();
        return redirect('/siswa')->with('success','berhasil');
    }
}
