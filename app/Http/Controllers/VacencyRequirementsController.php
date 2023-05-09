<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ResumeUpload;
use App\Models\VacencyRequirements;

class VacencyRequirementsController extends Controller
{
    //
    public function store(ResumeUpload $request){
        try {
            
            if($request->file('image')){
               
                $image = uploadImage('resume',$request->image);
                $request['image'] = $image;
            }
            
            VacencyRequirements::saveResume($request->input());
            return response()->json(['success' => true,
                'message' => 'Resume has been send successfully.'
          ], 200);

        } catch(\Exception $e){
            echo $e->getmessage();
            return response()->json(['success' => false,
                'message' => 'something went wrong'], 200);
        }  
    }
}
