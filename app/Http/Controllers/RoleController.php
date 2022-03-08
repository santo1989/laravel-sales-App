<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {

        $roles = Role::get();

        return view('sales.roles.index', [
            'roles' => $roles
        ]);
    }

    public function create()
    {
        return view('sales.roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        Role::create([
            'name' => $request->name,
        ]);

        return redirect()->route('roles.index');
    }

    public function edit(Role $role)
    {
        return view('sales.roles.edit', [
            'role' => $role
        ]);
    }

    public function update(Request $request, Role $role)
    {
        // dd($request->all());
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $role->update([
            'name' => $request->name,
        ]);

        return redirect()->route('roles.index');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('roles.index');
    }
}
