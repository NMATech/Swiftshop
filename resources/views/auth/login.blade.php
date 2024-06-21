@extends('auth/template_auth')

@section('auth')
    <div class="p-2 mt-[7em]">
        <h1 class="font-bold text-2xl ml-[3em] m-3">Login</h1>
        <form action="{{ route('users.login') }}" class="flex flex-col justify-center items-center" method="POST">
            @csrf
            <div class="w-[80%] mt-[10px]">
                <h1>Email</h1>
                <input type="email" name="email"
                    class="outline-none border-b border-gray-400 focus:outline-b focus:border-[#E72929] focus:border-b-2 p-1 w-full">
                @if ($errors->has('email'))
                    <span class="error text-red-500 font-bold">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="w-[80%] mt-[10px]">
                <h1>Password</h1>
                <input type="password" id="password" name="password"
                    class="outline-none border-b border-gray-400 focus:outline-b focus:border-[#E72929] focus:border-b-2 p-1 w-full">
                @if ($errors->has('password'))
                    <span class="error text-red-500 font-bold" id="pesanKesalahan">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <div class="mt-[30px]">
                <button type="submit"
                    class="bg-[#E72929] rounded-full py-[5px] px-[250px] text-white hover:bg-[#e72929]/90">Login</button>
            </div>
            <div class="mt-[10px]">
                <h1>Don't have an account? Register <a href="/register" class="text-[#e72929] hover:font-bold">Here</a></h1>
            </div>
        </form>
    </div>
@endsection
