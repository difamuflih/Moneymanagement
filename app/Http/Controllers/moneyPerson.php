<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class moneyPerson extends Controller
{
    //
    public function index()
    {
        // Ambil data dari session jika ada
    $dailyExpense = session('dailyExpense');
    $monthlyExpense = session('monthlyExpense');
    $results = session('results');

    return view('person', compact('dailyExpense', 'monthlyExpense', 'results'));
    }

    // Memproses data dan menghitung pengeluaran per bulan
    public function prepare(Request $request)
    {
        // Validasi input
        $request->validate([
            'daily_expense' => 'required|numeric|min:0',
        ]);

        $dailyExpense = $request->input('daily_expense');

        // Asumsi 30 hari dalam 1 bulan
        $monthlyExpense = $dailyExpense * 30;

        // Simpan hasil di session
        session([
            'dailyExpense' => $dailyExpense,
            'monthlyExpense' => $monthlyExpense,
        ]);

        return redirect()->route('views.person.index'); // Redirect ke halaman form
    }
    

    // Memproses data dan menampilkan hasil
    public function hitung(Request $request)
{
    $request->validate([
        'income' => 'required|numeric|min:1',
    ]);

    $income = $request->input('income');

    // Subkategori dengan persentase langsung dari total pendapatan
    $subcategories = [
        'Kebutuhan' => [
            'Makanan & Minuman' => 0.2,
            'Tempat Tinggal' => 0.15,
            'Transportasi' => 0.1,
            'Tagihan Rutin' => 0.05,
        ],
        'Hiburan' => [
            'Hobi & Hiburan' => 0.1,
            'Belanja Pribadi & Rekreasi' => 0.1,
            'Makan di Luar' => 0.05,
            'Langganan' => 0.05,
        ],
        'Investasi' => [
            'Tabungan Jangka Pendek' => 0.1,
            'Investasi atau Dana Darurat' => 0.05,
            'Pelunasan Utang' => 0.05,
        ],
    ];

    $results = [];
    foreach ($subcategories as $category => $items) {
        foreach ($items as $subcategory => $percentage) {
            $results[] = [
                'category' => $category,
                'subcategory' => $subcategory,
                'percentage' => $percentage * 100, // Persentase dari total pendapatan
                'amount' => $income * $percentage,
            ];
        }
    }
    // Simpan hasil di session
    session(['results' => $results]);

    return redirect()->route('views.person.index'); // Redirect ke halaman form
}

}
