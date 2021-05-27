@extends('layouts.core')

@section('content')
    <div class="max-w-xs w-full m-auto bg-indigo-100 rounded p-5">
        <!-- header -->
        <header>
            <img class="w-20 mx-auto mb-5" src="https://img.icons8.com/fluent/344/year-of-tiger.png" />
        </header>
        <!-- form -->
        <form class="text-right">
            <div>
                <label class="block mb-2 text-indigo-500" for="username">نام کاربری</label>
                <input class="text-right w-full p-2 mb-6 text-indigo-700 border-b-2 border-indigo-500 outline-none focus:bg-gray-300" type="text" name="username">
            </div>
            <div>
                <label class="block mb-2 text-indigo-500" for="password">پسورد</label>
                <input class="text-right w-full p-2 mb-6 text-indigo-700 border-b-2 border-indigo-500 outline-none focus:bg-gray-300" type="password" name="password">
            </div>
            <div>

                <button class="w-full bg-indigo-700 hover:bg-pink-700 text-white font-bold py-2 px-4 mb-6 rounded" type="submit">ورود</button>
            </div>
        </form>
        <!-- footer -->
        <footer>
            <a class="text-indigo-700 hover:text-pink-700 text-sm float-left" href="#">فراموشی رمز عبور؟</a>
            <a class="text-indigo-700 hover:text-pink-700 text-sm float-right" href="#">ایجاد اکانت جدید</a>
        </footer>
    </div>
@endsection
