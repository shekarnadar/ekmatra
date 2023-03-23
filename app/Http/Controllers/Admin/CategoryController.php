<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use DataTables;

class CategoryController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
			if ($request->ajax()) {
					$data = Category::getCategories();
					return Datatables::of($data)
					->addColumn('image', function($row){
						$imageval = url('category/' . $row->image);
                    return '<img src="' . $imageval . '" class="h-50 w-50"/>';
					 })
						->addColumn('action', function($row){
								$url = url('admin/category/edit')."/".$row->id;
								$btn = '<a href="'.$url.'" class="edit btn btn-primary btn-sm">Edit</a>&nbsp;&nbsp;';
								return $btn;
					 })
					->rawColumns(['action', 'image'])
					->make(true);
			}
				return view('admin.category.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
		return view('admin.category.create');

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		try {
		  $image = uploadImage('category',$request->image);
		  $request['image'] = $image;
		  
		  Category::saveCategory($request->input());
			 return response()->json(['success' => true,
				'message' => 'Category has been added successfully.'
		  ], 200);

		} catch(\Exception $e){
			return response()->json(['success' => false,
				'message' => 'something went wrong'], 200);
		}  
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Category  $category
	 * @return \Illuminate\Http\Response
	 */
	public function show(Category $category)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Category  $category
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
		$category = Category::find($id);
		echo $id;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Category  $category
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Category $category)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Category  $category
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		 try {

            $category  = Category::find($id);
            $category->delete();

            return response()->json(['success' => true,
                     'message' => 'deleted sucessfully'
            ], 200);

        } catch(\Exception $e){
            return response()->json(['success' => false,
                'message' => 'something went wrong'], 200);
        }  
	}
}
