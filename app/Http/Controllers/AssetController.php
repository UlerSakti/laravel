<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssetController extends Controller
{
    // VARIABEL 1: Data Katalog Aset 3D Blender
    private array $assets = [
        1 => [
            'id' => 1,
            'title' => 'Low Poly Character Warrior',
            'format' => '.blend',
            'software' => 'Blender 4.0',
            'price' => 150000,
            'file_url' => 'assets/downloads/warrior_v1.blend',
            'preview_image' => 'previews/warrior.jpg'
        ],
        2 => [
            'id' => 2,
            'title' => 'Cyberpunk Environment Pack',
            'format' => '.blend / .fbx',
            'software' => 'Blender 3.6',
            'price' => 350000,
            'file_url' => 'assets/downloads/cyberpunk_pack.zip',
            'preview_image' => 'previews/cyberpunk.jpg'
        ],
        3 => [
            'id' => 3,
            'title' => 'Realistic Procedural Wood Material',
            'format' => '.blend',
            'software' => 'Blender 4.1',
            'price' => 75000,
            'file_url' => 'assets/downloads/procedural_wood.blend',
            'preview_image' => 'previews/wood.jpg'
        ]
    ];

    // Function 1: Menampilkan seluruh katalog aset 3D
    public function index()
    {
        return response()->json(['status' => 'success', 'data' => $this->assets]);
    }

    // Function 2: Menampilkan detail 1 aset 3D berdasarkan ID
    public function show($id)
    {
        $asset = $this->assets[$id] ?? null;
        if (!$asset) {
            return response()->json(['status' => 'error', 'message' => 'Aset 3D tidak ditemukan'], 404);
        }
        return response()->json(['status' => 'success', 'data' => $asset]);
    }

    // Function 3: Pencarian aset berdasarkan judul
    public function search($keyword)
    {
        $filtered = array_filter($this->assets, function ($item) use ($keyword) {
            return stripos($item['title'], $keyword) !== false;
        });
        return response()->json(['status' => 'success', 'data' => array_values($filtered)]);
    }

    // Function 4: Filter aset berdasarkan versi Blender/Software
    public function filterBySoftware($type)
    {
        $filtered = array_filter($this->assets, function ($item) use ($type) {
            return stripos($item['software'], $type) !== false;
        });
        return response()->json(['status' => 'success', 'data' => array_values($filtered)]);
    }

    // Function 5: Mengambil url preview render aset 3D
    public function getPreview3D($id)
    {
        $asset = $this->assets[$id] ?? null;
        if (!$asset) {
            return response()->json(['status' => 'error', 'message' => 'Preview tidak tersedia'], 404);
        }
        return response()->json([
            'status' => 'success',
            'asset_title' => $asset['title'],
            'preview_url' => $asset['preview_image']
        ]);
    }
}