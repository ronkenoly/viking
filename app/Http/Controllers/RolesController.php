<?php

namespace App\Http\Controllers;
use App\Models\Roles;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    //
    function createRoles(Request $request){
        $request->validate([
            'name' => 'required'
        ]);

        $Roles = Roles::create([
            'name' => $request->name
        ]);

        $Rolescheck = Roles::find($Roles->id);

        if($Rolescheck){
            return response()->json($Rolescheck);
        }
        else{
            return response("roles creation unsuccessful");
        }
    }

        function readallRoles(Request $request){
        

      $Roles = Roles::all(); 

        if($Roles){
            return response()->json($Roles);
        }
        else{
            return response("No such role exists");
        }
    }

    function updateRoles(Request $request){
        $request->validate([
            'id' => 'required'
        ]);

        $Roles = Roles::find($request->id);

        if($Roles){
            $Roles->name = $request->Roles;

            $Roles->save();
            return response()->json($Roles);
        }
        else{
            return response("Update unsuccessful, no such Role exists");
        }
    }

    function deleteRoles(Request $request){
        $request->validate([
            'id' => 'required'
        ]);

        $Roles = Roles::find($request->id);

        if($Roles){
            $Rolesdeleted = $Roles;
           

            $Roles->delete();
            return response()->json($Roles);
        }
        else{
            return response("Delete unsuccessful, no such Role exits");
        }
    }
    public function getRole() {
        $Users =Roles ::leftjoin('Roles','Roles._id','Roles')
        ->select('users.*','Roles.name as Roles')
        ->get();
    }
    //  public function getUsers(Request $request) {
    //     $id = $request->input(key: 'id');
    //     $users = Users::leftjoin('SubCounty','users.sub_county_id','SubCounty')
    //     ->select('users.*','sub_Counties.name as SubCounty_name')
    //     ->where('subcounties.id',$id)->where('users.name.',)
    //     ->get();
    // }
    public function getRolesName(Request $request) {
        $id = $request->input(key: 'id');

        return Roles::find($id)->Roles;
}
}

