<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class UserController extends Controller
{
    //
    function createUser(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        $Usercheck = User::find($user->id);

        if($Usercheck){
            return response()->json($Usercheck);
        }
        else{
            return response("User creation unsuccessful");
        }
    }

    function readallUser(){
        $User= User::get();

        if($User){
            return response()->json($User);
        }
        else{
            return response("No User found");
        }
    }

    function readaUser(Request $request){
        $request->validate([
            'id' => 'required'
        ]);

        $User = User::find($request->id);

        if($User){
            return response()->json($User);
        }
        else{
            return response("No such User exists");
        }
    }

    function updateUser(Request $request){
        $request->validate([
            'id' => 'required'
        ]);

        $User = User::find($request->id);

        if($User){
            $User->name = $request->name;

            $User->save();
             response()->json($User);
        }
        else{
            return response("Update unsuccessful, no such User exists");
        }
    }

    function deleteUser(Request $request){
        $request->validate([
            'id' => 'required'
        ]);

        $User = User::find($request->id);

        if($User){
            $deletedUser = $User;

            $User->delete();
            return response()->json($deletedUser);
        }
        else{
            return response("Delete unsuccessful, no such Town exits");
        }
    }
    public function getUsers() {
        $users = User::leftjoin('Town','users.Town_id','Town')
        ->select('users.*','Town.name as Town_name')
        ->get();
    }
    //  public function getUsers(Request $request) {
    //     $id = $request->input(key: 'id');
    //     $users = Users::leftjoin('SubCounty','users.sub_county_id','SubCounty')
    //     ->select('users.*','sub_Counties.name as SubCounty_name')
    //     ->where('subcounties.id',$id)->where('users.name.',)
    //     ->get();
    // }
    public function getUser(Request $request) {
        $id = $request->input(key: 'id');

        return User::find($id)->Town;
    }
}
