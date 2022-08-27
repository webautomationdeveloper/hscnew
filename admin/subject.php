<?php

if(isset($_POST["addSubject"])){
	$Settings = new  Settings();
	 $Settings->updateSubjects($_POST["subjectname"]);	
}


$Settings = new  Settings();
$subjectData = $Settings->subjects();
?>
             <style>
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
                   <script>
                  function Formvalidate()
                  {
                    var name=document.getElementById("subjectuName").value;
                    if(name.length==0)
                    {
                      document.getElementById("errorsubject").innerHTML="*";
                      return false;
                    }
            
                  }
                  function entersubject()
                  {
                    var enterlevel=document.getElementById("sunjectName").value;
                    if(enterlevel.length==0)
                    {
                      document.getElementById("errorentersubject").innerHTML="*";
                      return false;
                    }
                  }
                </script>
                    
            <input type="hidden" id="subjectData" value='<?php echo json_encode($subjectData)?>' >
                <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="row">
                            <div class="col-md-12">



                                <div class="main-card mb-3 card">


                                    <div class="card-header">
                                      <label id="operationType">Add New subject</label>
                                        <div class="btn-actions-pane-right">
                                           
                                        </div>
                                    </div>
                                   



                                  <div class="d-block text-center card-footer" id="userDetail">
                                      <form action="<?php echo $_SERVER['PHP_SELF']; ?>?&user=subject" method="POST" onsubmit="return entersubject()">
                                              <div class="form-group row">
                                                <label for="userName" class="col-sm-2 col-form-label">Name <span class="text-danger" id="errorentersubject"></span></label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="sunjectName" name="subjectname" placeholder="Name">
                                                </div>
                                              </div>

                                             
                                              
                                              <div class="form-group row">
                                                <div class="col-sm-10">
                                                  <button type="submit" class="btn btn-primary"name="addSubject" >Add </button>												  
                                                </div>
                                              </div>
                                        </form>
                                  </div>
								  </div>
								    <div class="main-card mb-3 card">
                                     <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>

                                            <tr>
                                                <th class="text-center">#</th>  
                                                <th class="text-center">Name</th>
                                                <th class="text-center">Status</th>   
												<th class="text-center">Action</th> 
                                            </tr>
                                            
                                            
                                            </thead>
                                            <tbody id="subjectDataTable">
                                            
                                            </tbody>
                                        </table>
                                    </div>  
                                
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="subjectEditModel" class="modal" >
                      <!-- Modal content -->
                       <div class="modal-content12">
                        <div>User Subject Details<span class="close">&times;</span><br></div>
						              <hr>
                            <form action="edituser.php" method="POST" style="margin-top:20px" onsubmit="return Formvalidate()">
                                     <input type="hidden" name="subjectID" id="subjectID" value="" >
                                              <div class="form-group row">
                                                <label for="userName" class="col-sm-2 col-form-label">Subject Name <span class="text-danger" id="errorsubject"></span></label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="subjectuName" name="subjectName" placeholder="Subject Name">
                                                </div>
                                              </div>

                                              <div class="form-group row">
                                                <div class="col-sm-10">
                                                  <button type="submit" class="btn btn-primary" name="updatesubject" id="updatesubject" >Update</button>
                                                </div>
                                              </div>
                                   </form>
                                </div>
                    </div>





                   
                 
                    
            
                    <script>
                    let subjectData =JSON.parse( $("#subjectData").val());
                    for(let i=0;i<subjectData.length;i++){
                        let tr = `<tr>
                                    <td class="text-center text-muted">${i+1}</td>
                                    <td class="text-center text-muted">${subjectData[i]["name"]}</td>
                                    <td class="text-center">${subjectData[i]['Status']}</td>                                    
									<td class="text-center">                                    
                                    <button type="button" class="btn btn-default btn-lg btn-outline-danger" onclick="disableSubject(${subjectData[i]['subject_ID']})">Disable</button>
									<button type="button" class="btn btn-default btn-lg btn-outline-warning"  onclick="editsubject(${subjectData[i]['subject_ID']})"><i class="fa fa-edit"></i></button>  
									
                
                                     </td> 
                                                   

                                    </tr>`; 
                        $("#subjectDataTable").append(tr);
                                  $(".close").click(function(){
                                  $("#subjectEditModel").css("display","none");
                                })
                    }

 
                    function disableSubject(ID){
                          console.log(ID);
                           $.ajax({  
                                    type:"POST",  
                                    url:"edituser.php",  
                                    data:"subjID="+ID,
                                    success:function(){
                                          window.location.reload();
                                        }
                                    
                                });  
                            }
               
                    function editsubject(id){
                                            console.log(id);
                                            $("#subjectEditModel").css("display","block");
                                            $("#subjectID").val(id);
                                            subjectData.forEach(function(item){
                                              if(item.subject_ID==id){
                                                  console.log(item);
                                                      $("#subjectuName").val(item.name);
                                                      $("#subjectID").val(item.subject_ID)
                                              }
                                            })
                                            
                                          }


                    </script>                  





                   


