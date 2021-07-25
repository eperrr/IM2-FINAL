<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Enrolled_subject;
use App\Subject;
use App\Student;
use Response;

class StudentController extends Controller
{
    public function index() {
        $students = Student::orderByDesc('updated_at')->get();

        return view('student.students', [
            'students' => $students
        ]);
    
    }

    public function store() {
        $student = new student();

        $student->id = request('id');
        $student->first_name = request('fname');
        $student->last_name = request('lname');
        $student->house_code = request('house_code');
        $student->contact_number = request('contact_number');

        $student->save();
    }

    public function delete($id) {
        $student = Enrolled_subject::where('student_id', $id)->get();
        foreach($student as $stud){
            $subject = Subject::find($stud->subject_id);
            if($stud->status=='approved'){
                $subject->decrement('enrollees');
                $subject->save();
            }
        }
        Enrolled_subject::where('student_id', $id)->delete();
        Student::destroy($id);
    }

    public function update($id) {
        $student = Student::find($id);
        echo $id;
        $student->id = request('id');
        $student->first_name = request('firstName');
        $student->last_name = request('lastName');
        $student->house_code = request('house_code');
        $student->contact_number = request('contact_number');
        $student->status = request('status');
        $student->save();
        if(request('status') == 'Deleted' || request('status') == 'Unenrolled'){
            $student = Enrolled_subject::where('student_id', $id)->get();
            foreach($student as $stud){
                $subject = Subject::find($stud->subject_id);
                if($stud->status=='approved'){
                    $subject->decrement('enrollees');
                    $subject->save();
                }
            }
            Enrolled_subject::where('student_id', $id)->delete();
        }

        
    }
}
