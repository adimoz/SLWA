<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\friendship;
use App\notifcations;
class applicationController extends Controller
{
    //
    public function findFriends() {

        $uid = Auth::user()->id;
        $allUsers = DB::table('users')
        ->where('users.id', '!=', $uid)->get();

        return view('findFriends', compact('allUsers'));
    }
    
    
    

    public function sendRequest($id)
    {
         Auth::user()->addFriend($id); 
         return back();
    //    echo $id;
    }

    public function requests()
    {
        $uid = Auth::user()->id;

        $FriendRequests = DB::table('friendships')
        ->rightJoin('users', 'users.id', '=', 'friendships.requester')
        ->where('status', 0)
        ->orWhere('status', NULL)
        ->where('friendships.user_requested', '=', $uid)->get();
        return view('requests',compact('FriendRequests'));
    }


    public function accept($id)
    {
        $uid = Auth::user()->id;
        $checkRequest = friendship::where('requester', $id)
        ->where('user_requested', $uid)
        ->first();
        if($checkRequest){

            $updateFriendship = DB::table('friendships')
                    ->where('user_requested', $uid)
                    ->where('requester', $id)
                    ->update(['status' => 1]);
                    if($updateFriendship){
                        return back()->with('msg', 'You are friends ' );
                    }
        }else{
            echo "wrong";
        }

    
    }























    public function pending()
    {
    $uid = Auth::id();
    //fetch the data from users table
    $allUsers = DB::table('users')->where('id', '!=', $uid)->get();
    return view('Findfriends', compact('allUsers'));
    }
    
    
   



}
