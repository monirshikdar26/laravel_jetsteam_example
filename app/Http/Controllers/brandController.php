<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class brandController extends Controller
{
    public function Allbrand(){
        $brands = Brand::latest()->paginate(5);
        return view('admin.brand.index',compact('brands'));
    }


    public function AddBrand(Request $request){
        $validatedData = $request->validate([
            'brand_name' => 'required|unique:brands|min:4',
            'brand_image' => 'required|mimes:jpg,jpeg,png',
        ],
        [
            'brand_name.required' => 'Please Input Brand Name',
            'brand_image.min' => 'Image Longer then 4Chars',
        ]
        );


        $brand_image = $request->file('brand_image');
        $imageid_gen = hexdec(uniqid());
        $img_extention = strtolower($brand_image->getClientOriginalExtension());
        $img_name = $imageid_gen.'.'.$img_extention;
        $upload_path = 'image/brand/';
        $img_file = $upload_path.$img_name;
        $brand_image->move($upload_path,$img_name);


        $brand = new Brand;
        $brand->brand_name = $request->brand_name;
        $brand->brand_image = $img_file;
        //$brand->created_at = Carbon::now();
        $brand->save();
        return Redirect()->back()->with('Success','Brand added successfuly');

    }

    public function Edit($id){
        $brand = Brand::find($id);
        return view('admin.brand.edit', compact('brand'));
    }

    public function Update(Request $request,$id){
        $validatedData = $request->validate([
            'brand_name' => 'required|min:4',
            'brand_image' => 'required|mimes:jpg,jpeg,png',
        ],
        [
            'brand_name.required' => 'Please Input Brand Name',
            'brand_image.min' => 'Image Longer then 4Chars',
        ]);

        $old_image = $request->old_image;

        $brand_image = $request->file('brand_image');
        $imageid_gen = hexdec(uniqid());
        $img_extention = strtolower($brand_image->getClientOriginalExtension());
        $img_name = $imageid_gen.'.'.$img_extention;
        $upload_path = 'image/brand/';
        $img_file = $upload_path.$img_name;
        $brand_image->move($upload_path,$img_name);

        unlink($old_image);

        //Brand::find($id)->update([
          //  'brand_name' => $request->brand_name,
            //'brand_image' => $img_file
        //]);
        $brand = new Brand;
        $brand->brand_name = $request->brand_name;
        $brand->brand_image = $img_file;
        $brand->update();

        return Redirect()->back()->with('Success','Brand updated successfully');

    }

    public function Delete(){

    }
}
