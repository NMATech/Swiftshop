@extends('index')

@section('content')
    {{-- Filter Search --}}
    <div class="w-full bg-white border-b">
        <form action="/filter" method="GET">
            <div class="flex items-center gap-[30px] pl-[10px]">
                <div class="flex justify-center items-center gap-[5px]">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-7">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                        </svg>
                    </div>
                    <div>
                        <select name="category"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="category" required>
                            <option value="headphone">Headphone</option>
                            <option value="smartwatch">Smartwatch</option>
                            <option value="laptop">Laptop</option>
                            <option value="keyboard">Keyboard</option>
                            <option value="mouse">Mouse</option>
                        </select>
                    </div>
                </div>
                <div class="flex flex-col items-center mb-4">
                    <label for="min-price" class="block text-gray-700">Minimum Price</label>
                    <input type="number" id="min-price" name="min_price"
                        class="w-full px-2 py-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Enter minimum price">
                </div>
                <div class="flex flex-col items-center mb-4">
                    <label for="max-price" class="block text-gray-700">Maximum Price</label>
                    <input type="number" id="max-price" name="max_price"
                        class="w-full px-2 py-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Enter maximum price">
                </div>
                <div>
                    <button type="submit"
                        class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Filter
                    </button>
                </div>
            </div>
        </form>
    </div>
    {{-- Fiter Search end --}}
    <div class="w-full flex gap-[20px] flex-wrap mt-[30px] p-2">
        @foreach ($products as $product)
            <div class="w-[200px] shadow-2xl pb-3">
                <div
                    class="flex justify-center items-center w-[200px] h-[150px] bg-gray-400/30 p-3 rounded-tl-xl rounded-tr-xl">
                    <img src="{{ asset('Images/' . $product->image_path) }}" alt="" class="w-[100px] object-fit">
                </div>
                <div class="p-2 rounded-bl-xl rounded-br-xl">
                    <h1 class="">{{ $product->name }}</h1>
                    <h1 class="font-bold">${{ $product->price }}</h1>
                </div>
                <div class="w-full p-1">
                    <a href="/product-{{ $product->id }}">
                        <div class="bg-[#E72929] w-max rounded-xl px-[12px] py-[4px]">
                            <h1 class="text-md text-white">See Details</h1>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
