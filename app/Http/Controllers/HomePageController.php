<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Photo;
use App\Slider;
use App\CoverTop;
use App\CoverBottom;
use App\Logo;
use App\Magazine;
use App\Video;
use App\Category;
use App\Album;
use App\Albumphoto;
use App\Booking;

class HomePageController extends Controller {

    public function homepage() {

        $data['sliders'] = Slider::where('is_active', 1)->get();
        $data['logo'] = Logo::where('is_active', 1)->first();
        $data['covertop'] = CoverTop::where('is_active', 1)->first();
        $data['coverbottom'] = CoverBottom::where('is_active', 1)->first();
        $data['magazines'] = Magazine::all();
        $data['videos'] = Video::orderBy('id', 'DESC')->get();
        $data['categories'] = Category::all();
        $data['category'] =Category::all()->pluck('name', 'id');



        return $data;
    }

    public function index() {

        $data = $this->homepage();

        return view('page.index')->with($data);
    }

    public function contact(Request $request) {

        $data = $this->homepage();

        return view('page.contact')->with($data);
    }

     public function reserve() {

        $data = $this->homepage();

        return view('page.reserve')->with($data);
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'booking_date' => 'required',
            'category_id' => 'required',
            'phonenumber' => 'required',
        ]);

        $booking = Booking::create($request->all());

        Session::flash('create_booking','The booking has been create!!!');

        return back();
    }

    public function video(Request $request) {

        $data = $this->homepage();
        return view('page.video')->with($data);
    }

    public function magazine(Request $request) {

        $data = $this->homepage();
        return view('page.magazine')->with($data);
    }

    public function downloadmagazine($id) {
        
        $magazine = Magazine::find($id);
        $count = $magazine->count + 1;

        $magazine->update(['count' => $count]);
       
        $pathToFile = $magazine->file_download;
        return Redirect::to($pathToFile);
       
    }

    public function photo($id) {

        $data = $this->homepage();
        
        $photos = Album::where('category_id', $id)->orderBy('id','DESC')->get();
        if (!$photos->isEmpty()){
        foreach ($photos as $photo) {

            $albums[] = Albumphoto::where('album_id', $photo->id)->first();
           
        }
       // return $photos;
            return view('page.photo')->with($data)->with(compact('albums'));
        }else{
            return back();
        }
       

    }
    public function album($id){
        $data = $this->homepage();
        $data['albums'] = Albumphoto::where('album_id', $id)->get();
        return view('page.album')->with($data);
    }

































}
