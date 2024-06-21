@extends('admin.template')


@section('content')
    <div class="container mx-auto p-2">
        <h1 class="text-2xl font-bold mb-4">Edit Produk</h1>
        <form action="/products/{{ $product->id }}" method="POST" enctype="multipart/form-data"
            class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Nama Barang
                </label>
                <input name="name" type="text" value="{{ $product->name }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="name" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="category">
                    Kategori
                </label>
                <select name="category"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="category" required>
                    <option value="headphone" {{ $product->category == 'headphone' ? 'selected' : '' }}>Headphone</option>
                    <option value="smartwatch" {{ $product->category == 'smartwatch' ? 'selected' : '' }}>Smartwatch
                    </option>
                    <option value="laptop" {{ $product->category == 'laptop' ? 'selected' : '' }}>Laptop</option>
                    <option value="keyboard" {{ $product->category == 'keyboard' ? 'selected' : '' }}>Keyboard</option>
                    <option value="mouse" {{ $product->category == 'mouse' ? 'selected' : '' }}>Mouse</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="price">
                    Harga
                </label>
                <input name="price" type="number" step="0.01" value="{{ $product->price }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="price" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                    Deskripsi
                </label>
                <textarea name="description"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="description" required>{{ $product->description }}</textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="stock">
                    Stok
                </label>
                <input name="stock" type="number" value="{{ $product->stock }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="stock" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="sale">
                    Diskon (%)
                </label>
                <input name="sale" type="number" step="0.01" value="{{ $product->sale }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="sale">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="image">
                    Gambar
                </label>
                <input name="image" type="file"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="image">
                <div class="mt-4">
                    <img src="{{ asset('images/' . $product->image_path) }}" alt="{{ $product->name }}"
                        class="w-32 h-32 object-cover">
                </div>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Perbarui Produk
                </button>
            </div>
        </form>
    </div>
@endsection
