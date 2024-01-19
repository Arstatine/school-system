@include('partials.header')
@include('partials.navbar')
<div class="flex justify-center items-center">
    <div class="container px-4">
        @auth
            @if(auth()->user()->user_type == 'teacher' || auth()->user()->user_type == 'admin')
            {{-- UPLOAD GRADE --}}
                @if(auth()->user()->user_type == 'teacher')
                    <button class="btn btn-success" onclick="upload_grade.showModal()">Upload Grade</button>
                @endif
            <dialog id="upload_grade" class="modal">
                <div class="modal-box px-12 pt-6 pb-12 bg-base-400">
                    <form method="dialog">
                        <button class="btn">Close</button>
                    </form>
                    <h3 class="font-bold text-lg mb-2 text-center">Upload Grade</h3>
                    <form action="{{ route('upload.grade') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file" id="file" class="px-4 py-2 w-full mb-2 border border-slate-600 rounded focus:outline-none bg-transparent" required accept=".xlsx, .xls, .csv">
                        <button type="submit" class="px-4 py-2 w-full mb-2 border-none rounded outline-none btn btn-success">Upload</button>
                    </form>
                </div>
            </dialog>

            {{-- GRADE LISTS --}}
            <div class="overflow-x-auto mt-12">
                <table class="table table-lg">
                <thead>
                    <tr>
                    <th></th> 
                    <th>Grade ID</th> 
                    <th>Teacher ID</th> 
                    <th>Date Uploaded</th> 
                    </tr>
                </thead> 
                <tbody>
                    @if (count($grades) > 0)
                    @php
                        $count = 1;   
                    @endphp

                    @foreach($grades as $grade)
                            <tr>
                                <th>{{ $count }}</th> 
                                <td>{{ $grade->first()->group_id }}</td> 
                                <td>{{ $grade->first()->teacher->user_id }}</td> 
                                <td>{{ $grade->first()->created_at }}</td> 
                                <th>
                                    <a class="btn btn-ghost btn-xs" href="/grade/{{ $grade->first()->group_id }}">View Grade</a>
                                </th>
                            </tr>
                            @php
                                $count++;
                            @endphp
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