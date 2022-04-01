<?php
namespace App\Http\Controllers\Admin\blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    
    public function index()
    {
        $categories=Category::all();
        return view('admin.blog.category.index',compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'slug' =>'required|unique:categories',
         ]);
        $category = Category::create([
            'name'=>$request['name'],
            'slug'=>Str::slug($request['name'])
         ]);
        return redirect()->route('admin.blog.category.index')->with('info','La categoria '.$category->name.' se creo con exito');
    }
 
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'=>'required',
            'slug' =>'required|unique:categories',

         ]);
         $category->update([
                'name'=>$request['name'],
                'slug'=>Str::slug($request['name'])
         ]);
        return redirect()->route('admin.blog.category.index')->with('info','La categoria se actualizo a: ' .$category->name.'');

    }

    
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.blog.category.index')->with('delete','La categoria se elimino con exito');
    }
}