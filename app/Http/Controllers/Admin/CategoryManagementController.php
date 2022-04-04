<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\StoreCategoryRequest;
use App\Http\Requests\Products\StoreProductRequest;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::orderBy('id','DESC');
        $keyword = $request->keyword;
        if($keyword) {
            $categories = $categories->where('name', 'LIKE', '%' . $keyword . '%');
        }

        $categories = $categories->paginate(2);

        return view('admin.categories.index',compact('categories','keyword'));
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
    public function store(StoreCategoryRequest $request)
    {
        try {
            $data = $request->all();
            $category = new Category;
            $category->fill($data)->save();

            return redirect()->back()->with('success','Create category successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error',$e->getMessage());
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
        $category = Category::find($id);

        return view('admin.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryRequest $request, $id)
    {
        try {
            $data = $request->all();
            $category = Category::find($id);
            $category->fill($data)->save();

            return redirect()->route('category-management.index')->with('success','Update category successfully');
        } catch (Exception $e) {

            return redirect()->back()->with('error',$e->getMessage());
        }
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
