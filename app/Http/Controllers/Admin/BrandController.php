<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Brand;
use App\Models\User;
use Symfony\Component\HttpFoundation\File\UploadedFile;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('admin.brand.brand-add');    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands=Brand::with('user')->select('*')->paginate(3);
        $view=view('admin.brand.brand-list')->with(compact('brands'));
        if(request()->ajax())
        {
          $html = $view->renderSections();
          return response()->json(['success' => true, 'html' => $html]);
        }
        return $view;
        /*$request = Request::all();
        $cities = City::where('country_id', $request->id)->get();

       $html = view('layouts.partials.cities')->with(compact('cities'))->render();
        return response()->json(['success' => true, 'html' => $html]);
         return view ('partials.roombooking', compact('data'))->render() ;

        

         */
         return view('admin.brand.brand-list');
        
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
        ]);
         if ($validator->fails())
        {
            if(!$request->ajax())
            {
              return redirect()->back()->withErrors($validator)->withInput();
            }
            return response()->json(array(
                'success'=>false,
             'errors' => $validator->getMessageBag()->toArray()),400);
        }else
        {
             Brand::create($request->all());
             if(!$request->ajax())
            {
              session()->flash('msg','Post create successfully');
              return redirect()->back();
            }
          return response()->json(['msg'=>'dat inserted success'],200);

        }
        
    }
public function ajaxValidation($validator)
{
        if ($validator->fails())
        {
            return response()->json(array(
             'errors' => $validator->getMessageBag()->toArray()),400);
        }else
        {
             Brand::create($request->all());
             //return response()->json(['error'=>$validator->errors()->all()]);
             return response()->json(['msg'=>'dat inserted success']);

        }
}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        
        

        //echo("data send success");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand=Brand::with('user')->find($id);
        $view=view('admin.brand.brand-edit')->with(compact('brand'));
        
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
            'status'=>'bail|required',
            'logo'=>($request->file('logo'))?'bail|required|image|max:2048':'',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $logo_name='';
        if ($request->file('logo')) {
            $logo=$request->file('logo');
            $logo_name=uniqid('logo_',true).str_random(3).'.'.$logo->getClientOriginalExtension();
            $logo->storeAs('public/admin_img/brandLogo',$logo_name);
        }
        $form_data = array(
            'name'   =>   $request->name,
            'status' =>   $request->status,
            //'logo'   =>   ($request->file('logo'))?$logo_name:$request->old_logo,
        );
        if ($request->file('logo')) {
             $form_data['logo'] =$logo_name;
            }
        Brand::whereId($id)->update($form_data);
        session()->flash('msg','Registration successfulll');
        return redirect()->route('admin.addBrand.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand=Brand::find($id);
        $brand->delete();
        session()->flash('msg','Brand Deleted successfully');
        return redirect()->back();
    }
    public function dd(Request $request)
    {
         session()->flash('msg','Post create successfully');
        
        return redirect()->back();
    }
}
