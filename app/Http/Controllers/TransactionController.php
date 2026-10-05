<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // VARIABEL 3: Mengelola Transaksi & Lisensi Pembelian via Session
    private function getTransactions()
    {
        return session()->get('transactions', []);
    }

    // Function 1: Menampilkan seluruh riwayat transaksi
    public function index()
    {
        return response()->json(['status' => 'success', 'transactions' => $this->getTransactions()]);
    }

    // Function 2: Proses checkout keranjang menjadi transaksi sah
    public function checkout()
    {
        $cart = session()->get('asset_cart', []);
        if (empty($cart)) {
            return response()->json(['status' => 'error', 'message' => 'Keranjang aset masih kosong'], 400);
        }

        $transactions = $this->getTransactions();
        $trxId = 'TRX-3D-' . time();

        $newTransaction = [
            'trx_id' => $trxId,
            'purchased_assets' => array_keys($cart),
            'payment_status' => 'COMPLETED',
            'purchased_at' => now()->toDateTimeString()
        ];

        $transactions[$trxId] = $newTransaction;
        session()->put('transactions', $transactions);
        session()->forget('asset_cart'); // Integrasi: Keranjang otomatis dikosongkan setelah checkout

        return response()->json([
            'status' => 'success',
            'message' => 'Pembelian berhasil! Lisensi file 3D telah aktif.',
            'transaction' => $newTransaction
        ]);
    }

    // Function 3: Menampilkan rincian transaksi spesifik
    public function detail($trxId)
    {
        $transactions = $this->getTransactions();
        $trx = $transactions[$trxId] ?? null;

        if (!$trx) {
            return response()->json(['status' => 'error', 'message' => 'Transaksi tidak ditemukan'], 404);
        }

        return response()->json(['status' => 'success', 'data' => $trx]);
    }

    // Function 4: Menggenerasi link download file .blend jika transaksi sah
    public function getDownloadLink($trxId, $assetId)
    {
        $transactions = $this->getTransactions();
        $trx = $transactions[$trxId] ?? null;

        if ($trx && in_array((int)$assetId, $trx['purchased_assets'])) {
            return response()->json([
                'status' => 'success',
                'message' => 'Akses unduhan diberikan',
                'download_url' => url("storage/blender_files/asset_{$assetId}.blend"),
                'expires_in' => '24 hours'
            ]);
        }

        return response()->json(['status' => 'error', 'message' => 'Akses ditolak. Anda belum membeli aset ini.'], 403);
    }

    // Function 5: Rekap statistik total penjualan aset
    public function summary()
    {
        $transactions = $this->getTransactions();
        $totalSales = count($transactions);
        $totalAssetsSold = 0;

        foreach ($transactions as $trx) {
            $totalAssetsSold += count($trx['purchased_assets']);
        }

        return response()->json([
            'status' => 'success',
            'total_sales_transactions' => $totalSales,
            'total_assets_sold' => $totalAssetsSold
        ]);
    }
}