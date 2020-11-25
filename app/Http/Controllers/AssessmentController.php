<?php

namespace App\Http\Controllers;

use App\Assessment;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

   

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Assessment  $assessment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assessment $assessment)
    {
        //
    }
    public function upload(Request $request){
        $Assessment = new Assessment();
        $Assessment->uploadRequest($request);
        
    }
    public function files(Request $request)
    {
        $Assessment = new Assessment();
        return $Assessment->fileRetrive($request);
        
    }
    public function downloadFileRequest(Request $request){
        $Assessment = new Assessment();
        return $Assessment->downloadFile($request);
        
    }
}
