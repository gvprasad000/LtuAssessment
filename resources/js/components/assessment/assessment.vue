<template>
<div class="container">
 

        <div class="jumbotron color" >
     
            <div>
                <h1>CBIT Student Evaluation Portfolio System</h1>
                
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
                        <select v-model="AssesSemseter" class="form-control">
                            <option value="">Please select the semester and year for assessment</option>
                            <option value="1">Fall 2020</option>
                            <option value="2">Spring 2021</option>
                            <option value="3">Summer 2021</option>
                        </select>
                     </div>
                 </div>
                
            </div>

            <div class="row">
                
                <div class="col-md-6">
                    <label>Course & Learning Outcome</label>
                    <select v-model="AssesOutcome" @change="getAllFiles" class="form-control">
                    <option value="">Please select the course and learning outcome for assessment</option>
                    <option value="1">A. ACC 2013 Intro to Financial Accounting: “Ethics”</option>
                    <option value="2">B. FIN 3103 Financial Management: “Critical Thinking”</option>
                    <option value="3">C. HRM 3023 Human Resource Management: “Ethics”</option>
                    <option value="6">D. HRM 3023 Human Resource Management: “Oral Communication”</option>
                    <option value="4">E. HRM 3023 Human Resource Management: “Written Communication”</option>
                    <option value="5">F. MGT 2113 Introduction to Business Law: “Critical Thinking”</option>
                    <option value="7">G. MGT 2203-01 Principles of Management (BSIT/BSBA): “Leadership”</option>
                    <option value="8">H. MGT 2203-02 Principles of Management (BSIT/BSBA): “Written Communication”</option>
                    </select>
                 </div>
                 
           
                 <div class="col-md-6">  
                        <label>File Upload (Delete any student name before you upload any file) </label><br />
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
                                     <label style="font-size:20px">Please choose a file to evaluate</label> 
                                     <button class="float-right"> <i @click="downlodFile" class="fas fa-file-download fa-2x float-right" style="color:#007bff;margin-top:5px"></i></button>
                                </div>

                            </div>
                                
                        </div>
                         
                             <select  v-model="AssesFile"  class="form-control">
                                <option value="">Please choose a file to evaluate</option>
                                <option v-for="FileList in FileLists" :value=FileList.id>{{FileList.str_file_name}}</option>
                               
                            </select>
                            
                        </div>
                    </div>
                    
                  
                </div>
            </div>
            <br/>
        
            <div class="row">
                  
            </div>
         
            <div class="form-group">
                <div class="row">
                   
                    <div class="col-md-12">  
                        <div class="list-group">
                              <button class="btn btn-primary" @click="uploadFile">Save</button>
                        
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
              AssesFile: ""
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
                for(let i=0; i<this.attachments.length;i++){
                    this.form.append('pics[]',this.attachments[i]);
                }
                this.form.append('AssesName',this.AssesName);
                this.form.append('AssesSemseter',this.AssesSemseter);
                this.form.append('AssesOutcome',this.AssesOutcome);
                const config = { headers: { 'Content-Type': 'multipart/form-data' } };
                document.getElementById('upload-file').value=[];
                axios.post('/upload',this.form,config).then(response=>{
                    //success
                    console.log(response);
                   location.reload();
                    // console.log(...this.form);
                 //   console.log(this.attachments);
                })
                    .catch(response=>{
                        //error
                    });
            },
            getAllFiles(){
                this.$emit('change', this.AssesOutcome)
                axios.get('/files', {
                        params: {
                         AssesSemseter: this.AssesSemseter,
                         AssesOutcome: this.AssesOutcome
                        }
                    })
                .then((response) => {
                   // console.log(response.data);
                    this.FileLists = response.data;
                })
                .catch((error) => {
                    console.log(error);
                });
               
            },
            downlodFile(){
              
            axios.get('/downloads',{
                        params: {
                         fileparam: this.AssesFile,
                         
                        }
                    }).then(res=>{
                         window.open("/storage/"+res.data);
                });
               
               
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
        
    }
</script>
