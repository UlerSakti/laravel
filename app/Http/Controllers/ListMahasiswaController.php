<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class ListMahasiswaController extends Controller
{
    public function ListMahasiswaFromController(){
        return view('ListMahasiswa');
    }

    public function NamaMahasiswa($nama){
        return view('NamaMahasiswa', compact('nama'));
    }
}