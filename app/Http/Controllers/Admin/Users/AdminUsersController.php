<?php

namespace App\Http\Controllers\Admin\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        
    }

    public function index()
    {
        $users = User::paginate(20);
        $data['users'] = $users;

        return view('admin.users.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'new_password'=>'required|min:6',
            'confirm_password'=>'required|min:6|same:new_password',
        ]);

        $inputs = $request->all();
        $user = new User();
        $user->name = $inputs['name'];
        $user->email = $inputs['email'];
        $user->password = $inputs['new_password'];
        $user->save();
        return redirect(route('users.index'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['user'] = User::findOrFail($id);

        return view('admin.users.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'new_password'=>'required|min:6',
            'confirm_password'=>'required|min:6|same:new_password',
        ]);
        $inputs = $request->all();

        if($inputs['new_password'])
        {
            $inputs['password'] = bcrypt($inputs['new_password']);
        }

        $user = User::findOrFail($id);
        $user->name = $inputs['name'];
        $user->email = $inputs['email'];
        $user->password = $inputs['password'];
        $user->save();

        $request->session()->flash('success','User updated successfully');

        return redirect(route('users.index'));
    }

    /**
     * Delete User.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request,$id)
    {
        User::delete($id);

        $request->session()->flash('info','User deleted successfully');
        return redirect()->back();
    }
}
