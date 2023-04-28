<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Occasions;
use DataTables;
use App\Http\Requests\CreateOccasionRequest;



class OccasionsController extends Controller
{
    //
    public function index(Request $request){
        if ($request->ajax()) {
            
            $data = Occasions::get();
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    $url = url('admin/occasion/edit/'.$row->id);
                    $deal_url = url('admin/product/deal/'.$row->id);
                    $btn = '<a href="'.$url.'" class="edit btn btn-danger btn-sm text-white">Edit</a>&nbsp;&nbsp;';
                    $btn.= '<a href="'.$deal_url.'" class="edit btn btn-primary btn-sm text-white">Assign Occasions</a>&nbsp;&nbsp;';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
         return view('admin.occasions.index');
    }

    public function create()
    {
        //
        return view('admin.occasions.create');
    }

    public function store(CreateOccasionRequest $request)
    {
        //
        try {
            
            Occasions::saveOccasion($request->input());
            
            return response()->json(['success' => true,
                'message' => 'Occasion has been '.($request['id'] ? 'updated' : 'added')  .' successfully.'
          ], 200);

        } catch(\Exception $e){
            return response()->json(['success' => false,
                'message' => 'something went wrong'], 200);
        }  
    }

    public function edit($id)
    {
        //
        $occasion = Occasions::find($id);
        return view('admin.occasions.create',compact('occasion'));

    }

}
