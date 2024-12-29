<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Governorate;
use Illuminate\Http\Request;

class WorldController extends Controller
{

    public function getAllCountries()
    {

        $countries = Country::when(request()->filled('keyword'), function ($query) {
            $query->where('name', 'LIKE', '%' . request()->keyword . '%');
        })->paginate(5);
        return view('dashboard.world.countries', compact('countries'));
    }
    public function getGovsByCountry($id)
    {

        $country = Country::findOrFail($id);

        $governorates =  $country->governorates()->when(request()->filled('keyword'), function ($query) {
            $query->where('name', 'LIKE', '%' . request()->keyword . '%');
        })->paginate(10);

        return view('dashboard.world.governorates', compact('governorates'));
    }

    public function changeStatus($id)
    {
        $country = Country::findOrFail($id);


        //    $st =  $country->is_active == 'Active' || $country->is_active == 'مفعل' ? 0 : 1;

        //    if(!$st){
        //     return response()->json(['status'=>false, 'message'=>__('dashboard.error_msg'), ],404);
        //    }
        //    $country1 = Country::findOrFail($id);

        //    return response()->json([ 'status'=>true,'message'=>__('dashboard.success_msg'),'data'=>$country1],200);


        $country->is_active == 'Active' || $country->is_active == 'مفعل' ?  $country->update(['is_active' => 0]) : $country->update(['is_active' => 1]);


        flash()->success(__('dashboard.success_msg'));
        return redirect()->back();
    }

    public function changeGovStatus($id)
    {
        $governorate = Governorate::findOrFail($id);

        // $st =   $governorate->update([
        //     'is_active' => $governorate->is_active == 'Active' || $governorate->is_active == 'مفعل' ? 0 : 1,
        // ]);

        // if (!$st) {
        //     return response()->json(['status' => false, 'message' => __('dashboard.error_msg'),], 404);
        // }
        // $governorate1 = Governorate::findOrFail($id);

        // return response()->json(['status' => true, 'message' => __('dashboard.success_msg'), 'data' => $governorate1], 200);
        $governorate->update([
            'is_active' => $governorate->is_active == 'Active' || $governorate->is_active == 'مفعل' ? 0 : 1,
        ]);

        flash()->success(__('dashboard.success_msg'));
        return redirect()->back();
    }

    public function changeShippingPrice(Request $request)
    {

        $request->validate([
            'price' => "required|numeric",
            'gov_id' => "required|exists:governorates,id",
        ]);
        $governorate = Governorate::findOrFail($request->gov_id);
        $governorate->shippingPrice->update(['price' => $request->price]);
        flash()->success(__('dashboard.success_msg'));
        return redirect()->back();
    }
}
