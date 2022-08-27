<?php

if(isset($_POST["addLevel"])){
	$Settings = new  Settings();
	 $Settings->updateLevel($_POST["levelname"]);	
}


$Settings = new  Settings();
$levelData = $Settings->levels();
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
                    var name=document.getElementById("leveluName").value;
                    if(name.length==0)
                    {
                      document.getElementById("errorlevel").innerHTML="*";
                      return false;
                    }
            
                  }
                  function enterlevel()
                  {
                    var enterlevel=document.getElementById("levelName").value;
                    if(enterlevel.length==0)
                    {
                      document.getElementById("errorenterlevel").innerHTML="*";
                      return false;
                    }
                  }
                </script>
                    
            <input type="hidden" id="levelData" value='<?php echo json_encode($levelData)?>' >
                <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">
                                      <label id="operationType">Add New Level</label>
                                        <div class="btn-actions-pane-right">
                                           
                                        </div>
                                    </div>
                                   



                                  <div class="d-block text-center card-footer" id="userDetail">
                                      <form action="<?php echo $_SERVER['PHP_SELF']; ?>?&user=level" method="POST" onsubmit="return enterlevel()">
                                              <div class="form-group row">
                                                <label for="userName" class="col-sm-2 col-form-label">Enter Level <span class="text-danger" id="errorenterlevel"></span></label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="levelName" name="levelname" placeholder="Name">
                                                </div>
                                              </div>

                                             
                                              
                                              <div class="form-group row">
                                                <div class="col-sm-10">
                                                  <button type="submit" class="btn btn-primary"name="addLevel" >Add </button>												  
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
                                            <tbody id="levelDataTable">
                                            
                                            </tbody>
                                        </table>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="levelEditModel" class="modal" >
                      <!-- Modal content -->
                       <div class="modal-content12">
                        <div>User Level Details<span class="close">&times;</span><br></div>
						              <hr>
                            <form action="edituser.php" method="POST" style="margin-top:20px" onsubmit="return Formvalidate()">
                            <input type="hidden" name="levelupdateID" id="levelupdateID" value="" >
                                              <div class="form-group row">
                                                <label for="userName" class="col-sm-2 col-form-label">Enter Level <span class="text-danger" id="errorlevel"></span></label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="leveluName" name="levelName" placeholder="Level Name">
                                                </div>
                                              </div>

                                              <div class="form-group row">
                                                <div class="col-sm-10">
                                                  <button type="submit" class="btn btn-primary" name="updatelevel" id="updatelevel" >Update</button>
                                                </div>
                                              </div>
                                   </form>
                                </div>
                          </div>




                   
                 
                    
            
                    <script>
                     $( document ).ready(function(){
                      $("#levelDisEna").text();
                      createTable();          
                     })

                     function createTable(){
                       let levelData =JSON.parse( $("#levelData").val());
                       console.log(levelData);
                      for(let i=0;i<levelData.length;i++){
                        let tr = `<tr>
                                    <td class="text-center text-muted">${i+1}</td>
                                    <td class="text-center text-muted">${levelData[i]["level_name"]}</td>
                                    <td class="text-center">${levelData[i]['Status']}</td>                                    
								                  	<td class="text-center">                                    
							                  		<button type="button" class="btn btn-default btn-lg btn-outline-warning"  onclick="editlevel(${levelData[i]['level_ID']})"><i class="fa fa-edit"></i></button>  
                                    <button type="button" class="btn btn-default btn-lg btn-outline-danger"  onclick="disable(${levelData[i]['level_ID']})">Disable</button>
                                     </td> 
                                    </tr>`; 
                                  $("#levelDataTable").append(tr);
                                }
                                $(".close").click(function(){
                                  $("#levelEditModel").css("display","none");
                                })
                              }
                                    function disable(levelID){
                                        $.ajax({
                                        url:"edituser.php",
                                        type:"POST",
                                        data:"levelID="+levelID,
                                        success:function(data){
                                          window.location.reload();
                                        }
                                      });
                                    }
                                    
                                         function editlevel(ID){
                                            console.log(ID);
                                            let levelData =JSON.parse( $("#levelData").val());
                                            $("#levelEditModel").css("display","block");
                                            $("#levelupdateID").val(ID)
                                            levelData.forEach(function(item){
                                              if(item.level_ID==ID){
                                                  console.log(item);
                                                      $("#leveluName").val(item.level_name);
                                                      $("#levelID").val(item.level_ID)
                                              }
                                            })
                                          }

                    </script>                  





                   


