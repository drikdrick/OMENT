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
        $users = DB::table('users')->get();

        return view('v_user', ['users' => $users]);
    }

    public function detail($id)
    {
        if (!$user = DB::table('users')->find($id)) {
            abort(404);
        } 
        $user = DB::table('users')->find($id);
        $role = DB::table('roles')->join('users', 'users.role','=','roles.id')
        ->where('users.id', $id)->get();

        return view('v_userdetail', ['users' => $user, 'roles'=> $role]);
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
