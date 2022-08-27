<?php

// if(isset($_POST["addLevel"])){
// 	$Settings = new  Settings();
// 	 $Settings->updateLevel($_POST["levelname"]);	
// }

$obj = new  InternalWeighting();
$interweightingalldata = $obj->interweightingdata();

if(isset($_POST["addinterweighting"]))
{
    $value = $_POST["InterweightingName"];
    $obj = new  InternalWeighting();
    $insertdata = $obj->interweightingInsert($value);
    header("location:index.php?&user=interweighting");
}

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
                    
            <input type="hidden" id="interweightingdata" value='<?php echo json_encode($interweightingalldata)?>' >
                <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">
                                      <label id="operationType">Add New Internal Level</label>
                                        <div class="btn-actions-pane-right">
                                           
                                        </div>
                                    </div>
                                   



                                  <div class="d-block text-center card-footer" id="userDetail">
                                      <form action="" method="POST" onsubmit="return enterlevel()">
                                              <div class="form-group row">
                                                <label for="userName" class="col-sm-2 col-form-label">Enter Level <span class="text-danger" id="errorenterlevel"></span></label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="InterweightingName" name="InterweightingName" placeholder="Name" required>
                                                </div>
                                              </div>

                                             
                                              
                                              <div class="form-group row">
                                                <div class="col-sm-10">
                                                  <button type="submit" class="btn btn-primary" name="addinterweighting" >Add </button>												  
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
                                            <tbody id="internalweightingtable">
                                            
                                            </tbody>
                                        </table>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="interweightingEditModel" class="modal" >
                      <!-- Modal content -->
                       <div class="modal-content12">
                        <div>User Edit Internal Weighting Details<span class="close">&times;</span><br></div>
						              <hr>
                            <form action="edituser.php" method="POST" style="margin-top:20px" onsubmit="return Formvalidate()">
                            <input type="hidden" name="interweighitngID" id="interweighitngID" value="" >
                                              <div class="form-group row">
                                                <label for="userName" class="col-sm-2 col-form-label">Enter Level <span class="text-danger" id="errorlevel"></span></label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="interweightingname" name="interweightingname" placeholder="Level Name">
                                                </div>
                                              </div>

                                              <div class="form-group row">
                                                <div class="col-sm-10">
                                                  <button type="submit" class="btn btn-primary" name="updatewighting" id="updatewighting" >Update</button>
                                                </div>
                                              </div>
                                   </form>
                                </div>
                          </div>




                   
                 
                    
            
                    <script>
                    //  $( document ).ready(function(){
                    //   $("#levelDisEna").text();
                    //   createTable();          
                    //  })

                    //  function createTable(){
                       let interWeghtingData =JSON.parse( $("#interweightingdata").val());
                    //    console.log(interWeghtingData);
                      for(let i=0;i<interWeghtingData.length;i++){
                        let tr = `<tr>
                                    <td class="text-center text-muted">${i+1}</td>
                                    <td class="text-center text-muted">${interWeghtingData[i]["value"]}</td>
                                    <td class="text-center">${interWeghtingData[i]['status']}</td>                                    
								                  	<td class="text-center">                                    
							                  		<button type="button" class="btn btn-default btn-lg btn-outline-warning"  onclick="editlevel(${interWeghtingData[i]['iw_id']})"><i class="fa fa-edit"></i></button>  
                                    <button type="button" class="btn btn-default btn-lg btn-outline-danger" onclick="disable(${interWeghtingData[i]['iw_id']})">Disable</button>
                                     </td> 
                                    </tr>`; 
                                  $("#internalweightingtable").append(tr);
                                }
                                $(".close").click(function(){
                                  $("#interweightingEditModel").css("display","none");
                                })
                            //   }
                                    function disable(DID){
                                        console.log(DID);
                                        $.ajax({
                                        url:"edituser.php",
                                        type:"POST",
                                        data:"DID="+DID,
                                        success:function(data){
                                          window.location.reload();
                                        //   console.log(data);
                                        }
                                      });
                                    }
                                    
                                         function editlevel(IDS){
                                            console.log(IDS);
                                            let interweightingeditdata =JSON.parse( $("#interweightingdata").val());
                                            $("#interweightingEditModel").css("display","block");
                                            let IDs = $("#interweighitngID").val(IDS); 
                                            console.log(IDS);                                         
                                            interweightingeditdata.forEach(function(item){
                                              if(item.iw_id==IDS){
                                                  console.log(item);
                                                      $("#interweightingname").val(item.value);
                                                      $("#InterweigtingID").val(item.iw_id);
                                              }
                                            })
                                          }

                    </script>                  





                   


