<?php

namespace App\Http\Controllers\Admin\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;

class AdminUsersController extends Controller
{

    protected $userRepositoy;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(UserRepository $userRepositoy)
    {
        $this->userRepositoy = $userRepositoy;
    }

    public function index()
    {
        $users = $this->userRepositoy->paginate(20);
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
        //assign 'new_password' to fillable 'password' attribute
        $inputs['password'] = $inputs['new_password'];
        $this->userRepositoy->create($inputs);
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
        $data['user'] = $this->userRepositoy->find($id);

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

        $this->userRepositoy->update($inputs,$id);

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
        $this->userRepositoy->delete($id);

        $request->session()->flash('info','User deleted successfully');
        return redirect()->back();
        //
    }
}
