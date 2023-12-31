<?php

namespace App\Http\Controllers;

date_default_timezone_set("America/Bogota");

use App\Models\TempFingerprint;
use Illuminate\Http\Request;

class TempFingerprintController extends Controller {

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_enroll(Request $request) {
        TempFingerprint::where("serial_number_pc", $request->token_pc)->delete();
        $id = strtotime("now");
        $TempFingerprint = new TempFingerprint();
        $TempFingerprint->id = $id;
        $TempFingerprint->user_id = $request->user_id;
        $TempFingerprint->finger_name = $request->finger_name;
        $TempFingerprint->serial_number_pc = $request->token_pc;
        $TempFingerprint->option = "enroll";
        $TempFingerprint->created_at = date("Y-m-d H:i:s");
        $result = $TempFingerprint->save();
        $arrayResponse = array("code" => $result, "message" => "Ok");
        return $arrayResponse;
    }

    public function store_read(Request $request) {
        TempFingerprint::where("serial_number_pc", $request->token_pc)->delete();
        $id = strtotime("now");
        $TempFingerprint = new TempFingerprint();
        $TempFingerprint->id = $id;
        $TempFingerprint->serial_number_pc = $request->token_pc;
        $TempFingerprint->option = "read";
        $TempFingerprint->created_at = date("Y-m-d H:i:s");
        $result = $TempFingerprint->save();
        $arrayResponse = array("code" => $result, "message" => "Ok");
        return $arrayResponse;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TempFingerprint  $tempFingerprint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        $result = TempFingerprint::where("serial_number_pc", $request->token_pc)
                ->update(["option" => "close", "image" => null]);
        $arrayResponse = array("code" => $result, "message" => "Ok");
        return $arrayResponse;
    }

}
