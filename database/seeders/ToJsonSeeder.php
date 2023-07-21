<?php

namespace Database\Seeders;

use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Provinsi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ToJsonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_prov = Provinsi::all();
        $data_kab = Kabupaten::all();
        $data_kec = Kecamatan::all();
        $data_kel = Kelurahan::all();
        $json_prov = $data_prov->toJson(JSON_PRETTY_PRINT);
        $json_kab = $data_kab->toJson(JSON_PRETTY_PRINT);
        $json_kec = $data_kec->toJson(JSON_PRETTY_PRINT);
        $json_kel = $data_kel->toJson(JSON_PRETTY_PRINT);
        $file_prov = public_path('json/provinsi.json');
        $file_kab = public_path('json/kabupaten.json');
        $file_kec = public_path('json/kecamatan.json');
        $file_kel = public_path('json/kelurahan.json');
        file_put_contents($file_prov, $json_prov);
        file_put_contents($file_kab, $json_kab);
        file_put_contents($file_kec, $json_kec);
        file_put_contents($file_kel, $json_kel);
        echo "Berhasil membuat file json di public/json";
    }
}
