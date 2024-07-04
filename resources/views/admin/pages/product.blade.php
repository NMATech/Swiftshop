@extends('admin/template')

@section('content')
    <div class="container mx-auto p-2">
        <div>
            <h1 class="text-2xl font-bold mb-4">Data Product</h1>
            <a href="{{ route('products.create') }}">
                <button type="submit"
                    class="bg-[#e72929] hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Tambah Produk
                </button>
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">ID</th>
                        <th class="py-2 px-4 border-b">Nama</th>
                        <th class="py-2 px-4 border-b">Kategori</th>
                        <th class="py-2 px-4 border-b">Harga</th>
                        <th class="py-2 px-4 border-b">Stok</th>
                        <th class="py-2 px-4 border-b">Deskripsi</th>
                        <th class="py-2 px-4 border-b">Gambar</th>
                        <th class="py-2 px-4 border-b">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $product->id }}</td>
                            <td class="py-2 px-4 border-b">{{ $product->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $product->category }}</td>
                            <td class="py-2 px-4 border-b">${{ number_format($product->price, 2) }}</td>
                            <td class="py-2 px-4 border-b">{{ $product->stock }}</td>
                            <td class="py-2 px-4 border-b">{{ $product->description }}</td>
                            <td class="py-2 px-4 border-b">
                                <img src="{{ asset('images/' . $product->image_path) }}" alt="{{ $product->name }}"
                                    class="w-16 h-16 object-cover">
                            </td>
                            <td class="py-2 px-4 border-b flex gap-[5px]">
                                <a href="/products/{{ $product->id }}/edit">
                                    <div class="p-2 bg-green-500 w-max rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6 text-white">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                        </svg>
                                    </div>
                                </a>
                                <a href="/products/delete/{{ $product->id }}">
                                    <div class="p-2 bg-red-500 w-max rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6 text-white">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                    </div>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
