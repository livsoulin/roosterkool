<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Photo;
use App\Slider;

class AdminSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Slider::orderBy('id','DESC')->get();
        
        return view('admin.slider.index', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        
        
        
        if ($request->name != ""){
            
            if ($file = $request->file('name')) {
                // 
                $name = time() . $file->getClientOriginalName();
                $file->move('images', $name);
                // create to table Photo
                $photo = Photo::create(['file' => $name]);

                $input['photo_id'] = $photo->id;
            }

            Slider::create($input);
            Session::flash('create_slider', 'The user has been successful!!!');
        }
        
        return back();
        
    }
    public function updateslider(Request $request) {
                
        if(isset($request->updatedata)){
       // update before
            Slider::where('is_active',1)->update(['is_active' => 0]);
            $id = $request->id;
            
            if ($id != ""){
                foreach ($id as $ids){
                   $slider = Slider::find($ids)->update(['is_active' => 1]);
                }
            } 
            return back();         
       }       
    }
    
    public function deleteslider($id) {
        
       $slider = Slider::find($id);
       
       $photoid = $slider->photo->id;
       $photodelete = Photo::find($photoid)->delete();
        
        unlink(public_path() . $slider->photo->file);
        $slider->id;
        
        $slider->delete();
        
        return back();
    }
}
