@extends('index')

@section('content')
    {{-- Hero --}}
    <div class="p-2 flex justify-center items-center w-full h-[400px] bg-no-repeat bg-cover bg-bottom rounded-2xl"
        style="background-image: url('{{ asset('src/img/bg_hero_about_us.jpg') }}');">
        <h1 class="text-white text-6xl font-bold">ABOUT US</h1>
    </div>
    {{-- Hero end --}}

    <div class="flex gap-[10em] bg-[#151515] w-full p-2 mt-[30px] rounded-2xl">
        <h1 class="text-white font-bold text-2xl pr-[-10px]">Swiftshop</h1>
        <h1 class="text-white font-bold text-2xl">Swiftshop</h1>
        <h1 class="text-white font-bold text-2xl">Swiftshop</h1>
        <h1 class="text-white font-bold text-2xl">Swiftshop</h1>
        <h1 class="text-white font-bold text-2xl">Swiftshop</h1>
    </div>

    <div class="flex mt-[30px] w-[80%] mx-auto">
        <div class="w-[40%] bg-red-500">
            <img src="{{ asset('src/img/person.jpg') }}" alt="">
        </div>
        <div class="w-[60%] flex justify-center items-center p-2 pl-[30px]">
            <div class="flex flex-col gap-[10px] w-[80%]">
                <h1 class="text-gray-600 text-xl">About Us</h1>
                <h1 class="text-semi text-4xl">We Have a Good Quality Product</h1>
                <h1>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum in tempore repellendus accusantium iusto
                    error obcaecati laudantium distinctio sunt ab et, atque hic eaque ipsam architecto aliquid repellat non
                    corrupti!</h1>
            </div>
        </div>
    </div>

    <div class="w-[80%] flex bg-[#151515] rounded-tl-3xl rounded-br-3xl mx-auto mt-[30px]">
        <div class="w-[50%]">
            <img src="{{ asset('src/img/person_1.png') }}" alt="">
        </div>
        <div class="text-white w-[50%] p-2">
            <h1 class="font-semi text-4xl mt-[30px]">Why Us ?</h1>
            <div class="mt-[20px]">
                <div class="flex items-center gap-[10px]">
                    <h1 class="text-4xl">5</h1>
                    <h1 class="text-2xl">Product</h1>
                </div>
                <div class="w-[80%]">
                    <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum cupiditate,
                        reprehenderit
                        architecto
                        expedita assumenda totam! Ab distinctio sed at earum molestias quos voluptates, obcaecati vitae
                        adipisci
                        voluptatibus exercitationem saepe. Qui!</p>
                </div>
            </div>
            <div class="mt-[20px] mb-[30px]">
                <div class="flex items-center gap-[10px]">
                    <h1 class="text-4xl">999+</h1>
                    <h1 class="text-2xl">Customers</h1>
                </div>
                <div class="w-[80%]">
                    <p class="text-sm">Lorem, ipsum dolor sit amet consectetur adipisicing elit. At labore quisquam enim
                        suscipit ipsam eos aliquam placeat asperiores hic? Officiis atque adipisci accusantium reprehenderit
                        optio, corrupti quibusdam maxime impedit ipsa!!</p>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg overflow-hidden mt-[30px] mb-[30px]">
        <div class="w-full mx-auto text-center mt-[30px]">
            <h1 class="font-bold text-4xl">Our Store Location</h1>
        </div>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.51200739436!2d106.81904287413077!3d-6.195972660698823!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f421963cd607%3A0x19a795d66b67f6ce!2sWellcomm%20Shop%20Grand%20Indonesia!5e0!3m2!1sid!2sid!4v1719634937909!5m2!1sid!2sid"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade" class="w-full h-62 mt-[30px]"></iframe>
    </div>
@endsection
