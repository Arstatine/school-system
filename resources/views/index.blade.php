@include('partials.header')
@include('partials.navbar')
<div class="hero py-[10%]">
    <div class="hero-content text-center">
      <div class="max-w-2xl">
        <h1 class="text-5xl font-black  tracking-widest">School System</h1>
        <p class="py-6">
            Introducing School System: The ultimate grade management solution for educators. Seamlessly export and import grades across platforms with ease.
        </p>
        @auth
        <div class="text-3xl capitalize font-bold" >Welcome {{ auth()->user()->user_type }}</div>
        @else
        <a class="btn btn-primary" href="/teacher-login">Get Started</a>
        @endauth
      </div>
    </div>
  </div>
@include('partials.footer')