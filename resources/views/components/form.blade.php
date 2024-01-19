@if($type == 'student')
<button class="btn btn-success" onclick="add_student.showModal()">Add Student</button>
<dialog id="add_student" class="modal">
    <div class="modal-box px-12 pt-6 pb-12 bg-base-400">
        <form method="dialog">
            <button class="btn">Close</button>
        </form>
        <h3 class="font-bold text-lg mb-2 text-center">Add Student</h3>
        <form action="{{ route('add.student') }}" method="post">
            @csrf
            <input type="text" name="fullname" id="fullname" class="px-4 py-2 w-full mb-2 border-slate-600 bg-transparent border rounded focus:outline-none" required placeholder="Full name">
            <input type="text" name="student_id" id="student_id" class="px-4 py-2 w-full mb-2 border-slate-600 bg-transparent border rounded focus:outline-none" required placeholder="Student ID">
            <input type="email" name="email" id="email" class="px-4 py-2 w-full mb-4 border-slate-600 bg-transparent border rounded focus:outline-none" required placeholder="Email">
            <button type="submit" class="px-4 py-2 w-full mb-2 border-none rounded outline-none btn btn-success">Create</button>
        </form>
    </div>
</dialog>
@else
<button class="btn btn-success" onclick="add_teacher.showModal()">Add Teacher</button>
<dialog id="add_teacher" class="modal">
    <div class="modal-box px-12 pt-6 pb-12 bg-base-400">
        <form method="dialog">
            <button class="btn">Close</button>
        </form>
        <h3 class="font-bold text-lg mb-2 text-center">Add Teacher</h3>
        <form action="{{ route('add.teacher') }}" method="post">
            @csrf
            <input type="text" name="fullname" id="fullname" class="px-4 py-2 w-full mb-2 border border-slate-600 rounded focus:outline-none bg-transparent" required placeholder="Full name">
            <input type="text" name="teacher_id" id="teacher_id" class="px-4 py-2 w-full mb-2 border border-slate-600 rounded focus:outline-none bg-transparent" required placeholder="Teacher ID">
            <input type="email" name="email" id="email" class="px-4 py-2 w-full mb-4 border border-slate-600 rounded focus:outline-none bg-transparent" required placeholder="Email">
            <button type="submit" class="px-4 py-2 w-full mb-2 border-none rounded outline-none btn btn-success">Create</button>
        </form>
    </div>
</dialog>
@endif