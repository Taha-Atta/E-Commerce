<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Brand;
use App\ulits\Imagemanger;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use GuzzleHttp\Promise\Create;
use App\Http\Requests\BrandRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        return view('dashboard.brand.index');
    }

    public function getAll()
    {
        $brands =  Brand::withCount('products')->latest()->get();
        return DataTables::of($brands)
            ->addIndexColumn()
            ->addColumn('name', function ($brand) {

                return $brand->getTranslation('name', app()->getLocale());
            })
            ->addColumn('status', function ($brand) {

                return $brand->getStatus();
            })
            ->addColumn('products_count', function ($brand) {

                return $brand->products_count == 0 ? __('dashboard.not_found') : $brand->products_count;
            })
            ->addColumn('logo', function ($brand) {

                return view('dashboard.brand.logo', compact('brand'));
            })

            ->addColumn('action', function ($brand) {

                return view('dashboard.brand.action', compact('brand'));
            })


            ->rawColumns(['action', 'logo'])
            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
    {
        $request->validated();
        $path = Imagemanger::UploadSingleImage($request->logo,'brands','brands');
        $brand = Brand::create([
            'name' => [
                'ar' => $request->name['ar'],
                'en' => $request->name['en'],
            ],
            'logo'=>$path,
            'status' => $request->status,
        ]);


        if (!$brand) {

            return redirect()->back()->with('error', __('auth.not_match'));
        }

        flash()->success(__('dashboard.success_msg'));
        return to_route('dashboard.brands.index');
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
        $brand = Brand::findOrFail($id);
        return view('dashboard.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, string $id)
    {

        $data = $request->validated();
        $brand = Brand::findOrFail($id);
        if ($request->hasFile('logo')) {

            $path = Imagemanger::UploadSingleImage($request->logo,'brands');
            $brand->update(['logo' => $path]);
        }
        $brand->update([
            'name' => [
                'ar' => $request->name['ar'],
                'en' => $request->name['en'],
            ],
            'status' => $request->status,
        ]);
        if (!$brand) {

            return redirect()->back()->with('error', __('auth.not_match'));
        }
        flash()->success(__('dashboard.success_msg'));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::findOrFail($id);
        if($brand->logo != null ){
            Imagemanger::RemovesingleImage($brand->logo);
        }
        $brand->delete();
        Cache::forget('brands_count');
        if (!$brand) {
            return redirect()->back()->with('error', __('auth.not_match'));
        }
        flash()->success(__('dashboard.success_msg'));
        return redirect()->back();
    }

    public function changeStatus($id)
    {
        $brand = Brand::findOrFail($id);

        $brand->update(['status' => $brand->status == 0 ? 1 : 0]);
        Session::flash('success', __("dashboard.success_msg"));

        return redirect()->back();
    }
}
