@extends('index')

@section('content')
    <h1 class="text-3xl font-bold mt-2 ml-2">Shopping Cart</h1>
    <div class="flex w-full p-2">
        <div class="w-[70%] p-2 mt-[20px] border-t-2 border-gray-600">
            @foreach ($carts as $cart)
                @foreach ($cartItems as $item)
                    <div class="flex w-max">
                        <div class="w-[30%] h-[200px] flex justify-center items-center">
                            <img src="{{ asset('images/' . $cart->image_path) }}" alt=""
                                class="w-[300px] h-[200px] object-fit">
                        </div>
                        <div class="flex flex-col p-2">
                            <h1 class="text-2xl font-semi">{{ $cart->name }}</h1>
                            @if ($stockStatus[$cart->id] == 'In Stock')
                                <h1 class="font-bold text-[#06D001] ">
                                    {{ $stockStatus[$cart->id] }}</h1>
                            @else
                                <h1 class="font-bold text-[#E72929] ">
                                    {{ $stockStatus[$cart->id] }}</h1>
                            @endif
                            <h1 class="font-normal">Category : <span class="font-semi">{{ $cart->category }}</span></h1>
                            <div class="flex w-full items-center gap-[10px] mt-[20px]">
                                <div>
                                    <select name="quantity" id="quantity"
                                        class="w-full rounded-xl py-[2px] px-[4px] border border-gray-400 focus:outline-none focus:ring-[#E72929] focus:ring-1">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <option value="{{ $i }}"
                                                {{ $i == $cart->quantity ? 'selected' : '' }}>
                                                {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                <a href="{{ route('delete_cart', ['id' => $item->id]) }}"
                                    class="text-[#1679AB] hover:font-bold">Delete</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
        <div class="bg-white w-[30%] mt-[-30px] p-2 border-l-2 border-gray-600">
            <div class="text-center">
                <h1 class="text-xl">Subtotal({{ $quantity }} item): <span class="font-bold">${{ $totalPrice }}</span>
                </h1>
                <button class="bg-[#FFDB00] py-[4px] px-[16px] rounded-xl mt-[5px] hover:bg-[#FFDB00]/80">Prosses to
                    checkout</button>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div id="success-notification" class="fixed top-0 left-0 w-full bg-green-500 text-white text-center p-4">
            {{ session('success') }}
        </div>
        <script>
            // Remove the notification after 3 seconds
            setTimeout(function() {
                var notification = document.getElementById('success-notification');
                if (notification) {
                    notification.style.display = 'none';
                }
            }, 3000);
        </script>
    @elseif (session('error'))
        <div id="error-notification" class="fixed top-0 left-0 w-full bg-red-500 text-white text-center p-4">
            {{ session('error') }}
        </div>
        <script>
            // Remove the notification after 3 seconds
            setTimeout(function() {
                var notification = document.getElementById('error-notification');
                if (notification) {
                    notification.style.display = 'none';
                }
            }, 3000);
        </script>
    @endif
@endsection
