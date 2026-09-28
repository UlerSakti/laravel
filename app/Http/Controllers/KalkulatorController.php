<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class KalkulatorController extends Controller
{
    public function Tambah($angka1, $angka2)
    {
        $hasil = $angka1 + $angka2;
        return $hasil;
    }

    public function Kurang($angka1, $angka2)
    {
        $hasil = $angka1 - $angka2;
        return $hasil;
    }

    public function Hasil($angka1, $angka2)
    {
        $variabel1 = $this->Tambah($angka1, $angka2);
        $variabel2 = $this->Kurang($angka1, $angka2);

        return view('Kalkulator', compact('angka1', 'angka2', 'variabel1', 'variabel2'));
    }
}
