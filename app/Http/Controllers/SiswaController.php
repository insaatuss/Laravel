<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(){
    //     //mengambil semua nama siswa
    //     foreach(Siswa::all() as $siswa) {
    //         echo $siswa->nama . "<br>";
    //     }


    //mengambil data siswa dengan jk == L
    // $siswa_laki = Siswa::where('jk', 'L')
    //     ->orderBy('nama')
    //    ->get();

    //  foreach($siswa_laki as $siswa){
    //      echo $siswa->nis . " - " . $siswa->nama . "<br>";
    // }

    //mengambil model dengan nilai primary key
    // $siswa = Siswa::find('2021010004');

    //ambil model pertama yg cocok dengan batasan query
    // $siswa = Siswa::where('nis', '2021010001')->first();

    //alternatif untuk mengambil model pertama yang cocok dengan batasan query
    // $siswa = Siswa::firstwhere('nis', '2021010002');

    // $siswa_pertama_tmp_lahir = Siswa::where('tmp_lahir', '=', 'Bandung')->firstOr(function(){
    //     //jika tidak ada data yang ditemukan maka akan menjalankan perintah disini
    //     echo "Tidak ada hasil yang ditemukan";
    // });


    //findorfail dengan primarykey
    // $siswa = Siswa::findOrFail('2021010002');

    //firstOrFail dengan pembatasan query
    $siswa = Siswa::where('tmp_lahir', '>', 2)->firstOrFail();

    echo $siswa;
    }

    public function store(Request $request){
        // $siswa = new Siswa;
        // $siswa->nama = $request->nama;
        // $siswa->nis = $request->nis;
        // $siswa->jk = $request->jk;
        // $siswa->alamat = $request->alamat;
        // $siswa->tmp_lahir = $request->tmp_lahir;
        // $siswa->tgl_lahir = $request->tgl_lahir;
        // $siswa->telepon = $request->telepon;
        // $siswa->save();

        //metode create()

        // $me = Siswa::create([
        //     'nama' => 'Atus',
        //     'nis' => '2021010015',
        //     'jk' => 'P',
        //     'tmp_lahir' => 'Situbondo',
        //     'tgl_lahir' => '2000-12-10',
        //     'telepon' =>'085258244162',
        // ]);
        // return $me;

        //akan mencari data dengan keyword nis terlebih dahulu
        //bila data DITEMUKAN akan mendapat record data
        //bila data TIDAK DITEMUKAN maka akan memasukkan record baru
        $siswa = Siswa::firstOrCreate(
            ['nis', '2021010001'],
            ['nama', 'Atus', 'jk'=>'P', 'nis'=>'2021020018', 'tmp_lahir'=>'Situbondo', 'tgl_lahir'=>'2001-05-10', 'telepon'=>'082234417966'],
        );
        return $siswa;
    }

    public function update(Request $request, $id){
        // $siswa = Siswa::find($id);
        // $siswa->nama= $request->;
        // $siswa->save();

        $siswa = Siswa::where('nis', $id)
        ->update(['nama'=>$request->nama, 'jk'=>$request->jk]);

        return $siswa;
    }
}
