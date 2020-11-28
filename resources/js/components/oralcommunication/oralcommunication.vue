<template>

     <div class="container">
           <div>
             <blockquote  class="blockquote text-center margine bg-dark">
                <p class="mb-0 make-bold" style="font-size: 30px;color:white">TRAITS AND RUBRIC FOR ORAL PRESENTATION SKILLS</p>

            </blockquote><br/><br/><br/>
        </div>
        <div class="row col-md-12 jumbotron">

        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col" >OBJECTIVE</th>
                <th scope="col">TRAIT</th>
                <th scope="col">DEFICIENT<br/> (1…2) </th>
                <th scope="col">COMPETENT<br/> (3…4) </th>
                <th scope="col">EXEMPLARY<br/> (5…6) </th>
                <th scope="col">SCORE </th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row" rowSpan="2" >Graduates can demonstrate mastery of communication technology</th>
                    <td >Use of Media  </td>
                    <td>Lack of/or misuse of media detracts from the presentation objective </td>
                    <td>Use of media supports and contributes to the presentation objective</td>
                    <td>Use of media supports, clarifies and reinforces the presentation objective </td>
                    <td><input v-model="oral_comm_use_media" class="form-control"   type="text"/></td>
                </tr>
                        <tr>

                            <td>Quality of Slides </td>
                            <td>Misuse (not enough or too much) of colors, animations and fonts detracts from the presentation objective</td>
                            <td>Use of colors, animations, fonts supports the presentation objective</td>
                            <td>Use of colors, animations, fonts supports, clarifies and reinforces the presentation objective </td>
                            <td><input v-model="oral_comm_quality_slides" class="form-control" type="text"/></td>

                        </tr>


                <tr>
                     <th scope="row" rowSpan="5" >Graduates can develop and deliver a compelling oral presentation grounded in relevant information and facts</th>
                    <td>Opening statement </td>
                    <td>Missing opening statement or statement does not introduce topic</td>
                    <td>Clear opening statement introduces topic </td>
                    <td>Clear opening statement introduces topic, captures audience attention  and sets tone for presentation</td>
                    <td><input v-model="oral_comm_opening_statement" class="form-control"  type="text"/></td>
                </tr>
                        <tr>
                            <td>Organization</td>
                            <td>Presentation is disorganized and/or not well sequenced</td>
                            <td>Presentation is organized and well sequenced with transitions. It previews and covers main points</td>
                            <td>Presentation is organized and well sequenced with smooth transitions. It previews, covers, and develops main points</td>
                            <td><input v-model="oral_comm_organization" class="form-control"  type="text"/></td>
                        </tr>

                        <tr>
                            <td>Content</td>
                            <td>Content is irrelevant or incorrect with no supporting evidence</td>
                            <td>Content is relevant and correct with supporting evidence</td>
                            <td>Content is relevant and correct with supporting evidence, and incorporates innovative insights</td>
                            <td><input v-model="oral_comm_content" class="form-control"  type="text"/></td>
                        </tr>
                        <tr>
                            <td>Conclusion</td>
                            <td>Conclusion missing or content does not support the conclusion</td>
                            <td>Conclusion is supported by content and contains a review of key points</td>
                            <td>Conclusion is supported by content, contains a review of key points, and stimulates further inquiry with closing thought</td>
                            <td><input v-model="oral_comm_conclusion" class="form-control"  type="text"/></td>
                        </tr>
                        <tr>
                            <td>Timing</td>
                            <td>Presentation is too short resulting in insufficient coverage of material or is too long</td>
                            <td>Utilizes allotted time to provide sufficient coverage of material</td>
                            <td>Utilizes allotted time to provide sufficient coverage of material in a well-paced manner</td>
                            <td><input v-model="oral_comm_timing" class="form-control" type="text"/></td>
                        </tr>
                <tr>
                    <th scope="row" rowSpan="3" >Graduates can deliver a compelling oral presentation with clarity and appropriate poise</th>
                    <td>Clarity of Speech</td>
                    <td>Inaudible or confusing, with a lack of fluency and predominant use of sloppy speech patterns</td>
                    <td>Sufficient volume, understandable, avoids sloppy speech patterns </td>
                    <td>Modulates volume to hold audience attention. Is clear,  articulate, fluent</td>
                    <td><input v-model="oral_comm_clarity" class="form-control"  type="text"/></td>
                </tr>
                        <tr>
                            <td>Engages Audience </td>
                            <td>Avoids eye contact, reads from slides or notes, or speaks in a monotone</td>
                            <td>Establishes eye contact and </td>
                            <td>Engages Audience </td>
                            <td><input v-model="oral_comm_audience" class="form-control"  type="text"/></td>
                        </tr>
                        <tr>
                            <td>Appearance </td>
                            <td>Unprofessional or distracting appearance</td>
                            <td>Clean and well-groomed appearance, business casual attire.</td>
                            <td>Professional attire </td>
                            <td><input v-model="oral_comm_apperance" class="form-control"  type="text"/></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><input @click="oralCommunicationAssessentData"  class="btn btn-primary" style="width:200px" type="submit"/></td>
                        </tr>

            </tbody>
        </table>
        </div>

        </div>

</template>

<script>


    export default {
        data(){
          return {
              oral_comm_use_media: "",
              oral_comm_quality_slides: "",
              oral_comm_opening_statement: "",
              oral_comm_organization: "",
              oral_comm_content: "",
              oral_comm_conclusion: "",
              oral_comm_timing: "",
              oral_comm_clarity: "",
              oral_comm_audience: "",
              oral_comm_apperance: "",
              Oral_comm_Object: []
           }
          },
        methods:{
            oralCommunicationAssessentData(){
                this.Oral_comm_Object.splice(0);
                this.Oral_comm_Object.push(this.oral_comm_use_media);
                this.Oral_comm_Object.push(this.oral_comm_quality_slides);
                this.Oral_comm_Object.push(this.oral_comm_opening_statement);
                this.Oral_comm_Object.push(this.oral_comm_organization);
                this.Oral_comm_Object.push(this.oral_comm_content);
                this.Oral_comm_Object.push(this.oral_comm_conclusion);
                this.Oral_comm_Object.push(this.oral_comm_timing);
                this.Oral_comm_Object.push(this.oral_comm_clarity);
                this.Oral_comm_Object.push(this.oral_comm_audience);
                this.Oral_comm_Object.push(this.oral_comm_apperance);
                this.$emit('OralCommObject', this.Oral_comm_Object);
            }
        }
    }


</script>
