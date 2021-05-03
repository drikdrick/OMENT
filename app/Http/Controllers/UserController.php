<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = DB::table('users')->join('roles', 'users.role', '=', 'roles.id')->get();

        return view('v_user', ['users' => $users]);
    }

    public function detail($id)
    {
        if (!$user = DB::table('users')->find($id)) {
            abort(404);
        } 
        $user = DB::table('users')->find($id);
        $role = DB::table('roles')->where('roles.id','=', $user->role)->first();
        $meeting = DB::table('meetings')->where('meetings.minuter', '=', $user->id)->get();

        return view('v_userdetail', ['users' => $user, 'roles'=> $role, 'meetings'=>$meeting]);
    }

    public function delete($id)
    {
        if (!$user = DB::table('users')->find($id)) {
            abort(404);
        } 
        DB::table('users')->delete($id);
        $users = DB::table('users')->get();

        return view('v_user', ['users' => $users]);
    }

}
