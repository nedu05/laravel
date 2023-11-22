<?php

namespace App\Http\Controllers;

use App\model\tweet;

use Illuminate\Http\Request;

class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        return view('tweets.index',['tweets'=>auth()->user()->timeline()]);
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
        $share=$request->validate(['body'=>'required|max:200']);


        tweet::create([
             'user_id'=>auth()->id(),
             'body'=>$share['body']
        ]);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function show(tweet $tweet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function edit(tweet $tweet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tweet $tweet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function destroy(tweet $tweet)
    {
        //
    }
}
