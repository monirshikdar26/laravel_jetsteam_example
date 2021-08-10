<?php

namespace App\Http\Controllers;

use App\Models\Multipic;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class MultipicController extends Controller
{
    public function AllMultipic(){
        $multipic = Multipic::all();
        return view('admin.multipic.index',compact('multipic'));
    }

    public function Addmultipic(Request $request){
        $image = $request->file('image');

        foreach($image as $multi_image){

        $imageid_gen = hexdec(uniqid()).'.'.$multi_image->getClientOriginalExtension();
        Image::make($multi_image)->resize(300,200)->save('image/multipic/'.$imageid_gen);

        $last_img = 'image/multipic/'.$imageid_gen;

        //$multipic = new Multipic;
        //$multipic->image = $last_img;
        //$brand->created_at = Carbon::now();
        //$multipic->save();

    Multipic::insert([
       'image' => $last_img,
       // 'user_id' => Auth::user()->id,
       'created_at' => Carbon::now()
    ]);

    }
        return Redirect()->back()->with('Success','Multiple Image upload successfuly');


    }
}
