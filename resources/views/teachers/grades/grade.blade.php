@include('partials.header')
@include('partials.navbar')
<div class="flex justify-center items-center">
    <div class="container px-4">
        @auth
            @if(auth()->user()->user_type == 'teacher' || auth()->user()->user_type == 'admin')
            {{-- GRADES --}}
            <div class="overflow-x-auto mt-12">
                <a class="btn bg-transparent mb-4 border border-slate-600 hover:border-slate-600 hover:bg-[rgba(0,0,0,.1)]" href="/grades">Back</a>
                <table class="table table-lg">
                <thead>
                    <tr>
                    <th>Student ID</th> 
                    <th>Name</th> 
                    <th>Grade</th> 
                    <th>Remarks</th>
                    </tr>
                </thead> 
                <tbody>
                    @if (count($grades) > 0)
                        @foreach($grades as $grade)
                            <tr>
                                <td>{{ $grade->student->user_id }}</td> 
                                <td>{{ $grade->student->fullname }}</td> 
                                <td>{{ $grade->grade }}</td> 
                                <th>{!! $grade->grade >= 5 ? '<span class="text-green-500">Passed</span>' : '<span class="text-red-500">Failed</span>' !!}</th>
                                </tr>
                        @endforeach
                    @else
                        <tr><td colspan="4">No grades.</td></tr>
                    @endif
                </tbody> 
                </table>
            </div>
            @endif
        @else
            <div class="italic font-bold mb-2">Not Found</div>
            <div><a href="/" class="btn btn-outline">Back to home</a></div>
        @endauth
    </div>
</div>
@include('partials.footer')