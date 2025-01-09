<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class moneyPerson extends Controller
{
    public function index()
    {
        // Ambil data dari session tanpa menghapus data team
        $dailyExpense = session('dailyExpense');
        $monthlyExpense = session('monthlyExpense');
        $results = session('person.results');

        return view('person', compact('dailyExpense', 'monthlyExpense', 'results'));
    }

    public function prepare(Request $request)
    {
        $request->validate([
            'daily_expense' => 'required|numeric|min:0',
        ]);

        $dailyExpense = $request->input('daily_expense');
        $monthlyExpense = $dailyExpense * 30;

        session([
            'dailyExpense' => $dailyExpense,
            'monthlyExpense' => $monthlyExpense,
        ]);

        return redirect()->route('views.person.index');
    }

    public function hitung(Request $request)
    {
        $request->validate([
            'income' => 'required|numeric|min:1',
        ]);

        $income = $request->input('income');

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
                    'percentage' => $percentage * 100,
                    'amount' => $income * $percentage,
                ];
            }
        }

        session(['person.results' => $results]);

        return redirect()->route('views.person.index');
    }
}
