<template>
    <div>
        <assessment @change="AssesOutcome($event)"></assessment>
        <div v-if="AssesOutcomevalue==1">
             <oralcommunication></oralcommunication>
        </div>
        <router-view></router-view>
    </div>
</template>

<script>
   

    export default {
         
         data(){
          return {
             AssesOutcomevalue: ""
          }
        },
        methods:{
            AssesOutcome(value){
               this.AssesOutcomevalue=value;
               console.log(value);
             }
        },
        mounted() {
            console.log('Component mounted.')
    
        }
    }
</script>