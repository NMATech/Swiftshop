@extends('index')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4">Contact Us</h1>

        <form action="" method="POST"
            class="w-full max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md border border-gray-400">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Name:</label>
                <input type="text" id="name" name="name" class="w-full border border-gray-300 p-2 rounded-lg"
                    value="{{ old('name') }}">
                @error('name')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
                <input type="email" id="email" name="email" class="w-full border border-gray-300 p-2 rounded-lg"
                    value="{{ old('email') }}">
                @error('email')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="message" class="block text-gray-700 font-bold mb-2">Message:</label>
                <textarea id="message" name="message" class="w-full border border-gray-300 p-2 rounded-lg">{{ old('message') }}</textarea>
                @error('message')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-center">
                <button type="submit" class="bg-[#e72929] text-white py-2 px-4 rounded-lg hover:bg-blue-700">Send
                    Message</button>
            </div>
        </form>
    </div>
@endsection
