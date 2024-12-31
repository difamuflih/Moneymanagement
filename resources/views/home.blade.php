@extends('layouts.user')

@section('title', 'Home Page')

@section('content')
  <div class="container mx-auto mt-8 ">
    <div class="md:flex gap-20">
      <img src="{{ asset('images/home1.webp') }}" alt="" class="mx-auto md:mx-0 w-72">
    <div class="flex flex-col justify-center">
      <h1 class="text-3xl font-bold text-center md:text-left">Manajemen Keuangan adalah Kunci Sukses</h1>
    <p class="mt-4 text-justify">Mengelola keuangan bukan hanya tentang mencatat pemasukan dan pengeluaran, tetapi juga tentang perencanaan, analisis, dan pengambilan keputusan yang tepat. Dengan manajemen keuangan yang baik, Anda dapat memastikan kelangsungan usaha atau organisasi Anda, sekaligus membuka peluang untuk berkembang lebih besar.
    </p>
    </div>
  </div>
  <div class="mt-5 ">
    <div class=" my-8 text-center text-3xl font-bold">
      Pentingnya Manajemen Keuangan
    </div>
    <div class=" grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
      <div class="h-auto max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <img class="w-16 mb-4 mx-auto" src="{{ asset('images/icon1.svg') }}" alt="">
          <h5 class="text-center text-xl font-bold text-gray-900 dark:text-white">Mencapai Stabilitas Keuangan</h5>
      </div>
      <div class="h-auto max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <img class="w-16 mb-4 mx-auto" src="{{ asset('images/icon2.svg') }}" alt="">  
        <h5 class="text-center text-xl font-bold text-gray-900 dark:text-white">Memastikan Transparansi</h5>
      </div>
      <div class="h-auto max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <img class="w-16 mb-4 mx-auto" src="{{ asset('images/icon3.svg') }}" alt="">  
        <h5 class="text-center text-xl font-bold text-gray-900 dark:text-white">Membantu Pengambilan Keputusan</h5>
      </div>
      <div class="h-auto max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <img class="w-16 mb-4 mx-auto" src="{{ asset('images/icon4.svg') }}" alt="">  
        <h5 class="text-center text-xl font-bold text-gray-900 dark:text-white">Mendukung Pertumbuhan Usaha</h5>
      </div>
      <div class="h-auto max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <img class="w-16 mb-4 mx-auto" src="{{ asset('images/icon5.svg') }}" alt="">  
        <h5 class="text-center text-xl font-bold text-gray-900 dark:text-white">Menghindari Risiko Kebangkrutan</h5>
      </div>
      <div class="h-auto max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <img class="w-16 mb-4 mx-auto" src="{{ asset('images/icon6.svg') }}" alt="">  
        <h5 class="text-center text-xl font-bold text-gray-900 dark:text-white">Meningkatkan Efisiensi Operasional</h5>
      </div>
      <div class="h-auto max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <img class="w-16 mb-4 mx-auto" src="{{ asset('images/icon7.svg') }}" alt="">  
        <h5 class="text-center text-xl font-bold text-gray-900 dark:text-white">Mewujudkan Tujuan Jangka Panjang</h5>
      </div>
    </div>
  </div>
  </div>
@endsection