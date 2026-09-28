<?php

namespace App\Http\Controllers;

class DataDiriController extends Controller
{
    public function index()
    {
        $data = [
            'nama'          => 'M Raditya Zauhair',
            'nim'           => '2555200012',
            'program studi' => 'Informatika',
            'semester'      => '5',
            'angkatan'      => '2024',
            'profesi'       => 'Full Stack Developer',
            'email'         => 'radityazauhair@example.com',
            'alamat'        => 'Jl. Pahlawan 7 Sidoarjo, Jawa Timur, Indonesia',
            'keahlian'      => ['PHP', 'Laravel', 'HTML & CSS', 'MySQL']
        ];

        return view('datadiri', compact('data'));
    }
}