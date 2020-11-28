<template>
<div class="container">


        <div class="jumbotron color" >

            <div>
             <blockquote  class="blockquote text-center margine bg-dark">
                <p class="mb-0 make-bold" style="font-size: 30px;color:white">CBIT Student Evaluation Portfolio System</p>

            </blockquote>


                <hr class="my-4" />
            </div>


            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>Name</label>
                        <input type="text" v-model="AssesName" class="form-control" placeholder="Please enter your name"/>
                    </div>

                    <div class="col-md-6">
                        <label>Semester & Year</label>
                        <select v-model="AssesSemseter" @change="getAllFiles" class="form-control">
                            <option value="">Please select the semester and year for assessment</option>
                            <option :value="{id:'1',text:'Fall 2020'}">Fall 2020</option>
                            <option :value="{id:'2',text:'Spring 2021'}">Spring 2021</option>
                            <option :value="{id:'3',text:'Summer 2020'}">Summer 2021</option>
                        </select>
                     </div>
                 </div>

            </div>

            <div class="row">

                <div class="col-md-6">
                    <label>Course & Learning Outcome</label>
                    <select v-model="AssesOutcome" @change="getAllFiles" class="form-control">
                    <option value="">Please select the course and learning outcome for assessment</option>
                    <option :value="{id:'1',text: 'ACC 2013 Intro to Financial Accounting: Ethics'}">A. ACC 2013 Intro to Financial Accounting: “Ethics”</option>
                    <option :value="{id:'2',text: 'FIN 3103 Financial Management: Critical Thinking'}">B. FIN 3103 Financial Management: “Critical Thinking”</option>
                    <option :value="{id:'3',text: 'HRM 3023 Human Resource Management: Ethics'}">C. HRM 3023 Human Resource Management: “Ethics”</option>
                    <option :value="{id:'6',text: 'HRM 3023 Human Resource Management: Oral Communication'}">D. HRM 3023 Human Resource Management: “Oral Communication”</option>
                    <option :value="{id:'4',text: 'HRM 3023 Human Resource Management: Written Communication'}">E. HRM 3023 Human Resource Management: “Written Communication”</option>
                    <option :value="{id:'5',text: 'MGT 2113 Introduction to Business Law: “Critical Thinking'}">F. MGT 2113 Introduction to Business Law: “Critical Thinking”</option>
                    <option :value="{id:'7',text: 'MGT 2203-01 Principles of Management (BSIT/BSBA): Leadership'}">G. MGT 2203-01 Principles of Management (BSIT/BSBA): “Leadership”</option>
                    <option :value="{id:'8',text: 'MGT 2203-02 Principles of Management (BSIT/BSBA): “Written Communication'}">H. MGT 2203-02 Principles of Management (BSIT/BSBA): “Written Communication”</option>
                    </select>
                 </div>


                 <div class="col-md-6">
                        <label>File Upload (Please choose mutilple files if needed) </label><br />
                       <input id="upload-file" type="file" multiple class="form-control" @change="fieldChange">
                    </div>
            </div>
            <br/>


            <div class="form-group">
                <div class="row">

                    <div class="col-md-12">
                        <div class="list-group">
                        <div class="container bg-primary">

                            <div class="panel panel-primary">
                                <div class="panel-body">
                                     <label style="font-size:20px;color:white">Please choose a file to evaluate</label>
                                     <button class="float-right"> <i @click="downlodFile" class="fas fa-file-download fa-2x float-right" style="color:#007bff;margin-top:5px"></i></button>
                                </div>

                            </div>

                        </div>

                             <select @change="sendProps" v-model="AssesFile"  class="form-control">
                                <option value="">Please choose a file to evaluate</option>
                                <option v-for="FileList in FileLists" :value="{id:FileList.id,text:FileList.str_file_name}">{{FileList.str_file_name}}</option>

                            </select>

                        </div>
                    </div>


                </div>
            </div>
            <br/>



            <div class="form-group">
                <div class="row">

                    <div class="col-md-12">
                        <div class="list-group">
                              <button class="btn btn-primary" @click="uploadFile">Save</button>

                        </div>
                    </div>

                    <div class="col-md-6 offset-md-3">
                        <div class="list-group">
                            <div id="myAlert" class="alert alert-danger collapse">
                                <a id="linkClose" href="#" class="close">&times;</a>
                                <strong>Error!</strong> There is a problem {{errormsg}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br/>
        </div>
        <hr/>

    </div>

</template>

<script>


    export default {
        data(){
          return {
              AssesName: "",
              AssesSemseter: "",
              AssesOutcome: "",
              attachments:[],
              form: new FormData,
              FileLists: "",
              AssesFile: "",
              AssessmentObject:[],
              errormsg: ""
          }
        },
        props: ['products'],
        components:{
           // mainapp
        },
        methods:{
            fieldChange(e){
                let selectedFiles=e.target.files;
                if(!selectedFiles.length){
                    return false;
                }
                for(let i=0;i<selectedFiles.length;i++){
                    this.attachments.push(selectedFiles[i]);
                }

              //  console.log(this.AssesName);
            },
            uploadFile(){
                if(this.attachments.length!=0 && this.AssesSemseter!="" && this.AssesOutcome!="" && this.AssesName!="") {
                    for (let i = 0; i < this.attachments.length; i++) {
                        this.form.append('pics[]', this.attachments[i]);
                    }
                    this.form.append('AssesName', this.AssesName);
                    this.form.append('AssesSemseter', this.AssesSemseter.id);
                    this.form.append('AssesOutcome', this.AssesOutcome.id);
                    const config = {headers: {'Content-Type': 'multipart/form-data'}};
                    document.getElementById('upload-file').value = [];
                    axios.post('/upload', this.form, config).then(response => {
                        //success
                        console.log(response);
                        location.reload();
                        // console.log(...this.form);
                        //   console.log(this.attachments);
                    })
                        .catch(response => {
                            //error
                        });
                }else{
                    if(this.AssesName==""){
                        this.errormsg="with your name field"
                    }else if(this.attachments.length==0){
                        this.errormsg="with your File Upload field"
                    }else if(this.AssesSemseter==""){
                        this.errormsg="with your semester field"
                    }else if(this.AssesOutcome==""){
                        this.errormsg="with your outcome field"
                    }
                        $('#myAlert').show('fade');

                }
            },
            getAllFiles(){

                if(this.AssesSemseter!="" && this.AssesOutcome!="") {
                    this.$emit('change', this.AssesOutcome.id)
                    axios.get('/files', {
                        params: {
                            AssesSemseter: this.AssesSemseter.id,
                            AssesOutcome: this.AssesOutcome.id
                        }
                    })
                        .then((response) => {
                            // console.log(response.data);
                            this.FileLists = response.data;
                        })
                        .catch((error) => {
                            console.log(error);
                        });
                }
            },
            downlodFile(){

            axios.get('/downloads',{
                        params: {
                         fileparam: this.AssesFile.id,

                        }
                    }).then(res=>{
                         window.open("/storage/"+res.data);
                });


            },
            sendProps(){
                this.AssessmentObject.splice(0);
                this.AssessmentObject.push(this.AssesName);
                this.AssessmentObject.push(this.AssesSemseter);
                this.AssessmentObject.push(this.AssesOutcome);
                this.AssessmentObject.push(this.AssesFile);
                this.$emit('AssessmentObject', this.AssessmentObject);
            }
        },
        mounted() {
            $('#linkClose').click(function () {
                $('#myAlert').hide('fade');
            });
            console.log('Component mounted.')
        }

    }
</script>
