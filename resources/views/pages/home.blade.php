@extends('index')

@section('content')
    <h1>{{ $user }}</h1>
    {{-- Hero --}}
    <div
        class="flex flex-col justify-center items-center bg-red-500 w-full h-[430px] bg-gradient-to-br from-gray-400 to-gray-300 my-1 rounded-xl p-2 py-5 shadow-xl">
        <div class="flex flex-col w-[90%] h-[70%] mt-[30px]">
            <h1 class="font-bold text-xl">Best Bass</h1>
            <h1 class="font-bold text-6xl">Wireless</h1>
            <h1 class="font-bold text-8xl text-white mb-3">HEADPHONE</h1>
            <a href="">
                <button class="py-[8px] px-[16px] rounded-xl bg-[#E72929] text-white">Shop in Category</button>
            </a>
            <img src="{{ asset('src/img/headphone.png') }}" alt="" class="absolute rotate-25 w-[250px] ml-[25em]">
        </div>
        <div class="flex justify-end items-center mt-5 mb-[30px] w-[90%] mx-auto">
            <div class="w-[30%]">
                <h1 class="font-bold text-end">Description</h1>
                <p class="text-end">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, alias vero
                    explicabo, inventore
                    sequi eos</p>
            </div>
        </div>
    </div>
    {{-- Hero end --}}

    {{-- Card Category Product --}}
    <div class="flex justify-center items-center gap-[10px] flex-wrap w-[80%] mx-auto mt-[30px]">
        <div class="flex justify-center items-center w-[200px] h-[200px] bg-[#151515] rounded-xl shadow-2xl">
            <div class="flex flex-col w-[90%] h-[80%] justify-end">
                <h1 class="font-bold text-white">Play</h1>
                <h1 class="font-bold text-white text-xl">Sensitivity</h1>
                <h1 class="font-bold text-2xl text-gray-400/30 mb-3">MOUSE</h1>
                <a href="">
                    <button class="py-[4px] px-[8px] rounded-xl bg-[#E72929] text-white text-sm">Browse</button>
                </a>
                <img src="{{ asset('src/img/mouse.png') }}" alt=""
                    class="absolute rotate-25 w-[100px] ml-[5em] mb-[1em]">
            </div>
        </div>
        <div class="flex justify-center items-center w-[200px] h-[200px] bg-[#FFDB00] rounded-xl shadow-xl">
            <div class="flex flex-col w-[90%] h-[80%] justify-end">
                <h1 class="font-bold text-white">Move</h1>
                <h1 class="font-bold text-white text-xl">Wear</h1>
                <h1 class="font-bold text-2xl text-white/50 mb-3">GADGET</h1>
                <a href="">
                    <button class="py-[4px] px-[8px] rounded-xl bg-[#dfdfdf] text-[#FFDB00] text-sm">Browse</button>
                </a>
                <img src="{{ asset('src/img/smart_watch.png') }}" alt=""
                    class="absolute rotate-25 w-[100px] ml-[5em] mb-[2em]">
            </div>
        </div>
        <div class="flex justify-center items-center w-[350px] h-[200px] bg-[#E72929] rounded-xl shadow-xl">
            <div class="flex flex-col w-[90%] h-[80%] justify-end">
                <h1 class="font-bold text-white">Trend</h1>
                <h1 class="font-bold text-white text-xl">Devices</h1>
                <h1 class="font-bold text-2xl text-white/50 mb-3">LAPTOP</h1>
                <a href="">
                    <button class="py-[4px] px-[8px] rounded-xl bg-[#dfdfdf] text-[#E72929] text-sm">Browse</button>
                </a>
                <img src="{{ asset('src/img/Asus.png') }}" alt="" class="absolute rotate-25 w-[200px] ml-[8em]">
            </div>
        </div>
        <div class="flex justify-center items-center w-[350px] h-[200px] bg-[#06D001] rounded-xl shadow-xl">
            <div class="flex flex-col w-[90%] h-[80%] justify-end">
                <h1 class="font-bold text-white">Best</h1>
                <h1 class="font-bold text-white text-xl">Gaming</h1>
                <h1 class="font-bold text-2xl text-white/50 mb-3">KEYBOARD</h1>
                <a href="">
                    <button class="py-[4px] px-[8px] rounded-xl bg-[#dfdfdf] text-[#06D001] text-sm">Browse</button>
                </a>
                <img src="{{ asset('src/img/keyboard_wireless.png') }}" alt=""
                    class="absolute rotate-25 w-[200px] ml-[8em]">
            </div>
        </div>
        <div class="flex justify-center items-center w-[350px] h-[200px] bg-[#1679AB] rounded-xl shadow-xl">
            <div class="flex flex-col w-[90%] h-[80%] justify-end">
                <h1 class="font-bold text-white">Enjoy</h1>
                <h1 class="font-bold text-white text-xl">With</h1>
                <h1 class="font-bold text-2xl text-white/50 mb-3">HEADSET</h1>
                <a href="">
                    <button class="py-[4px] px-[8px] rounded-xl bg-[#DFDFDF] text-[#1679AB] text-sm">Browse</button>
                </a>
                <img src="{{ asset('src/img/razer_headset.png') }}" alt=""
                    class="absolute rotate-25 w-[130px] ml-[8em] mb-[-1em]">
            </div>
        </div>
    </div>
    {{-- Card Category Product end --}}

    {{-- Feature --}}
    <div class="w-[50%] mx-auto flex justify-evenly mt-[30px]">
        <div class="w-[180px] flex justify-center items-center gap-[5px] p-2 rounded-lg shadow-xl">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6 text-[#E72929]">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
            </svg>
            <h1 class="font-bold">Free Shipping</h1>
        </div>
        <div class="w-[180px] flex justify-center items-center gap-[5px] p-2 rounded-lg shadow-xl">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6 text-[#E72929]">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
            </svg>
            <h1 class="font-bold">Coupons</h1>
        </div>
        <div class="w-[180px] flex justify-center items-center gap-[5px] p-2 rounded-lg shadow-xl">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6 text-[#E72929]">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21 12a2.25 2.25 0 0 0-2.25-2.25H15a3 3 0 1 1-6 0H5.25A2.25 2.25 0 0 0 3 12m18 0v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 9m18 0V6a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 6v3" />
            </svg>
            <h1 class="font-bold">Secure Payment</h1>
        </div>
    </div>
    {{-- Feature end --}}

    {{-- Banner Product --}}
    <div class="bg-red-500 flex justify-between items-center w-full mt-[80px] p-5 rounded-xl">
        <div class="flex flex-col justify-center items-start w-[350px] h-[200px] p-2 ml-[30px] rounded-xl">
            <h1 class="font-bold text-white/50">20%</h1>
            <h1 class="font-bold text-white text-6xl">FIND</h1>
            <h1 class="font-bold text-6xl text-white">JOYS</h1>
            <h1 class="font-bold text-white/50">11 July to 11 August</h1>
            <img src="{{ asset('src/img/red.png') }}" alt="" class="absolute w-[250px] ml-[10em] mb-[5em]">
        </div>
        <div class="flex flex-col w-[30%] h-[80%] justify-end p-2 mr-[30px]">
            <h1 class="font-bold text-white/70 text-sm">Beats Solo Air</h1>
            <h1 class="font-bold text-white text-4xl">Summer Sale</h1>
            <h1 class="font-bold text-sm text-white/50 mb-3">Complete that's grown from 400 to 299 employees in the least
                12 month.</h1>
            <a href="">
                <button class="py-[8px] px-[16px] rounded-xl bg-[#DFDFDF] text-[#E72929] text-sm">Shop</button>
            </a>
        </div>
    </div>
    {{-- Banner Product end --}}

    {{-- Container Product --}}
    <div class="w-full mx-auto text-center mt-[30px]">
        <h1 class="font-bold text-4xl">Best Seller Products</h1>
        <h1 class="text-black/70">There's Many Variation</h1>
    </div>
    <div class="flex justify-evenly gap-[10px] p-2 w-full mt-[30px]">
        <div class="w-[200px]">
            <div
                class="flex justify-center items-center w-[200px] h-[150px] bg-gray-400/30 p-3 rounded-tl-xl rounded-tr-xl">
                <img src="{{ asset('src/img/mouseRazer.png') }}" alt="" class="w-[60px] object-fit">
            </div>
            <div class="p-2 rounded-bl-xl rounded-br-xl">
                <h1 class="">Merek</h1>
                <h1 class="font-bold">$1,301</h1>
            </div>
        </div>
        <div class="w-[200px]">
            <div
                class="flex justify-center items-center w-[200px] h-[150px] bg-gray-400/30 p-3 rounded-tl-xl rounded-tr-xl">
                <img src="{{ asset('src/img/mouseRazer.png') }}" alt="" class="w-[60px] object-fit">
            </div>
            <div class="p-2 rounded-bl-xl rounded-br-xl">
                <h1 class="">Merek</h1>
                <h1 class="font-bold">$1,301</h1>
            </div>
        </div>
        <div class="w-[200px]">
            <div
                class="flex justify-center items-center w-[200px] h-[150px] bg-gray-400/30 p-3 rounded-tl-xl rounded-tr-xl">
                <img src="{{ asset('src/img/mouseRazer.png') }}" alt="" class="w-[60px] object-fit">
            </div>
            <div class="p-2 rounded-bl-xl rounded-br-xl">
                <h1 class="">Merek</h1>
                <h1 class="font-bold">$1,301</h1>
            </div>
        </div>
        <div class="w-[200px]">
            <div
                class="flex justify-center items-center w-[200px] h-[150px] bg-gray-400/30 p-3 rounded-tl-xl rounded-tr-xl">
                <img src="{{ asset('src/img/mouseRazer.png') }}" alt="" class="w-[60px] object-fit">
            </div>
            <div class="p-2 rounded-bl-xl rounded-br-xl">
                <h1 class="">Merek</h1>
                <h1 class="font-bold">$1,301</h1>
            </div>
        </div>
    </div>
    {{-- Container Product end --}}

    {{-- Banner Product --}}
    <div class="bg-[#1679AB] flex justify-between items-center w-full mt-[80px] p-5 rounded-xl">
        <div class="flex flex-col justify-center items-start w-[350px] h-[200px] p-2 ml-[30px] rounded-xl">
            <h1 class="font-bold text-white/50">20%</h1>
            <h1 class="font-bold text-white text-6xl">HAPPY</h1>
            <h1 class="font-bold text-6xl text-white">HOURS</h1>
            <h1 class="font-bold text-white/50">20 July to 29 August</h1>
            <img src="{{ asset('src/img/blue.png') }}" alt="" class="absolute w-[250px] ml-[10em] mb-[5em]">
        </div>
        <div class="flex flex-col w-[30%] h-[80%] justify-end p-2 mr-[30px]">
            <h1 class="font-bold text-white/70 text-sm">Beats Solo Air</h1>
            <h1 class="font-bold text-white text-4xl">Summer Sale</h1>
            <h1 class="font-bold text-sm text-white/50 mb-3">Complete that's grown from 400 to 299 employees in the least
                12 month.</h1>
            <a href="">
                <button class="py-[8px] px-[16px] rounded-xl bg-[#DFDFDF] text-[#1679AB] text-sm">Shop</button>
            </a>
        </div>
    </div>
    {{-- Banner Product end --}}

    {{-- Maps --}}
    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg overflow-hidden mt-[30px] mb-[30px]">
        <div class="w-full mx-auto text-center mt-[30px]">
            <h1 class="font-bold text-4xl">Our Store Location</h1>
        </div>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.0862174975446!2d144.9632803157433!3d-37.81421787975186!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf5772074ef6e7d11!2sFederation%20Square!5e0!3m2!1sen!2sau!4v1620285126535!5m2!1sen!2sau"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            class="w-full h-96 mt-[30px]">
        </iframe>
    </div>
    {{-- Maps end --}}
@endsection
