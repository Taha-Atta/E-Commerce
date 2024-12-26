<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRquest;
use Flasher\Prime\FlasherInterface;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::paginate(5);
        return view('dashboard.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRquest $request)
    {

        $request->validated();
        $role = Role::create([
            'role' => [
                'ar' => $request->role['ar'],
                'en' => $request->role['en'],
            ],
            'permession' => json_encode($request->permession),
        ]);

        if (!$role) {
            return redirect()->back()->with('error', __('auth.not_match'));
        }

        flash()->success(__('dashboard.success_msg'));
        return to_route('dashboard.roles.index');
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
        $role = Role::findOrFail($id);

        return view('dashboard.roles.edit', ['role' => $role]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRquest $request, string $id)
    {

        $request->validated();

        $role = Role::findOrFail($id);
        $role =  $role->update([
            'role' => [
                'ar' => $request->role['ar'],
                'en' => $request->role['en'],
            ],
            'permession' => json_encode($request->permession),
        ]);
        if (!$role) {
            return redirect()->back()->with('error', __('auth.not_match'));
        }

        flash()->success(__('dashboard.success_msg'));
        return to_route('dashboard.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);
        if ($role->admins->count() == 0) {
            $role->delete();
            flash()->success(__('dashboard.success_msg'));
            return to_route('dashboard.roles.index');
        } else {
            flash()->error(__('dashboard.error_msg_role'));
            return to_route('dashboard.roles.index');
        }
    }
}
