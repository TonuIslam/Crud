<?php
namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use DB;
class CategoryController extends Controller
{
    public function AllCat()
    {
    	$categorise = Category::latest()->paginate(5);
    	// dd($categorise);
        $trashCat = Category::onlyTrashed()->latest()->paginate(5);
    	return view('admin.category.index',compact('categorise','trashCat'));
    }

    public function AddCat(Request $request)
    {

    	 $request->validate([
        'category_name' => 'required|max:255',
        
    ],
	[
        'category_name.required' => 'Please Input Category Name',
        'category_name.max' => 'Category less than 255 character',
        
    ]);
    $category=Category::insert([
    	 	'category_name'=>$request->category_name,
    	 	'user_id'=>Auth::user()->id,
    	 	'created_at'=>Carbon::now()
    	 ]);
    // return response()->json($category);

    return Redirect()->back()->with('success','Category Inserted');
    }

// edit
    public function Edit($id)
    {
        $categorise =Category::find($id);

        return view('admin.category.edit',compact('categorise'));

    }
    // update

    public function update(Request $request,$id)
    {
        $update=Category::find($id)->update([

            'category_name'=>$request->category_name,
            'user_id'=>Auth::user()->id,
        ]);

        return Redirect()->route('all.category')->with('success','category updated');
    }
// softdelete

    public function softdelete($id)
    {

        $delete=Category::find($id)->delete();
        return Redirect()->back()->with('success','category delete');

    }
    // restore
    public function Restore($id)
    {

        $delete=Category::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success','category restore');

    }
    // p_delete
    public function P_Delete($id)
    {

        $delete=Category::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success','category parmanent delete');
    }
}
