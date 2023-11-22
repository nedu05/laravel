<?php


use Illuminate\Support\Facades\Auth;
function current_user()
{
    // return auth()->user();
    return Auth::user();
}

