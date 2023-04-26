       @extends('layouts/main-app')

       @section('title', 'Task Manager - Register')

       @section('content')
       <div class="container px-4 mx-auto">
           <div class="text-center max-w-md mx-auto">
               <h2 class="mb-4 text-6xl md:text-7xl text-center font-bold font-heading tracking-px-n leading-tight">Join for free</h2>
               <p class="mb-12 font-medium text-lg text-gray-600 leading-normal">Lorem ipsum dolor sit amet, to the con adipiscing. Volutpat tempor to the condim entum.</p>
               <form method="POST" action="{{ route('register') }}">
                   @csrf
                   <label class=" block mb-5">
                       <input class="px-4 py-3.5 w-full text-gray-500 font-medium placeholder-gray-500 bg-white outline-none border border-gray-300 rounded-lg focus:ring focus:ring-indigo-300" id="name" type="text" name="name" value="" required autofocus placeholder="Username">
                       <span style="color: red;">@error('name') {{$message}} @enderror</span>
                   </label>
                   <label class="block mb-5">
                       <input class="px-4 py-3.5 w-full text-gray-500 font-medium placeholder-gray-500 bg-white outline-none border border-gray-300 rounded-lg focus:ring focus:ring-indigo-300" id="email" type="email" name="email" value="" required placeholder="Email Address">
                       <span style="color: red;">@error('email') {{$message}} @enderror</span>
                   </label>
                   <label class="block mb-5">
                       <input class="px-4 py-3.5 w-full text-gray-500 font-medium placeholder-gray-500 bg-white outline-none border border-gray-300 rounded-lg focus:ring focus:ring-indigo-300" id="password" type="password" name="password" required autocomplete="new-password" value="" placeholder="Create Password">
                       <span style="color: red;">@error('password') {{$message}} @enderror</span>
                   </label>
                   <label class="block mb-5">
                       <input class="px-4 py-3.5 w-full text-gray-500 font-medium placeholder-gray-500 bg-white outline-none border border-gray-300 rounded-lg focus:ring focus:ring-indigo-300" id="password_confirmation" type="password" name="password_confirmation" value="" required placeholder="Comfirm Password">
                       <span style="color: red;">@error('password_confirmation') {{$message}} @enderror</span>
                   </label>
                   <button class="mb-8 py-4 px-9 w-full text-white font-semibold border border-indigo-700 rounded-xl shadow-4xl focus:ring focus:ring-indigo-300 bg-indigo-600 hover:bg-indigo-700 transition ease-in-out duration-200" type="submit">Create Account</button>
                   <p class="font-medium">
                       <span> {{ __('Already registered?') }}</span>
                       <a class="text-indigo-600 hover:text-indigo-700" href="{{ route('login') }}"> Login</a>
                   </p>
               </form>
           </div>
       </div>
       @endsection