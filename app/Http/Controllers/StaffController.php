<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StaffTimings;
use App\Models\Teacher;
use App\Models\Batch;
use App\Models\CourseCurriculum;
use Illuminate\Support\Facades\DB;
class StaffController extends Controller
{
    public function StaffTimings(Request $req)
    {
        
        if($req->starttime == '' || $req->endtime == '')
        {
            return redirect()->back()->with('ErrorMessage','One or more fields are empty');

        }
        else{
            $st = new StaffTimings();
        $st->from = $req->starttime;
        $st->to = $req->endtime;
        $st->save();
        return redirect()->back()->with('SuccessMessage','Timings Added Successfully');
        }

    }
    public function addteacherform()
    {
        $st = StaffTimings::get();
        return View('add_teacher',compact('st'));
    }
    public function InsertTeacher(Request $req)
    {
        // $req->validate([
        //     'firstname'=>'required',
        //     'lastname'=>'required',
        //     'contactno'=>'required',
        //     'timings'=>'required'
        // ]);
        if($req->firstname == '' || $req->lastname == '' || $req->contactno == '' || $req->timings == '')
        {
            return redirect()->back()->with('ErrorMessage','One or more fields are empty');
        }
        else
        {
            $t = new Teacher();
            $t->firstname = $req->firstname;
            $t->lastname = $req->lastname;
            $t->contactno = $req->contactno;
            $t->timings = $req->timings;
            $t->save();
            return redirect()->back()->with('SuccessMessage','Teacher has been added');
        }
    }
    public function GetBatchForm()
    {
        $rec1 = Teacher::get();
        $rec2 = StaffTimings::get();
        $rec3 = CourseCurriculum::get();
        return View('add_batch',compact(['rec1','rec2','rec3']));
    }
    public function insert_cf(Request $req)
    {
       if($req->coursefamily == '')
       {
        return redirect()->back()->with('ErrorMessage','The field is empty');
       }
       else{
        $t =  new CourseCurriculum();
        $cf = $req->coursefamily;
        $t->Course_Name = $cf;
        $t->save();
        return redirect()->back()->with('SuccessMessage','Course Family Added');
       }


    }
    public function insert_batch(Request $req)
    {
        // if($req->batchname == '' || $req->teacherlist == '' || $req->timinglist == '' || $req->courselist == '')
        // {
        $b = new Batch();
        $b->BatchName = $req->batchname;
        $b->BatchTeacher = $req->teacherlist;
        $b->BatchTimings = $req->timinglist;
        $b->BatchCF = $req->courselist;
        $b->save();
        return redirect()->back()->with('SuccessMessage','Batch Inserted');
        // }
        // else
        // {
        //     return redirect()->back()->with('ErrorMessage','Failed To Insert Batch');
        // }
        
    }
    public function get_teachers()
    {
        $teacher = DB::table('teachers')
        ->leftJoin('batches', 'teachers.id', '=', 'batches.BatchTeacher')
        ->select('teachers.*', DB::raw('GROUP_CONCAT(batches.BatchName) as BatchNames'))
        ->where('teachers.status', '=', 1) 
        ->groupBy('teachers.id')
        ->get();
        return view('getteachers',compact('teacher'));
    }
    public function deleteteacher(Request $req)
    {
        $id = $req->post('id');
        $t = Teacher::find($id);
        $t->status=0;
        $t->save();
        return response()->json('Teacher De Activated');
    }
    public function deletebatch(Request $req)
    {
        $id = $req->post('id');
        $t = Batch::find($id);
        $t->Batchstatus=0;
        $t->save();
        return response()->json('Batch De Activated');
    }
    public function getbatches()
    {
        $batch = DB::table('batches')
        ->join('teachers', 'teachers.id', '=', 'batches.BatchTeacher')
        ->join('course_curricula', 'course_curricula.id', '=', 'batches.BatchCF')
        ->select(
            'teachers.*', 
            'batches.*', 
            'course_curricula.*',
            'batches.created_at as batch_start',  // Alias BatchStart to avoid conflict
            'course_curricula.created_at as course_created_at' // Alias created_at to avoid conflict
        )
        ->where('batches.BatchStatus', '=', 1)
        ->get();
    
    return view('getbatches', compact('batch'));
    
    }
}
