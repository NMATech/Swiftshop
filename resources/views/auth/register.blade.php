@extends('auth/template_auth')

@section('auth')
    <div class="p-2">
        <h1 class="font-bold text-2xl ml-[3em]">Create Account</h1>
        <form action="{{ route('users.store') }}" class="flex flex-col justify-center items-center" method="POST">
            @csrf
            <div class="flex justify-between w-[80%] mt-[30px]">
                <div>
                    <h1>First Name</h1>
                    <input type="text" name="fname" value="{{ old('fname') }}"
                        class="outline-none border-b border-gray-400 focus:outline-b focus:border-[#E72929] focus:border-b-2 p-1 w-full">
                    @if ($errors->has('fname'))
                        <span class="error text-red-500 font-bold">{{ $errors->first('fname') }}</span>
                    @endif
                </div>
                <div>
                    <h1>Last Name</h1>
                    <input type="text" name="lname" value="{{ old('lname') }}"
                        class="outline-none border-b border-gray-400 focus:outline-b focus:border-[#E72929] focus:border-b-2 p-1 w-full">
                    @if ($errors->has('lname'))
                        <span class="error text-red-500 font-bold">{{ $errors->first('lname') }}</span>
                    @endif
                </div>
            </div>
            <div class="w-[80%] mt-[10px]">
                <h1>Email</h1>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="outline-none border-b border-gray-400 focus:outline-b focus:border-[#E72929] focus:border-b-2 p-1 w-full">
                @if ($errors->has('email'))
                    <span class="error text-red-500 font-bold">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="w-[80%] mt-[10px]">
                <h1>Phone</h1>
                <input type="number" name="phone" value="{{ old('phone') }}"
                    class="outline-none border-b border-gray-400 focus:outline-b focus:border-[#E72929] focus:border-b-2 p-1 w-full">
                @if ($errors->has('phone'))
                    <span class="error text-red-500 font-bold">{{ $errors->first('phone') }}</span>
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
            <div class="w-[80%] mt-[10px]">
                <h1>Confirm Password</h1>
                <input type="password" id="confirm_password" name="confirm_password"
                    class="outline-none border-b border-gray-400 focus:outline-b focus:border-[#E72929] focus:border-b-2 p-1 w-full">
                @if ($errors->has('confirm_password'))
                    <span class="error text-red-500 font-bold">{{ $errors->first('confirm_password') }}</span>
                @endif
            </div>
            <div class="mt-[30px]">
                <button type="submit"
                    class="bg-[#E72929] rounded-full py-[5px] px-[250px] text-white hover:bg-[#e72929]/90">Submit</button>
            </div>
            <div class="mt-[10px]">
                <h1>Have an account? Login <a href="/login" class="text-[#e72929] hover:font-bold">Here</a></h1>
            </div>
        </form>
    </div>
@endsection
