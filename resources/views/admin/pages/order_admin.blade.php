@extends('admin.template')

@section('content')
    <h1 class="text-3xl font-bold mt-2 ml-2">Order Management</h1>

    <div class="mt-4 mb-6 ml-4">
        <form action="{{ route('admin.orders') }}" method="GET" class="flex flex-col md:flex-row gap-4">
            <div>
                <label for="start_date" class="block">Start Date</label>
                <input type="date" name="start_date" id="start_date" class="form-input mt-1 block w-full">
            </div>
            <div>
                <label for="end_date" class="block">End Date</label>
                <input type="date" name="end_date" id="end_date" class="form-input mt-1 block w-full">
            </div>
            <div>
                <label for="category" class="block">Category</label>
                <select name="category" id="category" class="form-select mt-1 block w-full">
                    <option value="">Select Category</option>
                    <option value="headphone">Headphone</option>
                    <option value="smartwatch">Smartwatch</option>
                    <option value="laptop">Laptop</option>
                    <option value="keyboard">Keyboard</option>
                    <option value="mouse">Mouse</option>
                </select>
            </div>
            <div class="flex items-end">
                <button type="submit" class="bg-[#e72929] text-white px-4 py-2 rounded-lg">Filter</button>
            </div>
        </form>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Order ID</th>
                    <th class="py-2 px-4 border-b">Order Date</th>
                    <th class="py-2 px-4 border-b">Customer</th>
                    <th class="py-2 px-4 border-b">Address</th>
                    <th class="py-2 px-4 border-b">Product</th>
                    <th class="py-2 px-4 border-b">Category</th>
                    <th class="py-2 px-4 border-b">Quantity</th>
                    <th class="py-2 px-4 border-b">Total Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    @foreach ($order->orderItems as $orderItem)
                        <tr class="text-center">
                            <td class="py-2 px-4 border-b">{{ $order->number_order }}</td>
                            <td class="py-2 px-4 border-b">{{ $order->created_at->format('F j, Y') }}</td>
                            <td class="py-2 px-4 border-b">{{ $order->user->fname }}</td>
                            <td class="py-2 px-4 border-b">{{ $order->address }}</td>
                            <td class="py-2 px-4 border-b">{{ $orderItem->product->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $orderItem->product->category }}</td>
                            <td class="py-2 px-4 border-b">{{ $orderItem->quantity }}</td>
                            <td class="py-2 px-4 border-b">${{ $orderItem->price }}</td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
