@include('partials.header')
@include('partials.navbar')

@auth
    @if(auth()->user()->user_type == 'admin')
        <div class="flex justify-center items-center">
            <div class="container flex justify-center flex-col items-center px-4">
                <div class="w-full lg:w-[50%]">
                    <a class="btn bg-transparent mb-4 border border-slate-600 hover:border-slate-600 hover:bg-[rgba(0,0,0,.1)]" href="/teachers">Back</a>
                </div>
                <form method="post" action="{{ route('tag.store') }}" class="border border-slate-600 rounded px-12 py-12 w-full lg:w-1/2">
                    @csrf
                    <div class="text-center text-2xl font-bold">Tag Students:</div>
                    <br>
                    <input type="hidden" value="{{ $id }}" name="teacher_id" id="teacher_id">
                    <div class="flex flex-col justify-center items-center">
                        @foreach($students as $student)
                        <label for="{{ $student->id }}" class="cursor-pointer group btn text-base mb-2">
                            <input type="checkbox" name="students[]" value="{{ $student->id }}" id="{{ $student->id }}"
                            @if($tags->contains('student_id', $student->id)) checked @endif>
                            {{ $student->fullname }}
                        </label>
                        @endforeach
                        <br>
                        <button type="submit" class="btn btn-success">Save Tags</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
@endauth
@include('partials.footer')