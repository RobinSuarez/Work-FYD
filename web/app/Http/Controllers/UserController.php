<?php

namespace App\Http\Controllers;

use App\Models\tb_sys_mf_user;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $r){
        $name = $r['name'];
        $users = tb_sys_mf_user::when(isset($name), function ($q) use ($name){
                    return $q->where('tb_sys_mf_user.name', 'like', '%'.$name.'%');})
                            ->sortable(['id', 'code', 'name', 'is_active'])
                            ->paginate(env('ROW_COUNT'));
        return view('tb_sys_mf_user.index', ['users' => $users]);
    }

    public function create(){
        return view('tb_sys_mf_user.create');
    }

    public function store(Request $r){
        $validated = $this->validate($r,[
                'code'          => 'required|max:30',
                'name'          => 'required|max:255',
                'email'         => 'required|string|email|max:255|unique:tb_sys_mf_user',
                'password'      => 'required|string|min:8',
                'cf_password'   => 'required|string|min:8|same:password',
                'is_active'     => 'nullable',
            ],
            [
                'cf_password.required'  => 'Confirm password is required',
                'cf_password.same'      => 'Passwords did not match',
                'cf_password.string'    => 'Confirm Password should be string',
                'cf_password.min'       => 'Confirm Password should be atleast 8 characters',
            ]
        );
        $validated['password'] = Hash::make($r['password']);
        unset($validated["cf_password"]); 
        $user = new tb_sys_mf_user();
        $user->fill($validated);
        $user->save();
        return redirect()->route('users.show', ['user' => $user->id])->with('status', 'Success!');
    }

    public function edit(Request $r, $id){
        $user = tb_sys_mf_user::findOrFail($id);

        return view('tb_sys_mf_user.edit', [
            'user' => $user,
        ]);
    }

    public function show(Request $r, $id)
    {
        $user = tb_sys_mf_user::findOrFail($id);
        return view('tb_sys_mf_user.show', [
            'user' => $user,

        ]);
    }

    public function update(Request $r, $id)
    {
        $user = tb_sys_mf_user::findOrFail($id);
        $validated = $r->validate([
            'code' => 'required', 
            'name' => 'required', 
            'email' => "required|unique:tb_sys_mf_user,email,$user->id,id",
            'age'           => 'nullable|numeric',
            'is_active' => 'nullable'
        ]);
        $user->fill($validated);
        $user->update();
        return redirect()->route('users.show', ['user' => $user])->with('status', 'User was updated!');
    

    }

    public function profile_edit_password(Request $r, $id){
        $user = tb_sys_mf_user::findOrFail($id);
        return view('tb_sys_mf_user.profile_edit_password', [
            'user' => $user,
        ]);
    }

    public function profile_reset_password(Request $r, $id){
        $user = tb_sys_mf_user::findOrFail($id);
        $validated['password'] = Hash::make('password');
        $user->fill($validated);
        $user->update();
        return redirect()->back()->with('status', 'User password was reset!');
    }

    public function profile_update_password(Request $r, $id){
        $user = tb_sys_mf_user::findOrFail($id);
        $validated = $this->validate($r,[
                'password'      => 'required|string|min:8',
                'cf_password'   => 'required|string|min:8|same:password',
            ],
            [
                'cf_password.required'  => 'Confirm password is required',
                'cf_password.same'      => 'Passwords did not match',
                'cf_password.string'    => 'Confirm Password should be string',
                'cf_password.min'       => 'Confirm Password should be atleast 8 characters',
            ]
        );
        $validated['password'] = Hash::make($r['password']);
        unset($validated["cf_password"]); 
        $user->fill($validated);
        $user->update();
        return redirect()->back()->with('status', 'User password was updated!');
    }
}
