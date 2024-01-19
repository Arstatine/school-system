<div class="drawer">
    <input id="my-drawer" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content">
      <label for="my-drawer" class="btn btn-ghost rounded-full  btn-circle drawer-button">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" /></svg>
      </label>
    </div> 
    <div class="drawer-side z-[999]">
      <label for="my-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
      <ul class="menu p-4 w-80 min-h-full bg-base-200 text-base-content">
        <!-- Sidebar content here -->
        <li class="text-2xl mb-2 font-black"><a href="/" class="hover:bg-transparent hover:opacity-75">School System</a></li>
        
        @if(auth()->user()->user_type == 'admin')
          <li><a href="/teachers">Manage Teachers</a></li>
          <li><a href="/students">Manage Students</a></li>
          <li><a href="/grades">Grade Lists</a></li>
        @endif

        @if(auth()->user()->user_type == 'teacher')
          <li><a href="/download/file" class="px-4 py-2 bg-green-500 text-black hover:bg-green-400 mb-2">Download Student List</a></li>
          <li><a href="/grades">Grades</a></li>
        @endif
      </ul>
    </div>
</div>