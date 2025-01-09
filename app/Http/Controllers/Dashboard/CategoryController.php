<?php

namespace App\Http\Controllers\Dashboard;



use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.category.index');
    }

    public function getAll()
    {

        $categories =  Category::withCount('products')->get();
        return DataTables::of($categories)
            ->addIndexColumn()
            ->addColumn('name', function ($category) {

                return $category->getTranslation('name', app()->getLocale());
            })
            ->addColumn('status', function ($category) {

               return $category->getStatusTransable();

            })
            ->addColumn('products_count', function ($category) {

                return $category->products_count == 0 ? __('dashboard.not_found') : $category->products_count;
            })

            ->addColumn('action', function ($category) {

                return view('dashboard.category.action',compact('category'));
            })



            ->make(true);
    }
    public function create()
    {
        $categories =  Category::whereNull('parent')->get();
        return view('dashboard.category.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {

        $request->validated();
       $category = Category::create([
            'name'=>[
                'ar'=>$request->name['ar'],
                'en'=>$request->name['en'],
            ],
            'parent'=>$request->parent ,
            'status'=>$request->status,
       ]);
       if(!$category){

            return redirect()->back()->with('error', __('auth.not_match'));
        }

        flash()->success(__('dashboard.success_msg'));
        return to_route('dashboard.categories.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::where('id', '!=', $category->id)
        // ->whereDosenotHave('childern')
        ->whereNull('parent')
        ->get();

        return view('dashboard.category.edit',compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {

        $request->validated();
        $category = Category::findOrFail($id);
        $category->update([
            'name'=>[
                'ar'=>$request->name['ar'],
                'en'=>$request->name['en'],
            ],
            'parent'=>$request->parent ,
            'status'=>$request->status,
       ]);
       if(!$category){

            return redirect()->back()->with('error', __('auth.not_match'));
        }

        flash()->success(__('dashboard.success_msg'));
        return to_route('dashboard.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category = $category->delete();
        Cache::forget('categories_count');
        if(!$category){

            return redirect()->back()->with('error', __('auth.not_match'));
        }
        flash()->success(__('dashboard.success_msg'));
        return to_route('dashboard.categories.index');
    }

    public function changeStatus($id)
    {
        $category = Category::findOrFail($id);

        $category->update(['status' => $category->status == 0 ? 1 : 0]);
        Session::flash('success',__("dashboard.success_msg"));

        return redirect()->back();
    }
}
