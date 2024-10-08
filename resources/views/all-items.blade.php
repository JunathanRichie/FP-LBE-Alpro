@extends('app')

@section('title', 'Welcome')

@section('content')
    <div class="pt-48"></div>
    <h1 class="text-4xl font-bold text-black dark:text-white text-center mb-8">All Items</h1>
    <div class="grid grid-cols-5 w-3/4 mx-auto gap-10">
        @foreach ($items as $item)
        <x-card :gambar="$item['image']" name="{{ $item['nama_item'] }}" price="{{ $item['harga_item'] }}" id_item="{{ $item['id_item'] }}" :userId="$userId"/>
        @endforeach
    </div>
    <div class="h-20"></div>
    @include('footer')
@endsection
