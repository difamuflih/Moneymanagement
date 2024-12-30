@extends('layouts.user')

@section('title', 'Home Page')

@section('content')
  <div class="container mx-auto mt-8">
    <h1 class="text-3xl font-bold">Welcome to the Manage Team Page</h1>
    <p class="mt-4">This is the main content of the home page.</p>
  </div>

  <form name="penghasilan" class="max-w-lg mx-auto my-5">
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
        <input type="number" id="income" class="block w-full ps-10 text-sm text-gray-900 bg-gray-50 rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Masukkan Pengasilan (Perbulan)" required />
    </div>
    </div>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Cek Sekarang</button>
  </form>

  <form name="penghasilan" id="incomeForm" class="max-w-lg mx-auto my-5">
    <div>
      <label for="income">Penghasilan (perbulan)</label>
      <div class="relative w-full my-2">
        <div class="absolute inset-y-0 start-0 top-0 flex items-center ps-3.5 pointer-events-none">
          <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 2a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1M2 5h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm8 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z"/>
          </svg>
        </div>
        <input type="number" id="income" class="block w-full ps-10 text-sm text-gray-900 bg-gray-50 rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Masukkan Penghasilan (Perbulan)" required />
      </div>
    </div>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Cek Sekarang</button>
  </form>
  
  <!-- Output table placeholder -->
  <div id="outputTable" class="max-w-lg mx-auto my-5 hidden">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border-collapse border border-gray-200">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
          <th scope="col" class="px-6 py-3 border border-gray-300">Kategori</th>
          <th scope="col" class="px-6 py-3 border border-gray-300">Persentase</th>
          <th scope="col" class="px-6 py-3 border border-gray-300">Nominal</th>
        </tr>
      </thead>
      <tbody id="tableBody"></tbody>
    </table>
  </div>
  
@endsection
