<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Comment;
use Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     *
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $users = User::paginate(5);
        return view('users.list', ['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('users.create');
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
            'name'=> 'required',
            'email'=> 'required|email|unique:users',
            'password'=> 'required',
            'confirm_password'=> 'required|same:password',
            'address'=> 'required',

        ],[
            'name.required'=> '*không được để trống name product *',
            'password.required'=> '*không được để trống password *',
            'address.required'=> '*không được để trống địa chỉ *',
            'confirm_password.required'=> '*không được để trống confirm_password *',
            'email.required'=> '*không được để trống  giá email *',
            'email.email'=> '* email không đúng định dạng *',
              'confirm_password.same'=> '*mật khẩu không giống nhau *',
        ]);
        $users = new User;
        $users->fill($request->all()); 
        $users->password = Hash::make($request->password);
        $request->merge(['password'=>$users->password]);
        $users->is_active = $request->is_active; 
        $users->role = $request->role; 
        dd($users);

        $users->save();
        dd($request->add());
        return redirect()->route('users,index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
