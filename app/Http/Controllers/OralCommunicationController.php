<?php

namespace App\Http\Controllers;

use App\OralCommunication;
use Illuminate\Http\Request;

class OralCommunicationController extends Controller
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
        //
    }


    public function saveOralCommunication(Request $request)
    {
        $OralCommunication = new OralCommunication();
        return $OralCommunication->saveOralCommunicationData($request);
    }
}
