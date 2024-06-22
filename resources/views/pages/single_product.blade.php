@extends('index')

@section('content')
    <div class="w-full flex p-2">
        <div class="flex justify-center items-center w-[40%] py-[20px]">
            <img src="{{ asset('images/' . $product->image_path) }}" alt="" class="w-[400px] object-fit">
        </div>
        <div class="flex flex-col gap-[10px] w-[40%] p-2">
            <div class="border-b-2 border-black pb-2">
                <h1 class="text-2xl">{{ $product->name }}</h1>
            </div>
            <h1 class="font-bold text-xl">Price : <span class="font-normal text-[#E72929]">${{ $product->price }}</span></h1>
            <h1 class="font-bold text-xl">Category : <span class="font-normal">{{ $product->category }}</span></h1>
            <div>
                <h1 class="text-xl font-bold">Description : </h1>
                <h1 class="text-lg">{{ $product->description }}</h1>
            </div>
        </div>
        <div class="w-[20%] border border-gray-400 rounded-xl p-2">
            <h1 class="font-bold text-xl">${{ $product->price }}</h1>
            <h1 class="text-lg text-[#1679AB]">Free Shipping</h1>

            @if ($check['stock'] == 'In Stock')
                <h1 class="text-xl text-center font-bold text-[#06D001] mt-[20px] mb-[10px]">{{ $check['stock'] }}</h1>
            @else
                <h1 class="text-xl text-center font-bold text-[#E72929] mt-[20px] mb-[10px]">{{ $check['stock'] }}</h1>
            @endif

            <div class="flex items-center gap-[10px]">
                <h1 class="">Quantity : </h1>
                <select name="" id=""
                    class="w-[60%] rounded-xl py-[2px] px-[4px] border border-gray-400 focus:outline-none focus:ring-[#E72929] focus:ring-1">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>

            <div class="flex flex-col justify-center items-center gap-[10px] mt-[10px]">
                <button class="w-[90%] rounded-full bg-[#FFDB00] hover:bg-[#FFDB00]/80">Add to Cart</button>
                <button class="w-[90%] rounded-full bg-[#1679AB] hover:bg-[#1679AB]/80">Buy Now</button>
            </div>
        </div>
    </div>
@endsection
