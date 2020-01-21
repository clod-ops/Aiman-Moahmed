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
        // $role = Role::create(['name' => 'user']);
        // $permission = Permission::create(['name' => 'Low control']);

        $role = Role::findById(3);
        $permission = Permission::findById(2);

        $role->givePermissionTo($permission);
        // $permission->assignRole($role);

        // $role->revokePermissionTo($permission);
        // $permission->removeRole($role);

        // auth()->user()->givePermissionTo('mid control');
        // auth()->user()->assignRole('user');


        // return auth()->user()->getDirectPermissions();
        // return auth()->user()->getPermissionsViaRoles();
        // return auth()->user()->getAllPermissions();
        // return auth()->user()->getRoleNames();

        // return User::role('user')->get();
        // return User::permission('Full control')->get();

        return view('home');
    }
}
