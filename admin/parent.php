<?php

$readUser = new  ReadUserType();
$parentData = $readUser->readuser("parent");
?>
<style>
                    /* The Modal (background) */
.modal1 {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  /* overflow: auto; Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content12 {
  background-color: #fefefe;
  margin: 5% 25%; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 67%; /* Could be more or less, depending on screen size */
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

#flot_container{
  display:flex;
  margin-top:10px;
}

.child {
  width:50%;
  max-height:100%;
  overflow-y:scroll;  
  margin:5px;  
}  

</style>
                <script>
                  function Formvalidate()
                  {
                    var phone=document.getElementById("parentPhone").value;
                    if(phone.length>13)
                    {
                      document.getElementById("errorphone").innerHTML="*";
                      return false;
                    }
                  }
                </script>
          <input type="hidden" id="level" value='<?php echo json_encode($levelData)?>' >
            <input type="hidden" id="parent" value='<?php echo json_encode($parentData)?>' >
            <input type="hidden" id="studentdata" value='<?php echo json_encode($studentData)?>' >


                <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Parents
                                        <div class="btn-actions-pane-right">
                                           <div role="group" class="btn-group-sm btn-group">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>

                                            <tr>
                                                <th class="text-center">#</th>  
                                                <th class="text-center">Name</th>
                                                <th class="text-center">Email ID</th>
                                                <th class="text-center">Phone</th>
												                        <th class="text-center">Childeren</th>
											                        	<th class="text-center">Action</th>
                                            </tr>
                                            
                                            
                                            </thead>
                                            <tbody id="parentDataTable">
                                            
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    
                    </div>




                    <div id="parentEditModel" class="modal1" >
                      <!-- Modal content -->
                       <div class="modal-content12">
                        <div>Edit User Details<span class="close">&times;</span><br></div>
						              <hr>
                            <form action="edituser.php" method="POST" style="margin-top:20px" onsubmit="return Formvalidate()">
                                              <div class="form-group row">
                                                <label for="userName" class="col-sm-2 col-form-label">Name</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="parentName" name="parentName" placeholder="Name" required>
                                                </div>
                                              </div>

                                              <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                  <input type="email" class="form-control" id="parentEmail" name="parentEmail" placeholder="Email" required>
                                                </div>
                                              </div>

                                              <input type="hidden" name="parentID" id="parentID">


                                              <div class="form-group row">
                                                <label for="userPhone" class="col-sm-2 col-form-label">Phone<span class="text-danger" id="errorphone" required></span></label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="parentPhone" name="parentPhone" placeholder="Phone">
                                                </div>
                                              </div>

                                              

                                              <div class="form-group row" >
                                                <label for="userType" class="col-sm-2 col-form-label">Type</label>
                                                <div class="col-sm-10">
                                                  <select name="type" class="form-control"id="userType" onchange="addType(this.value)">
                                                    <option value="parent">Parent</option>
                                                    <option value="student">Student</option>
                                                    <option value="tutor">Tutor</option>
                                                  </select>
                                                </div>
                                              </div>

                                              <div class="form-group row" id="typeToAppend" style="display:none">
                                                <label for="studentLevel" class="col-sm-2 col-form-label">Student Level</label>
                                                <div class="col-sm-10">
                                                  <select name="studentLevel" class="form-control"id="studentLevel">
                                                  </select>
                                                </div>
                                              </div>

                                              <div class="form-group row">
                                                <div class="col-sm-10">
                                                  <button type="submit" class="btn btn-primary"name="updateparent" id="updateparent" >Update</button>
                                                </div>
                                              </div>
                                   </form>
                                </div>
                    </div>



                    <div id="addStudentList" class="modal1" style="display:none">
                      <!-- Modal content -->
                       <div class="modal-content12" id="first">
                       <div><span class="close">&times;</span><br></div> 
                       <div style="text-align:center;"><b>Parent-Student Relationship<b></div>
                        <div id="flot_container" >
                            
                        <div class="child">
                        <div>
                              <h5 style="text-align:center;">List of all Student</h5>
                                </div>
                            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                  <thead>
                                    <tr>
                                        <th class="text-center">#</th>  
                                        <th class="text-center">Student Name</th>
                                        <th class="text-center">Action</th> 
                                   </tr>
                                  </thead>
                                        <tbody id="studentDataTable">   

                                        </tbody>
                            </table>
                        </div>
                           
                            <div class="child"   >
                            <div>
                              <h5 style="text-align:center;">List of Student assigned to Parent</h5>
                                </div>
                                <div>
                            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                  <thead>
                                    <tr>
                                          
                                        <th class="text-center">Student</th>
                                        <th class="text-center">Action</th> 
                                   </tr>
                                  </thead>
                                        <tbody id="assignedStudentTable">
                                            
                                        </tbody>
                            </table>

                            </div>

                          </div>
                        </div>
                        </div>
                    </div>
                   
                    <script>
                    let parentData =JSON.parse( $("#parent").val());
                    console.log(parentData);   
                    console.log(parentData.length);
                    for(let i=0;i<parentData.length;i++){
                        let tr = `<tr>
                                    <td class="text-center text-muted">${i+1}</td>
                                    <td class="text-center text-muted">${parentData[i]["Name"]}</td>
                                    <td class="text-center">${parentData[i]['Email']}</td>
                                    <td class="text-center">${parentData[i]['Phone']}</td>
									                  <td class="text-center">
									                  <button type="button" class="mb-2 mr-2 btn-transition btn btn-outline-info" onclick="addStudent(${parentData[i]['users_id']})" style="cursor:pointer;">View List</button>  
									                  </td>
                                    <td class="text-center">                                    
                                    <button type="button" class="btn btn-default btn-lg btn-outline-warning"  onclick="editParent(${parentData[i]['users_id']})"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-default btn-lg btn-outline-danger"  onclick="deleteParent(${parentData[i]['users_id']})"><i class="fa fa-trash"></i></button>
                                    </td> 
                                                      </tr>`; 
                        $("#parentDataTable").append(tr);
                    }
                    $(".close").click(function(){
                      $("#parentEditModel").css("display","none");
                      $("#addStudentList").css("display","none");

                     })

                     function addStudent(parentID){
                      $("#addStudentList").css("display","block");
                      let studentList =JSON.parse( $("#studentdata").val());
                      console.log(studentList);
                      $("#studentDataTable").empty();
                                for(let i=0;i<studentList.length;i++){
                                let para = parentID+"|"+studentList[i]['users_id'];
                                console.log(studentList[i]['Name']);
                                let tr =  `<tr>
                                            <td class="text-center text-muted">${i+1}</td>
                                            <td class="text-center text-muted">${studentList[i]['Name']}</td>
                                            <td class="text-center">
                                            <button type="button" class="mb-2 mr-2 btn-transition btn btn-outline-info" onclick="selectStudent('${para}')" style="cursor:pointer;">Add Student</button>  
                                            </td>              
                                          </tr>`;
                                $("#studentDataTable").append(tr);
                              }

                      $.ajax({  
                                    type:"POST",  
                                    url:"edituser.php",  
                                    data:"pid="+parentID,  
                                    success: function(data){ 
                                      let val = JSON.parse(data);
                                      console.log("Test");
                                      console.log(val);
                                      $("#assignedStudentTable").empty();

                                      for(let i=0;i<val.length;i++){
                                        let tr = `<tr>
                                        <td class="text-center text-muted">${val[i].Name}</td> 
                                        <td class="text-center text-muted"> 
                                        <button type="button" class="mb-2 mr-2 btn-transition btn btn-outline-info" onclick="removeStudent('${val[i].users_id}|${parentID}')" style="cursor:pointer;">Remove Subject</button>
                                        </td> 
                                        </tr>`;
                                        $("#assignedStudentTable").append(tr);
                                      }
                                    }
                                });   
                     }


                     
                    function  selectStudent(subID){
                      let parentID = subID.split("|")[0];
                      let studentID = subID.split("|")[1];
                      console.log(parentID,studentID);

                      let subData = "parenID="+parentID+"&studentID="+studentID;
                      $.ajax({  
                                    type:"POST",  
                                    url:"edituser.php",  
                                    data:subData,  
                                    success: function(data){ 
                                      console.log(data);
                                      let val = JSON.parse(data);
                                      console.log(val);
                                      let tr = `<tr>
                                      <td class="text-center text-muted">${val.Name}</td> 
                                      <td class="text-center text-muted"> 
                                       <button type="button" class="mb-2 mr-2 btn-transition btn btn-outline-info" onclick="removeStudent('${val.users_id}|${parentID}')" style="cursor:pointer;">Remove Student</button>
                                       </td> 
                                       </tr>`;
                                      $("#assignedStudentTable").append(tr);   
                                    }
                                }); 
                    }    

                    function removeStudent(subID){
                      let studentID = subID.split("|")[0];
                      let parentID = subID.split("|")[1];
                            
                      let subData = "stuID="+studentID+"&parentID="+parentID;

                      $.ajax({  
                                    type:"POST",  
                                    url:"edituser.php",  
                                    data:subData,  
                                    success: function(){
                                      alert("Removed"); 
                                      addStudent(parentID);
                                    }
                                }); 
                    }

                     
                    function editParent(userID){
                      console.log(userID);
                      $("#parentEditModel").css("display","block");

                      parentData.forEach(function(item){
                        if(item.users_id==userID){
                            console.log(item);
                                        $("#parentName").val(item.Name);
                                       $("#parentEmail").val(item.Email);
                                       $("#parentPhone").val(item.Phone);
                                       $("#userType").val(item.Type);
                                       $("#parentID").val(item.users_id)
                        }
                      })

                     
                    }

                    function addType(val){
                    if(val=="student"){
                      $("#typeToAppend").css("display","");
                      let options = JSON.parse($("#level").val());
                      console.log(options);
                      $("#studentLevel").empty();

                      for(let i=0;i<options.length;i++){
                          let opt =`<option value=${options[i].level_ID}>${options[i].level_name}</option>`;
                          $("#studentLevel").append(opt);
                      }
                    }
                    else{
                      $("#typeToAppend").css("display","none");

                    }
                  }

                  function deleteParent(userID){
                      $.ajax({  
                                    type:"POST",  
                                    url:"edituser.php",  
                                    data:"delID="+userID+"&type=parent",  
                                    success: function(data){ 
                                      location.replace("index.php?&user=parent");
                                    }
                                });  
                    }

                    </script>                  


