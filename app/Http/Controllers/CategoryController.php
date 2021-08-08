<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function AllCat(){
        $category = Category::latest()->paginate(5);
       // $trashCat = Category::onlyTrashed()->latest()->paginate(3);
        return view('admin.category.index',compact('category'));
    }

    public function AddCat(Request $request){
        $validatedData = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ],
        //[
          //  'category_name.required' => 'Please Input Category Name',
          // 'category_name.max' => 'Category Less then 255Chars',
       // ]
    );

   // Category::insert([
     //   'category_name' => $request->category_name,
       // 'user_id' => Auth::user()->id,
        //'created_at' => Carbon::now()
    //]);

    $category = new Category;
    $category->category_name = $request->category_name;
    $category->user_id = Auth::user()->id;
    $category->save();

    // Queriy bulider
    // $data = array();
    // $data['category_name'] = $request->category_name;
    // $data['user_id'] = Auth::user()->id;
    // DB::table('categories')->insert($data);

    return Redirect()->back()->with('Success','Category Inserted Successfully');
    }

    public function Edit($id){
          $category = Category::find($id);
          return view('admin.category.edit', compact('category'));
    }

    public function Update(Request $request ,$id){
        $category = Category::find($id)->update([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id
        ]);
        return Redirect()->Route('all.category')->with('Success','Category Updated Successfully');
    }

    public function SoftDelete($id){
        $delete = Category::find($id)->delete();
        return Redirect()->back()->with('Success','Category Softdeleted successfully ');
    }

    public function TrashCat(){
        $trashCat = Category::onlyTrashed()->latest()->paginate(3);
     return view('admin.category.trash',compact('trashCat'));
    }

    public function Restore($id){
        $restore = Category::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('Success','Category Restored successfully ');
    }

    public function Delete($id){
       $pdelete = Category::onlyTrashed()->find($id)->forceDelete();
    return Redirect()->back()->with('Success','Category Permanently Deleted Successfully');
    }
}
