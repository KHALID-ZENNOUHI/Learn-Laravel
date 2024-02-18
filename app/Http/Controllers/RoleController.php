<?php

namespace App\Http\Controllers;
use App\Models\Permission;
use App\Models\Route;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class RoleController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        $routes = Route::all();
        $roles = Role::all();
        return view('admin.permission', compact('routes', 'permissions', 'roles'));
    }

    public function add(Request $request)
    {
        $attribute = $request->validate([
            'name' => 'required', 'min:5', 'max:255', 'string'
        ]);
        $request->validate([
            'route_id.*' => 'required|numeric',
        ]);
        $role = Role::create($attribute);
        $lastId = $role->id;    
        foreach ($request->route_id as $route) {
            $permission = new Permission();
            $permission->role_id = $lastId;
            $permission->route_id = $route;
            $permission->save();
        }
        return back();
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required', 'min:5', 'max:255', 'string',
            'route_id.*' => 'required|numeric',
        ]);

         # Get all Routes :
         $routes = $request->route_id;

         # Clear User Permissions :
         $userPermissions = Permission::where('role_id', $request->id)->get();
         foreach ($userPermissions as $permission) :
             Permission::where('role_id', $request->id)->where('route_id', $permission->route_id)->delete();
         endforeach;
 
         # Add New User Permissions :
         foreach ($routes as $route) :
             Permission::create([
                 "role_id" => $request->id,
                 "route_id" => $route
             ]);
         endforeach;
         return back();

    }

    public function delete(Request $request)
    {
        $permission = Role::findOrFail($request->id);
        $permission->delete();
        return back();
    }
}
