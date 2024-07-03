<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Swiftshop</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playwrite+IS:wght@100..400&family=Playwrite+NG+Modern:wght@100..400&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body class="font-[Poppins]">
    <nav class="flex justify-around items-center p-2 shadow-xl">
        <div class="w-[50%] flex justify-between">
            <h1 class="text-2xl font-[Playwrite IS] font-bold">SwiftShop</h1>
            <ul class="flex gap-[20px]">
                <li>
                    <a href="/" class="hover:border-b-2 hover:border-[#E72929]">Home</a>
                </li>
                <li>
                    <a href="/shop" class="hover:border-b-2 hover:border-[#E72929]">Shop</a>
                </li>
                <li>
                    <a href="/about_us" class="hover:border-b-2 hover:border-[#E72929]">About Us</a>
                </li>
                <li>
                    <a href="/contact_us" class="hover:border-b-2 hover:border-[#E72929]">Contact Us</a>
                </li>
            </ul>
        </div>
        <div class="flex items-center w-[30%] justify-end gap-[20px]">
            @if (!isset($logged_in_user))
                <div class="">
                    <a href="/login">
                        <button class="rounded-lg py-1 px-2 hover:border hover:border-gray-400">Login</button>
                    </a>
                </div>
            @endif
            <div class="">
                <form action="/filter" class="flex justify-center items-center gap-[5px]">
                    @csrf
                    <input type="text" name="category" id="category"
                        class="border border-gray-400 p-1 focus:outline-none focus:ring-[#E72929] focus:ring-1 focus:border-none">
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </button>
                </form>
            </div>
            <div class="w-[10%] flex justify-center items-center gap-[10px]">
                <a href="/carts">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                    </svg>
                    @if (isset($logged_in_user))
                        @if ($cartItems->count() >= 1)
                            <div class="absolute rounded-full px-2 bg-[#E72929] mt-[-35px] ml-[10px]">
                                <h1 class="text-white font-bold">{{ $cartItems->count() }}</h1>
                            </div>
                        @endif
                    @endif
                </a>
                @if (isset($logged_in_user))
                    <button id="profileButton" class="w-full relative">
                        <div class="w-max">
                            <img src="{{ asset('src/img/noprofil.jpg') }}" alt="Profile" class="w-[30px] rounded-full">
                        </div>
                    </button>
                @endif
            </div>
        </div>
    </nav>

    <main class="p-2">
        @yield('content')
    </main>

    {{-- card container profile --}}
    <div id="profileContainer"
        class="hidden w-[300px] flex flex-col gap-[10px] bg-[#151515] absolute top-0 right-0 mt-[40px] p-2 rounded-tl-2xl rounded-bl-2xl text-white transition-transform transform -translate-x-full opacity-0">
        <div>
            <h1>Profile Information</h1>
            <form id="profileUpdateForm" method="POST">
                @csrf
                <div>
                    <label for="fname">First Name</label>
                    <input type="text" id="fname" name="fname" value="{{ $logged_in_user->fname ?? '' }}"
                        class="w-full border border-gray-400 p-1 mt-1 text-black">
                </div>
                <div>
                    <label for="lname">Last Name</label>
                    <input type="text" id="lname" name="lname" value="{{ $logged_in_user->lname ?? '' }}"
                        class="w-full border border-gray-400 p-1 mt-1 text-black">
                </div>
                <div class="mt-2">
                    <button type="button" id="updateProfileBtn"
                        class="bg-blue-500 py-1 px-3 rounded text-white">Update</button>
                </div>
            </form>
        </div>
        <a href="/orders">
            <div class="w-full flex items-center p-1 hover:border hover:border-[#e72929] rounded-xl mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                </svg>
                <h1>Order</h1>
            </div>
        </a>
        <a href="/logout">
            <div class="w-full flex items-center p-1 hover:border hover:border-[#e72929] rounded-xl mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                </svg>
                <h1>Logout</h1>
            </div>
        </a>
    </div>
    {{-- card container profile end --}}

    @if (session('success'))
        <div id="success-notification" class="fixed top-0 left-0 w-full bg-green-500 text-white text-center p-4">
            {{ session('success') }}
        </div>
        <script>
            // Remove the notification after 3 seconds
            setTimeout(function() {
                var notification = document.getElementById('success-notification');
                if (notification) {
                    notification.style.display = 'none';
                }
            }, 3000);
        </script>
    @elseif (session('error'))
        <div id="error-notification" class="fixed top-0 left-0 w-full bg-red-500 text-white text-center p-4">
            {{ session('error') }}
        </div>
        <script>
            // Remove the notification after 3 seconds
            setTimeout(function() {
                var notification = document.getElementById('error-notification');
                if (notification) {
                    notification.style.display = 'none';
                }
            }, 3000);
        </script>
    @endif

    {{-- Footer --}}
    <footer>
        <div class="flex w-full mt-[30px] p-5">
            <div class="w-[30%] p-2">
                <h1 class="text-3xl font-bold font-[Playwrite IS]">Swiftshop</h1>
                <div class=" mt-[10px]">
                    <p>
                        We pride ourselves on offering cutting-edge products at competitive prices, all in US dollars.
                        Experience seamless shopping and unparalleled customer service with SwiftShop. Thank you for
                        choosing us for your tech needs!
                    </p>
                    <div class="flex gap-[10px] mt-[10px]">
                        <a href="https://instagram.com/itsnadin_ra" target="_blank">
                            <div class="rounded-full hover:bg-[#E72929] hover:text-white py-1 px-3 w-max">
                                <i class="fa fa-instagram fa-lg" aria-hidden="true" class="text-[10px]"></i>
                            </div>
                        </a>
                        <a href="https://linkedin.com/nadindra-maulana-aziz" target="_blank">
                            <div class="rounded-full hover:bg-[#E72929] hover:text-white py-1 px-3 w-max">
                                <i class="fa fa-linkedin fa-lg" aria-hidden="true" class="text-[10px]"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-[20%] mt-[3em] ml-[4em]">
                <h1 class="font-bold">QUICK LINKS</h1>
                <ul class="flex flex-col gap-[5px] ml-[5px] mt-[10px]">
                    <li>
                        <a href="/" class="hover:text-[#E72929] hover:font-bold">Home</a>
                    </li>
                    <li>
                        <a href="/shop" class="hover:text-[#E72929] hover:font-bold">Shop</a>
                    </li>
                    <li>
                        <a href="/about_us" class="hover:text-[#E72929] hover:font-bold">About Us</a>
                    </li>
                    <li>
                        <a href="" class="hover:text-[#E72929] hover:font-bold">Contact Us</a>
                    </li>
                </ul>
            </div>
            <div class="w-[20%] mt-[3em] ml-[-4em]">
                <h1 class="font-bold">CONTACT</h1>
                <div class="p-2 mt-[10px]">
                    <div class="flex justify-start items-center gap-[5px]">
                        <i class="fa fa-envelope-o fa-lg" aria-hidden="true" class="text-[10px]"></i>
                        <h1>maulananadindra@gmail.com</h1>
                    </div>
                    <div class="flex justify-start items-center gap-[5px]">
                        <i class="fa fa-phone fa-lg" aria-hidden="true" class="text-[10px]"></i>
                        <h1>+62 8588 0046 909</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-gray-800 w-full p-2 text-center">
            <h1 class="text-white">Copyright: @ Nadindra Maulana Aziz</h1>
        </div>
    </footer>
    {{-- Footer end --}}

    {{-- Javascript --}}
    <script>
        document.getElementById('updateProfileBtn').addEventListener('click', function(e) {
            e.preventDefault();

            const form = document.getElementById('profileUpdateForm');
            const formData = new FormData(form);

            fetch('{{ route('update.profile') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': formData.get('_token'),
                        'Accept': 'application/json',
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Reload the page to display session messages
                        location.reload();
                    } else {
                        alert('Failed to update profile');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });

        document.addEventListener('DOMContentLoaded', function() {
            var profileButton = document.getElementById('profileButton');
            var profileContainer = document.getElementById('profileContainer');

            profileButton.addEventListener('click', function() {
                if (profileContainer.classList.contains('hidden')) {
                    profileContainer.classList.remove('hidden');
                    profileContainer.classList.remove('-translate-x-full');
                    profileContainer.classList.remove('opacity-0');
                    profileContainer.classList.add('translate-x-0');
                    profileContainer.classList.add('opacity-100');
                } else {
                    profileContainer.classList.add('-translate-x-full');
                    profileContainer.classList.add('opacity-0');
                    profileContainer.classList.remove('translate-x-0');
                    profileContainer.classList.remove('opacity-100');
                    setTimeout(function() {
                        profileContainer.classList.add('hidden');
                    }, 300); // Delay to match the transition duration
                }
            });

            document.addEventListener('click', function(event) {
                if (!profileButton.contains(event.target) && !profileContainer.contains(event.target)) {
                    profileContainer.classList.add('-translate-x-full');
                    profileContainer.classList.add('opacity-0');
                    profileContainer.classList.remove('translate-x-0');
                    profileContainer.classList.remove('opacity-100');
                    setTimeout(function() {
                        profileContainer.classList.add('hidden');
                    }, 300); // Delay to match the transition duration
                }
            });
        });
    </script>

</body>

</html>
