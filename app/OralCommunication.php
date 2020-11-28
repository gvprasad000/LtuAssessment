<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OralCommunication extends Model
{
    protected $table = 'oralcommunication';
    public function saveOralCommunicationData($request){
        $AssessmentData=json_decode($request['AssessData'],true);
        $OralCommData=explode(",",$request['OralData']);
        $OralCommunication=new OralCommunication();
        $OralCommunication->assessmentid=$AssessmentData[3]['id'];
        $OralCommunication->name=$AssessmentData[0];
        $OralCommunication->semestertxt=$AssessmentData[1]['text'];
        $OralCommunication->outcometxt=$AssessmentData[2]['text'];
        $OralCommunication->filetxt=$AssessmentData[3]['text'];
        $OralCommunication->use_media=$OralCommData[0];
        $OralCommunication->quality_slides=$OralCommData[1];
        $OralCommunication->opening_statement=$OralCommData[2];
        $OralCommunication->organization=$OralCommData[3];
        $OralCommunication->content=$OralCommData[4];
        $OralCommunication->conclusion=$OralCommData[5];
        $OralCommunication->timing=$OralCommData[6];
        $OralCommunication->clarity=$OralCommData[7];
        $OralCommunication->audience=$OralCommData[8];
        $OralCommunication->apperance=$OralCommData[9];
        $OralCommunication->save();
        return $OralCommunication;
        //return json_decode(json_encode($data[1]), true);
    }
}
