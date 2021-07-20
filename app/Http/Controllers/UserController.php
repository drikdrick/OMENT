<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = DB::table('users')->join('roles', 'users.role', '=', 'roles.id')
        ->select('users.*', 'roles.nama')
        ->get();

        return view('v_user', ['users' => $users]);
    }

    public function detail($id)
    {
        if (!$user = DB::table('users')->find($id)) {
            abort(404);
        }
        $user = DB::table('users')->find($id);
        $role = DB::table('roles')->where('roles.id', '=', $user->role)->first();
        $meeting = DB::table('meetings')->where('meetings.minuter', '=', $user->id)->get();

        return view('v_userdetail', ['users' => $user, 'roles' => $role, 'meetings' => $meeting]);
    }

    public function delete($id)
    {
        if (!$user = DB::table('users')->find($id)) {
            abort(404);
        }else{
            DB::table('users')->where('id', '=', $id)->delete();
        }
        
        return $this->index();
    }

    public function edit($id){
        if(!$userd = DB ::table('users')->find($id)){
            abort(404);
        }
        if(Auth::user()->role!=1 || Auth::user()->id!=$id ){
            abort(403);
        }

        $user = DB::table('users')->find($id);

        return view('v_edituser', ['user'=>$user]);
    }

    public function editProfile(Request $request){
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->hasFile('lampiran')) {
            $file = $request->file('lampiran');
            $fileName = $request->name . '.' . $file->extension();
            $file->move(public_path() . '/foto/', $fileName);
            $user->foto = $fileName;
        }
        $user->save();
        return back();
    }
    public function editPassword(Request $request){
        Auth::user()->password;
        if (Hash::check($request->password, Auth::user()->password)) {
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($request->passwordBaru);
            $user->save();

            return back()->with('success', 'Password berhasil diperbaharui.');
        }else {
            return back()->with('error', 'Password lama tidak benar, harap periksa kembali.');
        }
    }
}
