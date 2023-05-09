<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ResumeUpload;
use App\Models\VacencyRequirements;
use DataTables;

class VacencyRequirementsController extends Controller
{
    //
    public function index(Request $request){
        if ($request->ajax()) {
                    $data = VacencyRequirements::get();
                    return Datatables::of($data)
                        ->addColumn('action', function($row){
                             $url = url('admin/job-post/download/'.$row->id);
                            $btn= '<a href="'.$url.'" class="delete btn btn-primary btn-sm text-white" data-id="'.$row->id.'">Download</a>';

                            return $btn;
                     })
                    ->rawColumns(['action'])
                    ->make(true);
            }
                return view('admin.we_are_hiring.job-post');
    }
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

    public function jobDownload($id){
        $VacencyRequirements = VacencyRequirements::find($id);
        $file= public_path(). "/resume/".$VacencyRequirements['image'];

        $headers = array(
              'Content-Type: application/pdf',
            );

    return \Response::download($file, $VacencyRequirements['image'], $headers);

    }
}
