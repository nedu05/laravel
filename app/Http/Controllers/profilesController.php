<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class profilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {


        return view('profiles.show',[

            'user'=>$user,
            'tweets'=>$user->tweets()
            ->withlikes()
            ->paginate(50),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        return view('profiles.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
    {


        $attribute=request()->validate([
            'username' =>['string','required','max:255','alpha_dash',Rule::unique('users')->ignore($user)],
            'name' =>['string','required','max:255'],
            'avatar'=>['file'],
            'email' =>['string','required','email','max:255',Rule::unique('users')->ignore($user)],
            'password' =>['string','required','min:8','max:255','confirmed'],

        ]);



        if(request('avatar')){

            $attribute['avatar']=request('avatar')->store('avatars');
        }

        $user->update($attribute);

        return redirect($user->path());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function request(User $user)
    {

        //  $show=$user->request;
// dd($show);
        return view('request');
    }

// public function message()
// {
//  return view('message');
// }

// public function chat(User $user)
// {

// //    return $user;
// //  return view('chat',[ 'user'=> $user]);
// }

}
