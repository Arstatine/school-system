@include('partials.header')
@include('partials.navbar')
<div class="flex justify-center items-center">
    <div class="container">
        @auth
            @if(auth()->user()->user_type == 'admin')
                {{-- CREATE TEACHER --}}
                <x-form :type="'teacher'"/>

                {{-- TEACHER LISTS --}}
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
                        @if (count($teachers) > 0)
                        @php
                            $count = 1;   
                        @endphp

                        @foreach($teachers as $teacher)       
                            <x-users :count='$count' :data='$teacher' :type="'teacher'"/>
                            
                            @php
                                $count++;   
                            @endphp
                        @endforeach

                        @else
                            <tr><td colspan="4">No teacher.</td></tr>
                        @endif
                    </tbody> 
                    </table>
                </div>
            @endif
        @endauth
    </div>
</div>

@include('partials.footer')