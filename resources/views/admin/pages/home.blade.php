@extends('admin/template')


@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6">Admin Analytics Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-[#e72929] p-4 rounded shadow text-white">
                <h2 class="text-xl font-semibold">Total Users</h2>
                <p class="text-3xl mt-2">{{ $totalUsers }}</p>
            </div>

            <div class="bg-[#e72929] p-4 rounded shadow text-white">
                <h2 class="text-xl font-semibold">Total Sales</h2>
                <p class="text-3xl mt-2">${{ number_format($totalSales, 2) }}</p>
            </div>

            <div class="bg-[#e72929] p-4 rounded shadow text-white">
                <h2 class="text-xl font-semibold">Recent Orders (Last 7 Days)</h2>
                <p class="text-3xl mt-2">{{ $recentOrders }}</p>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
@endsection
