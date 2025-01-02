<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class moneyPerson extends Controller
{
    //
    public function index()
    {
        return view('person'); // View untuk form
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

    return view('person', compact('results'));
}

}
