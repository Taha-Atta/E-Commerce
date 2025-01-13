<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CouponRequest;
use Yajra\DataTables\Facades\DataTables;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.coupon.index');
    }

    public function getAll()
    {
        $coupons =  Coupon::latest()->get();
        return DataTables::of($coupons)
            ->addIndexColumn()
            ->addColumn('status', function ($coupon) {

                return $coupon->status();
            })

            ->addColumn('action', function ($coupon) {

                return view('dashboard.coupon.action', compact('coupon'));
            })


            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CouponRequest $request)
    {
        $request->validated();
        // dd($request);
        $coupon =  Coupon::create($request->all());
        if (!$coupon) {
            return response()->json([
                'status' => 'error',
                'message' => __('dashboard.error_msg'),
            ]);
        }
        return response()->json([
            'status' => 'success',
            'message' => __('dashboard.success_msg'),
        ]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CouponRequest $request, string $id)
    {
        $request->validated();
        $coupon = Coupon::findOrFail($id);
        $coupon->update($request->all());

        if (!$coupon) {
            return response()->json([
                'status' => 'error',
                'message' => __('dashboard.error_msg'),
            ]);
        }
        return response()->json([
            'status' => 'success',
            'message' => __('dashboard.success_msg'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $coupon = Coupon::findOrFail($id);
       $coupon= $coupon->delete();
        if (!$coupon) {
            return response()->json([
                'status' => 'error',
                'message' => __('dashboard.error_msg'),
            ]);
        }
        return response()->json([
            'status' => 'success',
            'message' => __('dashboard.success_msg'),
        ]);
    }
}
