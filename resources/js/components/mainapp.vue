<template>
    <div>
        <assessment @change="assesOutcome($event)" @AssessmentObject="getAssessmentDetails($event)"></assessment>
        <div v-if="AssesOutcomevalue==6">
             <oralcommunication @OralCommObject="saveOralCommunication($event)"></oralcommunication>
        </div>
        <div class="col-md-6 offset-md-3">
            <div class="list-group">
                <div id="myAlert1" class="alert alert-danger collapse">
                    <a id="linkClose1" href="#" class="close">&times;</a>
                    <strong>Error!</strong> There is a problem {{errormsgoralcomm}}
                </div>
            </div>
        </div>
        <router-view></router-view>
    </div>
</template>

<script>


    export default {

         data(){
          return {
             AssesOutcomevalue: "",
             AssessmentDetails: [],
             OralCommunicationData: [],
              errormsgoralcomm: ""
          }
        },
        methods:{
            assesOutcome(value){
               this.AssesOutcomevalue=value;
             },
            getAssessmentDetails(value){
                this.AssessmentDetails=value;
              //  console.log(value);
            },
            saveOralCommunication(value){
                console.log( this.AssessmentDetails)
                if(this.AssessmentDetails[3]!=undefined && this.AssessmentDetails[3]!="" && this.AssessmentDetails[0]!="") {
                    this.OralCommunicationData = value;
                    let OralCommFormData = new FormData();
                    OralCommFormData.append('AssessData', JSON.stringify(this.AssessmentDetails));
                    OralCommFormData.append('OralData', this.OralCommunicationData);
                    const config = {headers: {'Content-Type': 'multipart/form-data'}};
                      axios.post('/saveoralcommunication', OralCommFormData, config).then(response => {
                        //success
                        // console.log(response);
                        location.reload();
                    }).catch(response => {
                        //error
                    });
                }else{
                    console.log("error")
                    if(this.AssessmentDetails[3]==undefined || this.AssessmentDetails[3]==""){
                        $('#myAlert1').show('fade');
                        this.errormsgoralcomm="with file field"
                    }else if(this.AssessmentDetails[0]==""){
                        $('#myAlert1').show('fade');
                        this.errormsgoralcomm="with name field"
                    }
                }
            }
        },
        mounted() {
            console.log('Component mounted.')

        }
    }
</script>
