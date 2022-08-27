<?php

  $obj = new SubjectHandler();
  $weeklyStudy  = $obj->studyPlanRead();
  

?>
              <style>
                #subheading{
                  background-color:#008021b8;
                  padding:5px;
                  color:white;
                  margin:10px;
                }

                table {
                    border-collapse: collapse;
                    width: 100%;
                    text-align: center;
                    background:#ffffff;
                    

                }
                .tableCard{  
                  border-radius:10px;
                  width:90%;
                  padding:10px;
                  margin-top:15px;
                  -webkit-box-shadow: 3px 1px 22px 0px rgba(0,0,0,0.75);
                    -moz-box-shadow: 3px 1px 22px 0px rgba(0,0,0,0.75);
                    box-shadow: 3px 1px 22px 0px rgba(0,0,0,0.75);
                }
                h3{
                  text-align:center;
                  margin:5px;
                }


            
                                  /* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content12 {
  background-color: #fefefe;
  margin: 15% 32%; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 54%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

.btn12{
    color:white;
    background:#52B760;
    padding:5px;
    border-radius:5px;
    outline:none;
    border:0px;
}
            </style>
              
              <input type="hidden" value='<?php echo json_encode($weeklyStudy); ?>' id="weeklyActionData">
              <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="row">
                              <div class="col-md-12">
                                     <div id="subheading">
                                        <h3 style=" text-align: center">HSC Economics Study Plan</h3>
                                      </div>
                              </div>
                        </div>   

                          <div class="row" >
                            <div class="col-md-12" style="padding:15px">
                                  
                                          <div class="row">
                                              <div class="col-md-3 d-flex justify-content-center ">
                                              <a href="ecoSubjectDesc.php?&form=study">
                                              <button type="button" class="btn btn-success">Study Plan</button> 
                                              </a> 
                                              </div>

                                              <div class="col-md-3 d-flex justify-content-center ">
                                              <a href="ecoSubjectDesc.php?&form=essay">
                                              <button type="button" class="btn btn-success">Essay Tracker</button>  
                                              </a>
                                              </div>

                                              <div class="col-md-3 d-flex justify-content-center">
                                              <a href="ecoSubjectDesc.php?&form=roadmap">
                                              <button type="button" class="btn btn-success">Roadmap</button>  
                                              </a>
                                              </div>

                                              <div class="col-md-3 d-flex justify-content-center ">
                                              <a href="ecoSubjectDesc.php?&form=syllabus">
                                              <button type="button" class="btn btn-success">Syllabus Tracker</button>  
                                              </a>
                                              
                                              </div>
                                          </div>     
                              </div>
                          </div>


                          

                   
                                        
                          <div id="editModel" class="modal" >
                      <!-- Modal content -->
                       <div class="modal-content12">
                        <div>User Subject Details<span class="close">&times;</span><br></div>
						              <hr>
                    
                                     <input type="hidden" name="actionID" id="actionID" value="" >
                                     <input type="hidden" name="typeOfAction" id="typeOfAction" value="" >

                                              <div class="form-group row">
                                                <label for="actionName" class="col-sm-2 col-form-label">Action </label>
                                                <div class="col-sm-10">
                                                  <!-- <input type="text" class="form-control" id="actionName" name="actionName" placeholder="Action Name"> -->
                                               <textarea name="actionName" id="actionName" cols="60" rows="10"></textarea>
                                                </div>
                                              </div>

                                              <div class="form-group row">
                                                <div class="col-sm-10">
                                                  <button type="button" class="btn btn-primary" name="updateAction" id="updateAction" onclick= "updateAction()" >Update</button>
                                                </div>
                                              </div>
                          </div>
                    </div>
            </div>     
            
            



            <div id="editRow" class="modal" >
                      <!-- Modal content -->
                       <div class="modal-content12">
                        <div>Edit User Details<span class="close">&times;</span><br></div>
						              <hr>
                            <form action="subjectHandler.php" method="POST" style="margin-top:20px" onsubmit="return Formvalidate()">
                                              <div class="form-group row">
                                                <label for="userName" class="col-sm-2 col-form-label">Actions</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="roadmapAction" name="roadmapAction"  required>
                                                </div>
                                              </div>

                                              <div class="form-group row">
                                                <label for="roadmapAbout" class="col-sm-2 col-form-label">About</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="roadmapAbout" name="roadmapAbout"  required>
                                                </div>
                                              </div>

                                              <div class="form-group row">
                                                <label for="roadmapTime" class="col-sm-2 col-form-label">Time</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="roadmapTime" name="roadmapTime"  required>
                                                </div>
                                              </div>

                                              <input type="hidden" name="roadmapRowID" id="roadmapRowID">
                                              <input type="hidden" name="roadmapWeek" id="roadmapWeek">

                                             

                                              <div class="form-group row">
                                                <div class="col-sm-10">
                                                  <button type="submit" class="btn btn-primary"name="updateRoadmapRow" id="updateRoadmapRow" >Update</button>
                                                  <!-- <button type="button" class="btn btn-primary" onclick="closeModal()" >Cancel</button> -->

                                                </div>
                                              </div>
                                   </form>
                                </div>
                    </div>







                    <div id="editsyllabus" class="modal" >
                      <!-- Modal content -->
                       <div class="modal-content12">
                        <div>Edit User Details<span class="close">&times;</span><br></div>
						              <hr>
                           
                                              
                                              <div class="form-group row">
                                                <label for="userName" class="col-sm-2 col-form-label">Topic</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="topic" name="topic"  required>
                                                </div>
                                              </div>

                                              <div class="form-group row">
                                                <label for="userName" class="col-sm-2 col-form-label">Part</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="part" name="part"  required>
                                                </div>
                                              </div>

                                              <div class="form-group row">
                                                <label for="userName" class="col-sm-2 col-form-label">Syllabus Dot Point</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="Syllabus_Point" name="Syllabus_Point"  required>
                                                </div>
                                              </div>


                                              <div class="form-group row">
                                                <label for="userName" class="col-sm-2 col-form-label">Revise</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="revise" name="revise"  required>
                                                </div>
                                              </div>


                                              <div class="form-group row">
                                                <label for="userName" class="col-sm-2 col-form-label">SA Question</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="saQuestion" name="saQuestion"  required>
                                                </div>
                                              </div>

                                              <input type="hidden" name="syllabusPointID" id="syllabusPointID">

                                              <div class="form-group row">
                                                <div class="col-sm-10">
                                                  <button type="button" class="btn btn-primary"name="updateSyllabusRow" id="updateSyllabusRow"  onclick="updateSyllabus()" >Update</button>
                                                  <!-- <button type="button" class="btn btn-primary" onclick="closeModal()" >Cancel</button> -->

                                                </div>
                                              </div>
                                   
                                </div>
                      </div>
            

            <script>
              function updateAction(){
                let dataVal = "value="+$("#actionName").val()+"&actionID="+$("#actionID").val()+"&type="+$("#typeOfAction").val();
                $.ajax({  
                                    type:"POST",  
                                    url:"subjectHandler.php",  
                                    data:dataVal,  
                                    success: function(retVal){ 
                                    
                                     if($("#typeOfAction").val()=="essayTracker"){
                                      let id = "essay"+$("#actionID").val();
                                     


                                      $("#"+id).text(retVal);
                                      for(let i=0;i<essayData.length;i++){
                                        
                                          if(essayData[i].Q_ID==$("#actionID").val()){
                                            essayData[i].essay_name=retVal;
                                            
                                          }
                                        }
                                      
                                      
                                      $("#editModel").css("display","none");
                                     }

                                     if($("#typeOfAction").val()=="studyAction"){
                                      let id = "study"+$("#actionID").val();
                                      
                                      $("#"+id).text(retVal);
                                      for(let i=0;i<actionData.length;i++){
                                      if(actionData[i].Q_ID==$("#actionID").val()){
                                      
                                        actionData[i].Question=retVal;
                                       
                                     
                                        setup();
                                      }
                                    }
                                      $("#editModel").css("display","none");
                                    }
                                    }
                                }); 
                    }   

              
            </script>