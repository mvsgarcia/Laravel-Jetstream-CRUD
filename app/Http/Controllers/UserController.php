<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

//====================================  INDEX  ==================================== 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $users)
    {
        $users = $users->paginate(5);
        return view('users.index',compact('users'));
        //return $users->all();
    }


//====================================  CREATE  ==================================== 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }


//====================================  STORE  ==================================== 


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store() {

    //     $user = new User();

    //     $user->name = request('name');
    //     $user->email = request('email');
    //     $user->password = request('password');

    //     $user->save();

    //     return redirect()->route('users.index');

    // }
    public function store(Request $request)
    {
        
        $user=User::create($request->all());

        if($request->has('password')){
           $user->password=Hash::make($request->password);
           $user->save();
        };

        



        // $user=User::create($request->except('password'));

        // if($request->has('password')){

        //    $user->password = Hash::make($request->password);
        // };


        

        return redirect()->route('users.index');
    } 


//====================================  SHOW  ==================================== 


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    // public function show(User $user)
    // {
    //    //$user = User::findOrFail($id);
    //     return view('users.show', compact('user'));
    // }



//====================================  EDIT  ==================================== 


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $user = User::findOrFail($id);
        return view('users.edit',compact('user'));
    }
    //     public function edit(User $user)
    // {
    //     //$user = User::findOrFail($id);
    //     return view('users.edit',compact('user'));
    // }


//====================================  UPDATE  ==================================== 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
       // $user = User::findOrFail($id);
        
        $user->fill($request->except('password'))->save();

        if($request->has('password')){
           $user->password=Hash::make($request->password);
           $user->save();
        };

        
        //$user->fill($request->all())->save();

        

        return redirect()->route('users.index');
    }
    //     public function update(Request $request, User $user)
    // {
    //     //$user = $user->findOrFail($id);
    //     //$user->fill($request->all()->save());

    //     $user->update($request->all());
     
    //     return redirect()->route('users.index');
    // }


//====================================  DESTROY  ==================================== 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        //$user = $user->findOrFail($id);
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index');
    }
}
