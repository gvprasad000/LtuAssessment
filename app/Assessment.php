<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Response;


class Assessment extends Model
{
    public function uploadRequest($request)
    {


        $uploadedFiles=$request->pics;

        foreach ($uploadedFiles as $file){
            $assessment= new Assessment();
            $filename=$file->store('LTUDocs');
            $assessment->str_name=$request->AssesName;
            $assessment->int_sem_info=$request->AssesSemseter;
            $assessment->int_outcome_info=$request->AssesOutcome;
            $assessment->str_file_key=$filename;
            $assessment->str_file_name=$file->getClientOriginalName();;
            $assessment->save();

        }
        return $assessment;
    }

    public function fileRetrive($request){
         return Assessment::where('int_sem_info', '=', $request->AssesSemseter)
                            ->where('int_outcome_info','=', $request->AssesOutcome)
                            ->get();
    }

    public function downloadFile($request){
       $filedata=Assessment::select('str_file_key','str_file_name')
                           ->where('id', $request->fileparam)
                           ->get();
       $path=$filedata[0]['str_file_key'];
         return $path;
    }
}
