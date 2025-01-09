@extends('layouts.user')

@section('title', 'Home Page')

@section('content')
  <div class="container mx-auto my-8">
    <h1 class="text-3xl font-bold">Kelola Keuangan Bisnis Anda, Raih Kesuksesan Bersama</h1>
    <p class="mt-4">Melalui perencanaan keuangan yang strategis, pengelolaan dana yang transparan, dan pembagian keuntungan yang adil, kelompok atau UMKM Anda dapat mencapai kestabilan finansial, mendukung pengembangan usaha, serta mewujudkan visi bersama menuju masa depan yang lebih cerah dan berkelanjutan.</p>
  </div>

  <form method="POST" action="{{ route('views.team.hitung') }}"name="penghasilan" class="max-w-lg mx-auto my-5">
    @csrf           
    <div class="">                      
      <div>
        <label for="income">Laba Bersih</label>
      </div>  
      <div class="relative w-full my-2">
        <div class="absolute inset-y-0 start-0 top-0 flex items-center ps-3.5 pointer-events-none">
              <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 2a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1M2 5h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm8 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z"/>
          </svg>
          </div>
          <input name="income" 
          type="number" id="income" class="block w-full ps-10 text-sm text-gray-900 bg-gray-50 rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Masukkan Pengasilan (Perbulan)" required />
      </div>
    </div>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Cek Sekarang</button>
  </form>

  <details class="group max-w-lg mx-auto my-5" @if(session('netProfit') !== null) open @endif >
    <summary class="flex justify-between cursor-pointer text-gray-900">
        Belum menghitung laba bersih?
        <span class="transition-transform duration-200 group-open:rotate-180">
            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
            </svg>
        </span>
    </summary>
    <div class="mt-2 text-gray-900">
        <!-- Form Input -->
        <form action="{{ route('views.team.prepare') }}" method="POST" class="space-y-4">
            @csrf
            <div class="">                      
              <div>
                <label for="total_income">Total Pengeluaran</label>
              </div>  
              <div class="relative w-full my-2">
                <div class="absolute inset-y-0 start-0 top-0 flex items-center ps-3.5 pointer-events-none">
                      <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 2a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1M2 5h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm8 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z"/>
                  </svg>
                  </div>
                  <input type="number" name="total_income" id="total_income" class="block w-full ps-10 text-sm text-gray-900 bg-gray-50 rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Masukkan Pengasilan (Perbulan)" required />
              </div>
            </div>
            <div class="">                      
              <div>
                <label for="total_expenses">Total Pendapatan</label>
              </div>  
              <div class="relative w-full my-2">
                <div class="absolute inset-y-0 start-0 top-0 flex items-center ps-3.5 pointer-events-none">
                      <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 2a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1M2 5h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm8 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z"/>
                  </svg>
                  </div>
                  <input type="number" name="total_expenses" id="total_expenses" class="block w-full ps-10 text-sm text-gray-900 bg-gray-50 rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Masukkan Pengasilan (Perbulan)" required />
              </div>
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Hitung</button>
          </form>
    </div>
    
    <!-- Hasil Perhitungan -->
    @if (session('netProfit'))
    <div class="mt-5 p-4 max-w-lg mx-auto my-5">
      <h2 class="text-md font-bold">Hasil Perhitungan:</h2>
      <p>Total Pendapatan: <strong>Rp{{ number_format(session('totalIncome'), 2) }}</strong></p>
      <p>Total Pengeluaran: <strong>Rp{{ number_format(session('totalExpenses'), 2) }}</strong></p>
      <p class="mt-2">Laba Bersih: 
        <strong class="{{ session('netProfit') >= 0 ? 'text-green-600' : 'text-red-600' }}">
          Rp{{ number_format(session('netProfit'), 2) }}
        </strong>
      </p>
    </div>
    @endif  
  </details>

  @if(session('team.results'))
  <div class="text-gray-700 mt-8">
      <h2 class="text-xl font-semibold">Hasil Perhitungan Subkategori:</h2>
      <table class="min-w-full table-auto border-collapse border border-gray-300 mt-4">
          <thead>
              <tr class="text-gray-700 bg-blue-200">
                <th class="border border-gray-300 px-4 py-2">Kategori</th>
                <th class="border border-gray-300 px-4 py-2">Persentase</th>
                <th class="border border-gray-300 px-4 py-2">Jumlah</th>
                <th class="border border-gray-300 px-4 py-2">Keterangan</th>
              </tr>
          </thead>
          <tbody>
              @foreach(session('team.results') as $result)
                  <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $result['category'] }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $result['percentage'] }}%</td>
                    <td class="border border-gray-300 px-4 py-2">{{ number_format($result['amount'], 2) }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $result['information'] }}</td>
                  </tr>
              @endforeach
          </tbody>
      </table>
  </div>
@endif
  
@endsection
