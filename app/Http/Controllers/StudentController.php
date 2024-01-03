<?php

namespace App\Http\Controllers;


use App\Models\Students;
use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class StudentController extends Controller
{
    public function index()
    {

        $students = Students::whereNull('deleted_at')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('students.index', ['students' => $students]);

        // This means get all data from the database that is in the students table
        // $data = array("students" => DB::table('students')->orderBy('created_at', 'desc')->Paginate(10));
        // return view('students.index', $data);
    }

    public function show($id)
    {
        $data = Students::findOrFail($id);
        return view('students.edit', ['student' => $data]);
    }

    public function create()
    {
        return view('students.create')->with('title', 'Add New Student');
    }

    // store a new student
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required', 'min:4'],
            'last_name' => ['required'],
            'gender' => ['required', 'min:4'],
            'age' => ['required'],
            'email' => ['required', 'email', Rule::unique('students', 'email')],
        ]);

        if ($request->hasFile('student_image')) {
            $request->validate([
                "student_image" => 'mimes:jpeg,jpg,webp,png,bmp,tiff|max:4096'
            ]);

            $filenameWithExtension = $request->file('student_image');

            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);

            $extension = $request->file('student_image')->getClientOriginalExtension();

            $filenameToStore = $filename . '_' . time() . '.' . $extension;

            $smallThumbnail =  $filename . '_' . time() . '.' . $extension;

            $request->file('student_image')->storeAs('public/student', $filenameToStore);

            $request->file('student_image')->storeAs('public/student/thumbnail', $smallThumbnail);

            $thumbnail = 'storage/public/student/thumbnail/' . $smallThumbnail;

            $this->createThumbnail($thumbnail, 150, 93);

            $validated['student_image'] = $filenameToStore;
        }

        Students::create($validated);

        return redirect('/')->with('message', 'New Student added successfully');
    }

    // update a student
    public function update(Request $request, Students $student)
    {
        $validated = $request->validate([
            'first_name' => ['required', 'min:4'],
            'last_name' => ['required'],
            'gender' => ['required', 'min:4'],
            'age' => ['required'],
            'email' => ['required', 'email'],
        ]);

        if ($request->hasFile('student_image')) {
            $request->validate([
                "student_image" => 'mimes:jpeg,jpg,webp,png,bmp,tiff |max:4096'
            ]);

            $filenameWithExtension = $request->file('student_image');

            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);

            $extension = $request->file('student_image')->getClientOriginalExtension();

            $filenameToStore = $filename . '_' . time() . '.' . $extension;

            $smallThumbnail =  $filename . '_' . time() . '.' . $extension;

            $request->file('student_image')->storeAs('public/student', $filenameToStore);

            $request->file('student_image')->storeAs('public/student/thumbnail', $smallThumbnail);

            $thumbnail = 'storage/public/student/thumbnail/' . $smallThumbnail;

            $this->createThumbnail($thumbnail, 150, 93);

            $validated['student_image'] = $filenameToStore;
        }

        $student->update($validated);

        return back()->with('message', 'Student updated successfully');
    }

    // delete a student
    public function destroy(Students $student)
    {
        $student->delete();

        return redirect('/')->with('message', 'Student deleted successfully');
    }

    public function createThumbnail($path, $width, $height)
    {
        $img = Image::make($path)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($path);
    }
}
