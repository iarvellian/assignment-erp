<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule; // Import Rule for unique validation

class RoleController extends Controller
{
    /**
     * Constructor to apply middleware for RBAC.
     * Only 'Superadmin' can access any method in this controller.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Superadmin');
    }

    public function index()
    {
        $roles = Role::orderBy('id_role')->get();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'role_name' => 'required|string|max:50|unique:roles,role_name',
        ]);

        Role::create([
            'role_name' => $request->role_name
        ]);

        return redirect()->route('roles.index')->with('success', 'Role created successfully!');
    }

    public function show(Role $role)
    {
        return view('roles.show', compact('role'));
    }

    public function edit(Role $role)
    {
        return view('roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'role_name' => [
                'required',
                'string',
                'max:50',
                Rule::unique('roles')->ignore($role->id_role, 'id_role'),
            ],
        ]);

        $role->update([
            'role_name' => $request->role_name
        ]);

        return redirect()->route('roles.index')->with('success', 'Role updated successfully!');
    }

    public function destroy(Role $role)
    {
        if (in_array($role->role_name, ['Superadmin', 'Admin', 'User'])) {
            return back()->with('error', 'Cannot delete default system roles.');
        }

        if ($role->users()->count() > 0) {
            return back()->with('error', 'Cannot delete role. Users are still assigned to this role.');
        }

        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Role deleted successfully!');
    }
}
