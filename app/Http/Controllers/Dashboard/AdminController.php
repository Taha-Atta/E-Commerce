<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Role;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = Admin::paginate(10);
        //  $admins->restore();
        //  $admin = Admin::onlyTrashed()->find($id);
        // $admin->restore();
        return view('dashboard.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::select('id', 'role')->get();
        return view('dashboard.admins.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {
        $request->validated();
        $admin = Admin::create($request->all());
        if (!$admin) {
            return redirect()->back()->with('error', __('dashboard.error_msg'));
        }
        flash()->success(__('dashboard.success_msg'));
        return to_route('dashboard.admins.index');
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
        $admin = Admin::findOrFail($id);
        $roles = Role::select('id', 'role')->get();
        return view('dashboard.admins.edit', compact('admin', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRequest $request, string $id)
    {
        $request->validated();
        $admin = Admin::findOrFail($id);
        if ($request->has('password')) {
            $admin->update([
                'password' => Hash::make($request->password),
            ]);
        }
        $admin = $admin->update($request->except('password'));
        if (!$admin) {
            return redirect()->back()->with('error', __('dashboard.error_msg'));
        }
        flash()->success(__('dashboard.success_msg'));
        return to_route('dashboard.admins.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $admin = Admin::find($id);
        $admin->delete();
        flash()->success(__('dashboard.success_msg'));
        return to_route('dashboard.admins.index');
    }
    public function changeStatus($id)
    {
        $admin = Admin::findOrFail($id);

        $admin->update(['status' => $admin->status == 'Inactive' ? 1 : 0]);
        Session::flash('success', $admin->status == 'Inactive' ? 'admin active successfully' : 'admin blocked successfully');

        return redirect()->back();
    }
}
