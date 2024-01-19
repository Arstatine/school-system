@include('partials.header')
@include('partials.navbar')
<div class="flex justify-center items-center">
    <div class="container flex justify-center items-center py-[10%] px-4">
        <form action="{{ route('teacher.login') }}" class="mt-12 w-full lg:w-1/2 flex flex-col border border-slate-600 py-12 px-12 rounded" method="post">
            @csrf
            <h1 class="text-center mb-4 font-bold text-xl">Teacher Login</h1>
            <input type="email" name="email" id="email" placeholder="Email" class="input input-bordered w-full mb-2" />
            <input type="password" name="password" id="password" placeholder="Password" class="input input-bordered w-full mb-4" />
            @if(session('message'))
                <div class="text-red-500 text-sm mb-4">
                    {{ session('message') }}
                </div>
            @endif
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</div>
@include('partials.footer')