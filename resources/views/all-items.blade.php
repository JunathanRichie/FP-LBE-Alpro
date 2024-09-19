@extends('app')

@section('title', 'Welcome')

@section('content')
    <div class="pt-48"></div>
    <div class="grid grid-cols-5 w-3/4 mx-auto gap-10">
        @foreach ($items as $item)
            <x-card name="{{ $item['nama_item'] }}" price="{{ $item['harga_item'] }}" image="{{ $item['image'] }}" />
        @endforeach
    </div>
    <div class="h-20"></div>
    @include('footer')
@endsection
