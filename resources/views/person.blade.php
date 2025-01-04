@extends('layouts.user')

@section('title', 'Home Page')

@section('content')
  <div class="container mx-auto my-8">
    <h1 class="text-3xl font-bold">Rencanakan Keuangan Anda, Wujudkan Impian Anda</h1>
    <p class="mt-4">Melalui perencanaan yang cermat, pengelolaan yang efisien, dan pengendalian pengeluaran yang bijak, Anda dapat menciptakan kestabilan keuangan yang kokoh, memastikan kebutuhan terpenuhi, dan secara bertahap membawa impian masa depan Anda menjadi kenyataan yang dapat diraih.</p>
  </div>
  

  

 {{-- Awal Perhitungan Manajemen Keuangan --}}
 <form method="POST" action="{{ route('views.person.hitung') }}"name="penghasilan" class="max-w-lg mx-auto my-5">
  @csrf           
  <div class="">                      
    <div>
      <label for="income">Penghasilan (perbulan)</label>
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

  {{-- Awal Prepare --}}
  <details class="group max-w-lg mx-auto my-5" @if(isset($dailyExpense) && isset($monthlyExpense)) open @endif>
    <summary class="flex justify-between cursor-pointer  text-gray-900">
      Tidak bisa menentukan penghasilan perbulan?
      <span class="transition-transform duration-200 group-open:rotate-180">
        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
        </svg>
      </span>
    </summary>
    <div class="mt-2 text-gray-900">

      <!-- Form Input -->
      <form action="{{ route('views.person.prepare') }}" method="POST">
        @csrf
          <div class="">                        
            <div>
              <label for="income">Pengeluaran (Perhari)</label>
            </div>        
            <div class="relative w-full my-2">
              <div class="absolute inset-y-0 start-0 top-0 flex items-center ps-3.5 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 2a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1M2 5h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm8 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z"/>
                </svg>
              </div>
              <input  type="number" id="daily_expense" name="daily_expense" class="block w-full ps-10 text-sm text-gray-900 bg-gray-50 rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Masukkan Pengasilan (Perbulan)" required />
            </div>
          </div>
          <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Hitung</button>
      </form>

      <!-- Hasil Perhitungan -->
      @if(isset($dailyExpense) && isset($monthlyExpense))
      <div class="max-w-lg mx-auto my-5">
          <p class="">Hasil Perhitungan:</p>
          <ul class="list-disc pl-4 mt-2">
              <li>Pengeluaran Per Hari: <strong>Rp{{ number_format($dailyExpense, 2) }}</strong></li>
              <li>Pengeluaran Per Bulan (30 hari): <strong>Rp{{ number_format($monthlyExpense, 2) }}</strong></li>
          </ul>
      </div>
      @endif

    </div>
  </details>
{{-- Akhir Prepare --}}

@if(isset($results))
    <div class="text-gray-700 mt-8">
        <h2 class="text-xl font-semibold">Hasil Perhitungan:</h2>
        <table class="min-w-full table-auto border-collapse border border-gray-300 mt-4">
            <thead>
                <tr class="text-gray-700 bg-blue-200">
                  <th class="border border-gray-300 px-4 py-2">Alokasi</th>
                  <th class="border border-gray-300 px-4 py-2">Persentase</th>
                  <th class="border border-gray-300 px-4 py-2">Kategori</th>
                    <th class="border border-gray-300 px-4 py-2">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @foreach($results as $result)
                    <tr>
                      <td class="border border-gray-300 px-4 py-2">{{ $result['subcategory'] }}</td>
                      <td class="border border-gray-300 px-4 py-2">{{ $result['percentage'] }}%</td>
                      <td class="border border-gray-300 px-4 py-2">{{ $result['category'] }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ number_format($result['amount'], 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
 {{-- Akhir Perhitungan Manajemen Keuangan --}}

@endsection
