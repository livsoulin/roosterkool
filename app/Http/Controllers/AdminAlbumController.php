<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Session;
use App\Album;
use App\Albumphoto;

class AdminAlbumController extends Controller {

    public function index() {

        $titles = Album::all();
        return view('admin.album.index', compact('titles'));
    }

    public function create() {
        $category = Category::all()->pluck('name', 'id');
        return view('admin.album.create', compact('category'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
        ]);
        $album = Album::create([
            'name' => $request->name,
            'category_id' => $request->category_id
        ]);
        $id = $album->id;
        return view('admin.album.createimage', compact('id'));
    }

    public function createimage(Request $request) {

        $input = $request->id;
        $file = $request->file('file');

        $name = time() . $file->getClientOriginalName();

        $file->move('images', $name);

        Albumphoto::create([
            'file' => $name,
            'album_id' => $input
        ]);


        return back();
    }

    public function show($id) {
        //
        $photos = Albumphoto::where('album_id', $id)->get();
        $titleid = $id;
        return view('admin.album.show', compact('photos','titleid'));
    }

    public function edit($id) {
        $title = Album::find($id);
        $category = Category::all()->pluck('name', 'id');
        return view('admin.album.edit', compact('title', 'category'));
    }

    public function update(Request $request, $id) {

        $title = Album::find($id);

        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
        ]);

        $title->update([
            'name' => $request->name,
            'category_id' => $request->category_id
        ]);

        return redirect('admin/album');
    }

    public function destroy($id) {
        
        $title = album::find($id);
        $title->delete();
        Session::flash('delete_album','The user has been deleted!!!');
        
        return redirect('admin/album');




    }
    public function deleteAlbum(Request $request){
        
       $photos = Albumphoto::findOrFail($request->checkBoxArray);
        
        foreach ($photos as $photo){
            unlink(public_path().$photo->file);
            $photo->delete();
        }
        return back() ;
    }

}
