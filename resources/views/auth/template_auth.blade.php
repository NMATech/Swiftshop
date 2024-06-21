<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Swiftshop | {{ $title }}</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playwrite+IS:wght@100..400&family=Playwrite+NG+Modern:wght@100..400&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="bg-[#E72929] flex font-[Poppins]">
        <div class="w-[40%] h-[100vh]">
            <div class="text-center mt-[30px]">
                <h1 class="font-[Playwrite IS] text-[50px] text-white font-bold">Swiftshop</h1>
                <img src="{{ asset('src/img/eccomerce.png') }}" alt="">
            </div>
        </div>
        <div class="w-[60%] h-[100vh] bg-white rounded-tl-[50px] rounded-bl-[50px] p-[30px] pl-[50px]">
            @yield('auth')
        </div>
    </div>
</body>

</html>
