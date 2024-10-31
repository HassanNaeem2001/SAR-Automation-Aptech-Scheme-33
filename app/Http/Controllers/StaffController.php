<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StaffTimings;
use App\Models\Teacher;
use App\Models\Batch;
use App\Models\CourseCurriculum;
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
    public function insert_batch(Request $req)
    {
        new Batch();
        $req->batchname;
        $req->courselist;
        $req->timinglist;
        $req->teacherlist;
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
}
