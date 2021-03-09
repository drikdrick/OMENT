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

        return view('v_userdetail', ['users' => $user]);
    }
}
