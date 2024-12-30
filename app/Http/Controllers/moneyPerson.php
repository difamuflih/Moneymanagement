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
        $percentages = [
            'Kebutuhan' => 0.5,
            'Hiburan' => 0.3,
            'Investasi' => 0.2,
        ];

        $results = [];
        foreach ($percentages as $category => $percentage) {
            $results[] = [
                'category' => $category,
                'percentage' => $percentage * 100,
                'amount' => $income * $percentage,
            ];
        }
        // Kirim hasil kembali ke view person   
        return view('person', compact('results')); 
    }
}
