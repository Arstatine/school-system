@include('partials.header')
@include('partials.navbar')
<div class="flex justify-center items-center">
    <div class="container">
        {{-- CREATE STUDENT --}}
        @auth
            @if(auth()->user()->user_type == 'admin')
                <x-form :type="'student'"/>

                {{-- STUDENT LISTS --}}
                <div class="overflow-x-auto mt-12">
                    <table class="table table-lg">
                    <thead>
                        <tr>
                        <th></th> 
                        <th>Full name</th> 
                        <th>Student ID</th> 
                        <th>Email</th> 
                        </tr>
                    </thead> 
                    <tbody>
                        @if (count($students) > 0)
                        @php
                            $count = 1;   
                        @endphp    
                        
                        @foreach($students as $student)       
                            <x-users :count='$count' :data='$student' :type="'student'"/>
                            @php
                                $count++;   
                            @endphp
                        @endforeach
                        
                        @else
                            <tr><td colspan="4">No student.</td></tr>
                        @endif
                    </tbody> 
                    </table>
                </div>
            @else
                <div class="italic font-bold mb-2">Not Found</div>
                <div><a href="/" class="btn btn-outline">Back to home</a></div>
            @endif
        @else
            <div class="italic font-bold mb-2">Not Found</div>
            <div><a href="/" class="btn btn-outline">Back to home</a></div>
        @endauth
    </div>
</div>
@include('partials.footer')