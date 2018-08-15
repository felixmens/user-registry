<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Userlistings;
use App\Http\Resources\ListingsResource;


class UserListing extends Controller
{

    //display all users
    public function listusers(){
        $users = Userlistings::orderBy('id', 'desc')->paginate(7);
        return ListingsResource::collection($users);
    }

    //Add a new user
    public function adduser(Request $request){
        $user = $request->isMethod('put') ? Userlistings::findOrFail($request->user_id) : new Userlistings;
        $user->id = $request->input('user_id');
        $user->firstname = $request->input('firstname');
        $user->surname = $request->input('surname');
        $user->email = $request->input('email');
        $user->position = $request->input('position');
    if($user->save()){
        return new ListingsResource($user);
        }    
    }


    //delete a user
    public function deleteUser($id){
        $user = Userlistings::findOrFail($id);        
        if($user->delete()){
            return new ListingsResource($user);
        }
    }
}
