<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Models\Student;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class StudentController extends Controller
{
    public function index(Request $request){
        $students = Student::with('teacher')
        ->orderBy('id','DESC')
        ->get();
       
        
        if($request->ajax()){
            $html = View::make('students',compact('students'))->render();
            return response()->json(['status'=> true,'html' => $html]);
        }else{
            $teachers = User::orderBy('id','ASC')->get();
            return view('welcome',compact('students','teachers'));
        }
       
    }
    public function save_student(Request $request){
        $input = $request->all();
        $arr = [
            'name' => $input['name'],
            'gender' => $input['gender'],
            'age' => $input['age'],
            'staff_id' =>$input['staff_id']
        ];
        if(isset($input['id'])){
            if(Student::where('id',$input['id'])->update($arr)){
                return response()->json(['status'=>true,'message'=>'Updated successfully']);
            }else{
                return response()->json(['status'=>false,'message'=>'Database error']);
            }
        }else{
            if(Student::create($arr)){
                return response()->json(['status'=>true,'message'=>'Added successfully']);
            }else{
                return response()->json(['status'=>false,'message'=>'Database error']);
            }
        }

    }

    public function delete_student(Request $request){
        $input = $request->all();
        
        Mark::where('student_id',$input['id'])->delete();
        if(Student::where('id',$input['id'])->delete()){
            return response()->json(['status'=>true,'message'=>'Deleted successfully']);
        }else{

        }
    }
    public function edit(Request $request){
        $input = $request->all();

        $student = Student::with('teacher')
        ->where('id',$input['id'])
        ->first();

        $teachers = User::orderBy('id','ASC')->get();

        $html = View::make('modals.editstudent',compact('student','teachers'))->render();
        return response()->json(['status'=> true,'html' => $html]);
    }
    public function get_student(){
        
    }
    public function update_marks(Request $request){
        $input = $request->all();
       
        $subject_ids = $input['subjects'];
        $subject_values = $input['subject_values'];

        foreach ($subject_ids as $key => $sub_id) {
            $mark_data = [
                'student_id' => $input['student_id'],
                'term' => $input['term'],
                'subject_id' => $sub_id,
                'marks' => $subject_values[$key]
            ];
            $current_mark = Mark::where('student_id',$input['student_id'])
            ->where('term',$input['term'])
            ->where('subject_id',$sub_id)
            ->first();
            if($current_mark){
                Mark::where('id',$current_mark->id)->update([
                    'marks' => $subject_values[$key]
                ]);
            }else{
                Mark::create($mark_data);
            }
        }
        return response()->json(['status'=> true,'message' => 'Update successfully']);
    }
    public function add_marks(Request $request){
        $students = Student::orderBy('id','DESC')
        ->get();

        $subjects = Subject::orderBy('id','ASC')->get();

        $html = View::make('modals.addmark',compact('students','subjects'))->render();
        return response()->json(['status'=> true,'html' => $html]);
    }

    public function get_marks(Request $request){
        $input = $request->all();
        $marks = Mark::where('student_id',$input['student_id'])
                ->where('term',$input['term'])
                ->get();
        if(count($marks) > 0){
            return response()->json(['status'=> true,'marks' => $marks]);
        }else{
            return response()->json(['status'=> false,'message' => 'Marks not found']);
        }

    }

    public function get_all_marks(Request $request){
        $input = $request->all();
        $term1_records = Student::has('marks')
        ->with(['marks'=> function ($query) {
            $query->where('term', '=', 'one');
        }])
        ->get();

        // dd($term1_records);
        $term2_records = Student::has('marks')
        ->with(['marks'=> function ($query) {
            $query->where('term', '=', 'two');
        }])
        ->get();

        $subjects = Subject::orderBy('id','ASC')->get();

        $html = View::make('modals.marklist',compact('term1_records','term2_records','subjects'))->render();
        return response()->json(['status'=> true,'html' => $html]);
    
    }
}
