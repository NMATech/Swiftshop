@extends('index')

@section('content')
    <h1 class="text-3xl font-bold mt-2 ml-2">Your Last Orders</h1>
    <div class="flex flex-col w-full p-2">
        @foreach ($orderItemsList as $orderItem)
            <div class="flex w-max mt-4 border-b-2 border-gray-600 pb-2">
                <div class="w-[30%] h-[200px] flex justify-center items-center">
                    <img src="{{ asset('images/' . $orderItem['product']->image_path) }}" alt=""
                        class="w-[300px] h-[200px] object-fit">
                </div>
                <div class="flex flex-col p-2">
                    <h1 class="text-2xl font-semi">{{ $orderItem['product']->name }}</h1>
                    <h1 class="font-normal">Category : <span class="font-semi">{{ $orderItem['product']->category }}</span>
                    </h1>
                    <h1 class="font-normal">Quantity : <span
                            class="font-semi">{{ $orderItem['orderItem']->quantity }}</span></h1>
                    <h1 class="font-normal">Price : <span class="font-semi">${{ $orderItem['orderItem']->price }}</span>
                    </h1>
                    <h1 class="font-normal">Order ID : <span
                            class="font-semi">{{ $orderItem['order']->number_order }}</span></h1>
                    <h1 class="font-normal">Order Date : <span
                            class="font-semi">{{ $orderItem['order']->created_at->format('F j, Y') }}</span></h1>
                </div>
            </div>
        @endforeach
    </div>
@endsection
