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

        <h1 class="text-2xl font-bold mt-[20px] mb-[20px]">Table Users Information</h1>
        <div>
            <div class="w-full">
                <form action="/admin" method="GET" class="flex gap-[20px] ml-[20px]">
                    <select name="orderBy"
                        class="shadow appearance-none border border-gray-400 rounded w-max py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="orderBy" required>
                        <option value="">Select Order By</option>
                        <option value="id">User Id</option>
                        <option value="fname">First Name</option>
                        <option value="lname">Last Name</option>
                        <option value="email">Email</option>
                        <option value="phone">Phone</option>
                    </select>
                    <button type="submit"
                        class="w-max bg-[#e72929] text-white py-2 px-4 rounded-lg hover:bg-[#e72929]/80 focus:outline-none focus:ring-2 focus:ring-[#e72929]">
                        Filter
                    </button>
                </form>
            </div>
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b border-t">User Id</th>
                        <th class="py-2 px-4 border-b">First Name</th>
                        <th class="py-2 px-4 border-b">Last Name</th>
                        <th class="py-2 px-4 border-b">Email</th>
                        <th class="py-2 px-4 border-b">Phone</th>
                        <th class="py-2 px-4 border-b">Amount of Orders</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="text-center">
                            <td class="py-2 px-4 border-b">{{ $user->id }}</td>
                            <td class="py-2 px-4 border-b">{{ $user->fname }}</td>
                            <td class="py-2 px-4 border-b">{{ $user->lname }}</td>
                            <td class="py-2 px-4 border-b">{{ $user->email }}</td>
                            <td class="py-2 px-4 border-b">{{ $user->phone }}</td>
                            <td class="py-2 px-4 border-b">{{ $userOrderCounts[$user->id] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
@endsection
