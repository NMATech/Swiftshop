@extends('admin.template')


@section('content')
    <div class="container mx-auto p-2">
        <h1 class="text-2xl font-bold mb-4">Add New Product</h1>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Name Product
                </label>
                <input name="name" type="text"
                    class="shadow appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="name" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="category">
                    Category
                </label>
                <select name="category"
                    class="shadow appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="category" required>
                    <option value="headphone">Headphone</option>
                    <option value="smartwatch">Smartwatch</option>
                    <option value="laptop">Laptop</option>
                    <option value="keyboard">Keyboard</option>
                    <option value="mouse">Mouse</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="price">
                    Price
                </label>
                <input name="price" type="number" step="0.01"
                    class="shadow appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="price" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                    Description
                </label>
                <textarea name="description"
                    class="shadow appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="description" required></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="stock">
                    Stock
                </label>
                <input name="stock" type="number"
                    class="shadow appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="stock" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="image">
                    Image
                </label>
                <input name="image" type="file"
                    class="shadow appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="image" required>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-[#e72929] hover:bg-[#e72929]/80 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Add Produk
                </button>
            </div>
        </form>
    </div>
@endsection
