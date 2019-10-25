<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Brand;
use App\Models\Category;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands=Brand::select('id','name')->get();
        return view('admin.category.category-add',compact('brands')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $categories=Category::with('user')->select('*')->paginate(3);
        $view=view('admin.category.category-list')->with(compact('categories'));
        if(request()->ajax())
        {
          $html = $view->renderSections();
          return response()->json(['success' => true, 'html' => $html]);
        }
        return $view;    
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'bail|required|min:3',
            'status'=>'bail|required|numeric',
        ]);
         if ($validator->fails())
        {
           return redirect()->back()->withErrors($validator)->withInput();
        }
        
        Category::create($request->all());
        session()->flash('msg','Category create successfully');
        return redirect()->back();
             
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $category=Category::with('user')->find($id);
        $view=view('admin.category.category-edit')->with(compact('category'));
        
        return $view;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $validator=Validator::make($request->all(),[
            'name'=>'bail|required',
            'status'=>'bail|required|numeric',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $form_data = array(
            'user_id'   =>   $request->user_id,
            'name'   =>   $request->name,
            'status' =>   $request->status,
        );
        Category::whereId($id)->update($form_data);
        session()->flash('msg','Category record successfully');
        return redirect()->route('admin.category-create.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
