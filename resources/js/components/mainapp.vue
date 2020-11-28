<template>
    <div>
        <assessment @change="assesOutcome($event)" @AssessmentObject="getAssessmentDetails($event)"></assessment>
        <div v-if="AssesOutcomevalue==6">
             <oralcommunication @OralCommObject="saveOralCommunication($event)"></oralcommunication>
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
             OralCommunicationData: []
          }
        },
        methods:{
            assesOutcome(value){
               this.AssesOutcomevalue=value;
             },
            getAssessmentDetails(value){
                this.AssessmentDetails=value;
            },
            saveOralCommunication(value){
                this.OralCommunicationData=value;
                let OralCommFormData = new FormData();
                OralCommFormData.append('AssessData',JSON.stringify(this.AssessmentDetails));
                OralCommFormData.append('OralData',this.OralCommunicationData);
                const config = { headers: { 'Content-Type': 'multipart/form-data' } };
                axios.post('/saveoralcommunication',OralCommFormData,config).then(response=>{
                    //success
                   // console.log(response);
                    location.reload();
                }).catch(response=>{
                        //error
                    });

            }
        },
        mounted() {
            console.log('Component mounted.')

        }
    }
</script>
