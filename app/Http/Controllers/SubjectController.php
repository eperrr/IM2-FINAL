<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enrolled_subject;
use App\Subject;
use App\Student;
use Response;
use DB;

class SubjectController extends Controller
{
    public function index() {
        $subjects = Subject::all();

        return view('subject.subjects', [
            'subjects' => $subjects
        ]);
    }

    public function store() {
        $subject = new Subject();

        $subject->name = request('name');
        $subject->capacity = request('capacity');
        $subject->room = request('room');
        $subject->schedule = request('schedule');
        $subject->enrollees = 0;

        $subject->save();
    }

    public function update($id) {
        $subject = Subject::find($id);

        $subject->name = request('subjectName');
        $subject->capacity = request('capacity');
        $subject->room = request('room');
        $subject->schedule = request('schedule');

        $subject->save();
    }

    public function delete($id) {
        // find record of all enrollments to that subject
        $record = Enrolled_subject::where('subject_id', $id);

        // loop through all enrollments
        foreach($record as $enrollment) {

          // check to see the student in that enrollment record is enrolled in any other subject
          // if they are not, set their status to unenrolled
          $isEnrolled = Enrolled_subject::where('student_id', $enrollment->student_id)->count();
          if($isEnrolled == 0) {
            $student = Student::find($enrollment->student_id);
            $student->status = 'Unenrolled';
            $student-save();
          }
        }

        // delete all enrollment records for that subject and finally delete the subject
        $record->delete();
        Subject::destroy($id);
    }

    public function show($id) {
        $enrolled = DB::table('students')
            ->join('enrolled_subjects', 'students.id', '=', 'enrolled_subjects.student_id')
            ->join('subjects', 'subjects.id', '=', 'enrolled_subjects.subject_id')
            ->select('students.id', 'students.first_name', 'students.last_name', 'students.contact_number', 'enrolled_subjects.status')
            ->where('subjects.id', '=', $id)
            ->get();

        return response::json($enrolled);
    }

    public function unenroll($id) {
        if (Enrolled_subject::where('subject_id', request('subId'))->where('student_id', $id)->exists()){
            $record = Enrolled_subject::where('subject_id', request('subId'))->where('student_id', $id);
            $record->delete();

            $subject = Subject::find(request('subId'));

            $subject->enrollees -= 1;
            $subject->save();
        }else{
            return 0;
        }
    }
}
