<?php

namespace App\Http\Controllers;

use App\model\Chat;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('message');
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
    public function store(Request $request )
    {
        $message=$request->validate(['message'=>'required|max:200']);

        Chat::create([
             'person_id_1'=>auth()->id(),
             'person_id_2'=>$request->id,
             'message'=>$message['message']
             ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {


        $friendchat = DB::table('tweety_chats')
                    ->where('person_id_1',auth()->user()->id)
                    ->where('person_id_2',$user->id)
                    ->get();

        $user_chat=DB::table('tweety_chats')
                    ->where('person_id_1',$user->id)
                    ->where('person_id_2',auth()->user()->id)
                    ->get();


        return view('chat',['user'=> $user],compact( 'user_chat','friendchat'));





    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chat $chat)
    {
        //
    }
}




