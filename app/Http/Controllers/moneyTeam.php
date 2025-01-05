<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class moneyTeam extends Controller
{
    //
    public function index()
    {
        // Ambil data dari session jika ada
        $totalIncome = session('totalIncome', null);
        $totalExpenses = session('totalExpenses', null);
        $netProfit = session('netProfit', null);
        $results = session('results', null);

        return view('team', compact('totalIncome', 'totalExpenses', 'netProfit', 'results'));

    }

    public function prepare(Request $request)
    {
        $request->validate([
            'total_income' => 'required|numeric|min:0',
            'total_expenses' => 'required|numeric|min:0',
        ]);

        // Ambil data input
        $totalIncome = $request->input('total_income');
        $totalExpenses = $request->input('total_expenses');

        // Hitung laba bersih
        $netProfit = $totalIncome - $totalExpenses;

        // Simpan hasil di session
        session([
            'totalIncome' => $totalIncome,
            'totalExpenses' => $totalExpenses,
            'netProfit' => $netProfit,
        ]);

        return redirect()->route('views.team.index');
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

        // Simpan hasil di session
        session(['results' => $results]);

        return redirect()->route('views.team.index'); // Redirect ke halaman form   
    }

}
