<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StaffTimings;
class StaffController extends Controller
{
    public function StaffTimings(Request $req)
    {
        
        if($req->from == '' || $req->to == '')
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
}
