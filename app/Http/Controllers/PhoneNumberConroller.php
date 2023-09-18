<?php

namespace App\Http\Controllers;
use App\Models\PhoneNumber;
use Database\Seeders\PhoneNumberseeder;
use Illuminate\Http\Request;

class PhoneNumberController extends Controller
{
    //
    function createPhoneNumber(Request $request){
        $request->validate([
            'PhoneNumber' => 'required'
        ]);

        $PhoneNumber = PhoneNumber::create([
            'PhoneNumber' => $request->number
        ]);

        $PhoneNumbercheck = PhoneNumber::find($PhoneNumber->id);

        if($PhoneNumbercheck){
            return response()->json($PhoneNumbercheck);
        }
        else{
            return response("PhoneNumber creation unsuccessful");
        }
    }

        function readallPhoneNumber(Request $request){
        $request->validate([
            'id' => 'required'
        ]);

        $PhoneNumber = PhoneNumber::find($request->id);

        if($PhoneNumber){
            return response()->json($PhoneNumber);
        }
        else{
            return response("No such phonenumber exists");
        }
    }

    function updatePhoneNumber(Request $request){
        $request->validate([
            'id' => 'required'
        ]);

        $PhoneNumber = PhoneNumber::find($request->id);

        if($PhoneNumber){
            $PhoneNumber->name = $request->PhoneNumber;

            $PhoneNumber->save();
            return response()->json($PhoneNumber);
        }
        else{
            return response("Update unsuccessful, no such phonenumber exists");
        }
    }

    function deletePhoeNumber(Request $request){
        $request->validate([
            'id' => 'required'
        ]);

        $PhoneNumber = PhoneNumber::find($request->id);

        if($PhoneNumber){
            $PhoneNumberdeleted = $PhoneNumber;
           

            $PhoneNumber->delete();
            return response()->json($PhoneNumber);
        }
        else{
            return response("Delete unsuccessful, no such subcounty exits");
        }
    }
    public function getPhoneNumber() {
        $Users =PhoneNumber ::leftjoin('PhoneNumber','PhoneNumber._id','PhoneNumber')
        ->select('users.*','PhoneNumber.name as PhoneNumber')
        ->get();
    }
    //  public function getUsers(Request $request) {
    //     $id = $request->input(key: 'id');
    //     $users = Users::leftjoin('SubCounty','users.sub_county_id','SubCounty')
    //     ->select('users.*','sub_Counties.name as SubCounty_name')
    //     ->where('subcounties.id',$id)->where('users.name.',)
    //     ->get();
    // }
    public function getPhoneNumberName(Request $request) {
        $id = $request->input(key: 'id');

        return PhoneNumber::find($id)->PhoneNumber;
}
}