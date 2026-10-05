<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    // VARIABEL 2: Mengelola Keranjang Belanja Aset via Session
    private function getCart()
    {
        return session()->get('asset_cart', []);
    }

    // Function 1: Menampilkan isi keranjang belanja
    public function index()
    {
        return response()->json(['status' => 'success', 'cart' => $this->getCart()]);
    }

    // Function 2: Menambahkan aset ke keranjang
    public function add($assetId)
    {
        $cart = $this->getCart();

        if (!isset($cart[$assetId])) {
            $cart[$assetId] = [
                'asset_id' => (int) $assetId,
                'added_at' => now()->toDateTimeString()
            ];
            session()->put('asset_cart', $cart);
            return response()->json(['status' => 'success', 'message' => 'Aset ditambahkan ke keranjang', 'cart' => $cart]);
        }

        return response()->json(['status' => 'info', 'message' => 'Aset sudah ada di keranjang']);
    }

    // Function 3: Menghapus item aset dari keranjang
    public function remove($assetId)
    {
        $cart = $this->getCart();
        if (isset($cart[$assetId])) {
            unset($cart[$assetId]);
            session()->put('asset_cart', $cart);
            return response()->json(['status' => 'success', 'message' => 'Aset dihapus dari keranjang', 'cart' => $cart]);
        }
        return response()->json(['status' => 'error', 'message' => 'Aset tidak ditemukan di keranjang'], 404);
    }

    // Function 4: Mengkalkulasi total item di keranjang
    public function calculateTotal()
    {
        $cart = $this->getCart();
        return response()->json([
            'status' => 'success',
            'total_items' => count($cart),
            'cart_items' => array_keys($cart)
        ]);
    }

    // Function 5: Mengosongkan keranjang belanja
    public function clear()
    {
        session()->forget('asset_cart');
        return response()->json(['status' => 'success', 'message' => 'Keranjang aset berhasil dikosongkan']);
    }
}