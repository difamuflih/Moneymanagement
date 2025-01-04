<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class moneyTeam extends Controller
{
    //
    public function index()
    {
        return view('team'); // View untuk form
    }

    // Memproses data dan menampilkan hasil
    public function hitung(Request $request)
    {
        // Validasi input
        $request->validate([
            'income' => 'required|numeric|min:1',
        ]);

        $income = $request->input('income');

        // Subkategori dengan persentase dari total pendapatan
        $subcategories = [
            'Tabungan' => [
                'persentase' => 0.3,
                'keterangan' => 'Disimpan untuk kondisi darurat, misalnya kerusakan alat, penurunan pendapatan, atau kebutuhan mendesak lainnya.',
            ],
            'Pengembangan Usaha' => [
                'persentase' => 0.4,
                'keterangan' => 'Dialokasikan untuk memperbesar usaha, seperti membeli alat atau teknologi baru, penelitian dan pengembangan produk, atau membuka cabang baru.',
            ],
            'Pembagian Keuntungan' => [
                'persentase' => 0.2,
                'keterangan' => 'Diberikan kepada anggota kelompok atau pemilik usaha sesuai kesepakatan.',
            ],
            'Pemasaran dan Promosi' => [
                'persentase' => 0.1,
                'keterangan' => 'Untuk meningkatkan visibilitas usaha, seperti iklan di media sosial atau platform digital, diskon, giveaway, atau program loyalitas pelanggan.',
            ],
        ];

        $results = [];
        foreach ($subcategories as $category => $data) {
            $results[] = [
                'category' => $category,
                'percentage' => $data['persentase'] * 100, // Persentase dari total pendapatan
                'amount' => $income * $data['persentase'], // Nominal yang dihitung
                'information' => $data['keterangan'], // Keterangan tambahan
            ];
        }

        return view('team', compact('results'));
    }
}
