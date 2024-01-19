

<div class="flex justify-center items-center bg-base-100">
    <div class="container">
        <div class="navbar px-12 py-6">
            @auth
                @include('partials.sidebar')
            @else
                <a href="/" class="flex-1 font-bold">School System</a>
            @endauth
            <div class="flex-none">
                @auth   
                    <div class="dropdown dropdown-end z-[99]">
                        <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                            <div class="w-10 aspect-square rounded-full flex items-center justify-center">
                                <div class="align-middle h-full w-full flex items-center justify-center text-lg bg-slate-700 uppercase">{{ substr(auth()->user()->fullname, 0, 1); }}</div>
                            </div>
                        </div>
                        <ul tabindex="0" class="menu menu-sm dropdown-content mt-1 z-[1] p-2 shadow bg-slate-700 rounded w-52">
                            <li class="hover:bg-[rgba(255,255,255,.1)] rounded px-3 py-2 w-full h-full cursor-pointer text-center capitalize">{{ explode(' ', trim(auth()->user()->fullname ))[0] }}</li>
                            <form action="{{ route('logout') }}" method="post" class="w-full-h-full">@csrf<button type="submit" class="hover:bg-red-500 hover:text-slate-200 rounded px-3 py-2 w-full h-full">Logout</button></form>
                        </ul>
                    </div>
                @else
                    <div>
                        <a href="/teacher-login" class="hover:bg-slate-700 px-4 py-2 rounded transition-all"><span class="hidden lg:inline-block">Login as&nbsp;</span>Teacher</a>
                        <a href="/admin-login" class="hover:bg-slate-700 px-4 py-2 rounded transition-all"><span class="hidden lg:inline-block">Login as&nbsp;</span>Admin</a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</div>