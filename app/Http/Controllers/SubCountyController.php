<?php

namespace App\Http\Controllers;

use App\Models\SubCounty;
use Illuminate\Http\Request;

class SubCountyController extends Controller
{
    function createsubcounty(Request $request){
        $request->validate([
            'name' => 'required'
        ]);

        $subcounties = subcounty::create([
            'name' => $request->name
        ]);

        $subcountiescheck = subcounty::find($subcounties->id);

        if($subcountiescheck){
            return response()->json($subcountiescheck);
        }
        else{
            return response("Subcounty creation unsuccessful");
        }
    }

    function readallsubcounty(){
        $subcounty = subcounty::get();

        if($subcounty){
            return response()->json($subcounty);
        }
        else{
            return response("No subcounties found");
        }
    }

    function readasubcounty(Request $request){
        $request->validate([
            'id' => 'required'
        ]);

        $subcounty = subcounty::find($request->id);

        if($subcounty){
            return response()->json($subcounty);
        }
        else{
            return response("No such subcounty exists");
        }
    }

    function updatesubcounty(Request $request){
        $request->validate([
            'id' => 'required'
        ]);

        $subcounty = subcounty::find($request->id);

        if($subcounty){
            $subcounty->name = $request->name;

            $subcounty->save();
            return response()->json($subcounty);
        }
        else{
            return response("Update unsuccessful, no such subcounty exists");
        }
    }

    function deletesubcounty(Request $request){
        $request->validate([
            'id' => 'required'
        ]);

        $subcounty = subcounty::find($request->id);

        if($subcounty){
            $deletedsubcounty = $subcounty;

            $subcounty->delete();
            return response()->json($deletedsubcounty);
        }
        else{
            return response("Delete unsuccessful, no such subcounty exits");
        }
    }
    public function getsubCounty() {
        $users = Subcounty::leftjoin('SubCounty','users.sub_county_id','SubCounty')
        ->select('users.*','sub_Counties.name as SubCounty_name')
        ->get();
    }
    //  public function getUsers(Request $request) {
    //     $id = $request->input(key: 'id');
    //     $users = Users::leftjoin('SubCounty','users.sub_county_id','SubCounty')
    //     ->select('users.*','sub_Counties.name as SubCounty_name')
    //     ->where('subcounties.id',$id)->where('users.name.',)
    //     ->get();
    // }
    public function getSubCountyName(Request $request) {
        $id = $request->input(key: 'id');

        return subCounty::find($id)->sub_county;
    }
}
