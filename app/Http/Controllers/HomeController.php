<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // TO CREATE
        // $role = Role::create(['name' => 'User']);
        // $permission = Permission::create(['name' => 'Delete']);

        // TO FIND
        $role = Role::findById(3);
        $permission = Permission::findById(2);

        // TO ASSIGN
        // $role->givePermissionTo($permission);
        // $permission->assignRole($role);

        // TO REMOVE
        // $role->revokePermissionTo($permission);
        // $permission->removeRole($role);

        // TO GIVE PERMISSION/ROLES TO USER
        // auth()->user()->givePermissionTo('Create');
        // auth()->user()->assignRole('User');

        // TO CHECK
        // return auth()->user()->getDirectPermissions();
        // return auth()->user()->getPermissionsViaRoles();
        // return auth()->user()->getAllPermissions();
        // return auth()->user()->getRoleNames();
        // return User::role('user')->get();
        // return User::permission('Full control')->get();

        return view('home');
    }
}
