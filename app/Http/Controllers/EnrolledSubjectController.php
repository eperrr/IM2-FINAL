<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enrolled_subject;
use App\Subject;
use App\Student;
use Response;

class EnrolledSubjectController extends Controller
{
    public function index(){
        $subjects = Subject::all();

        return view('enrollment.enroll', [
            'subjects' => $subjects
        ]);
    }

    public function show() {
        $subjects = Subject::all();
        return view('enrollment.enroll', [
            'subjects' => $subjects
        ]);
    }

    public function show_results($subjectName) {
        // $results = Subject::where('name', 'LIKE', '%$name%');
        $results = Subject::where('name', 'like', '%' . $subjectName . '%')->get();
        return response::json($results);
    }

    public function enroll_student($subjectId) {
        $msg = 0;
        if(Subject::find($subjectId)){
            $house_code = Student::select('house_code')->where('id', request('id'))->get();
            //looking for value not submitted in POST, changed to house_code
            $isEnrolled = Enrolled_subject::where(['subject_id' => $subjectId, 'student_id' => request('id'), ['status','!=','unenrolled']])->get();
            // $isFull = Subject::where([['capacity','=','enrollees'], 'id' => $subjectId])->count();
            $isFull = Subject::find($subjectId);
            if(!Student::find(request('id'))&& (count($house_code) == 0 || $house_code[0]['house_code'] !== request('house_code'))){$msg = 2;}
            else if(Student::find(request('id'))->status=='Deleted'){ $msg = 2;}
            else if(count($isEnrolled) > 0){ $msg = 3; }
            else if($isFull->enrollees == $isFull->capacity){ $msg = 4; }
            else{
                $enroll = new Enrolled_subject;
                $enroll->subject_id = $subjectId;
                $enroll->student_id = request('id');
                $enroll->status = 'pending';
                $enroll->save();
                $msg = 1;
            }
        }
        return $msg; 
    }
    public function change_status($subjectId) {
        // $isEnrolled = Enrolled_subject::where(['subject_id' => $subjectId, 'student_id' => request('studentId')])->get();
        $isEnrolled = Enrolled_subject::find(request('id'));
        if(request('status')=='approved'){
            $subject = Subject::find($subjectId);
            $subject->increment('enrollees');
            $subject->save();
            $student_status = Student::find(request('studentId'));
            $student_status->status = 'enrolled';
            $student_status->save();
        }else if(request('status')=='deleted'){
            $subject = Subject::find($subjectId);
            if($isEnrolled->status == 'approved'){
                $subject->decrement('enrollees');
                $subject->save();
            }
            $isEnrolledCount = Enrolled_subject::where(['student_id' => request('studentId'), ['status','!=','deleted']])->count();
            if($isEnrolledCount==0){
                $student_status = Student::find(request('studentId'));
                $student_status->status = 'unenrolled';
                $student_status->save();
            }
        }
        $isEnrolled -> status = request('status');
        $isEnrolled -> save();
    }
}
