<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Swiftshop | Admin</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="flex">
    <nav class="fixed bg-[#E72929] w-[15%] h-[100vh]">
        <div class="flex flex-col p-3">
            <div class="flex justify-center items-center">
                <h1 class="font-bold text-xl text-white">SwiftShop</h1>
            </div>
            <div class="mt-[30px]">
                <ul class="flex flex-col gap-[10px]">
                    <li>
                        <a href="/admin">
                            <div
                                class="flex justify-start items-center gap-[5px] text-white hover:bg-[#dfdfdf] hover:text-[#E72929] p-1 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6 hover:text-[#E72929] ml-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.666 3.888A2.25 2.25 0 0 0 13.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 0 1-.75.75H9a.75.75 0 0 1-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0 1 1.927-.184" />
                                </svg>
                                <h1 class="font-bold">Dashboard</h1>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/products">
                            <div
                                class="flex justify-start items-center gap-[5px] text-white hover:bg-[#dfdfdf] hover:text-[#E72929] p-1 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6 hover:text-[#E72929] ml-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M10.5 19.5h3m-6.75 2.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-15a2.25 2.25 0 0 0-2.25-2.25H6.75A2.25 2.25 0 0 0 4.5 4.5v15a2.25 2.25 0 0 0 2.25 2.25Z" />
                                </svg>
                                <h1 class="font-bold">Product</h1>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/order">
                            <div
                                class="flex justify-start items-center gap-[5px] text-white hover:bg-[#dfdfdf] hover:text-[#E72929] p-1 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6 hover:text-[#E72929] ml-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                </svg>
                                <h1 class="font-bold">Order</h1>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="ml-[12.5em] w-[85%] h-full">
        @yield('content')
    </main>
</body>

</html>
