<?php

namespace App\Http\Controllers;
use App\Models\Town;
use Illuminate\Http\Request;

class TownController extends Controller
{
    //
    function createTown(Request $request){
        $request->validate([
            'name' => 'required'
        ]);

        $Town = Town::create([
            'name' => $request->name
        ]);

        $Towncheck = Town::find($Town->id);

        if($Towncheck){
            return response()->json($Towncheck);
        }
        else{
            return response("Town creation unsuccessful");
        }
    }

    function readallTown(){
        $Town = Town::get();

        if($Town){
            return response()->json($Town);
        }
        else{
            return response("No Town found");
        }
    }

    function readaTown(Request $request){
        $request->validate([
            'id' => 'required'
        ]);

        $Town = Town::find($request->id);

        if($Town){
            return response()->json($Town);
        }
        else{
            return response("No such Town exists");
        }
    }

    function updateTown(Request $request){
        $request->validate([
            'id' => 'required'
        ]);

        $Town = Town::find($request->id);

        if($Town){
            $Town->name = $request->name;

            $Town->save();
             response()->json($Town);
        }
        else{
            return response("Update unsuccessful, no such Town exists");
        }
    }

    function deleteTown(Request $request){
        $request->validate([
            'id' => 'required'
        ]);

        $Town = Town::find($request->id);

        if($Town){
            $deletedTown = $Town;

            $Town->delete();
            return response()->json($deletedTown);
        }
        else{
            return response("Delete unsuccessful, no such Town exits");
        }
    }
    public function getUsers() {
        $users = Town::leftjoin('Town','users.Town_id','Town')
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
    public function getTownName(Request $request) {
        $id = $request->input(key: 'id');

        return Town::find($id)->Town;
    }
}
