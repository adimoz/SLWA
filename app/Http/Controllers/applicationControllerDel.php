<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\applicationController;



class applicationEvaluationFactory{

    public function create(Request $req){

        $Application = new Application;

        $Application->approvedByFaculty = $req->approvedByFaculty;
        $Application->approvedBySRAD = $req->approvedBySRAD;
        $Application->facultyReviewStartDate = $req->facultyReviewStartDate;
        $Application->reviewDueDate= $req->reviewDueDate;
       
        
        
        $studentApplication->save();

    }
}



