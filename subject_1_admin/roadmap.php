<?php 
$obj = new SubjectHandler();
$roadMapData  = $obj->readRoadMap();

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
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content/Box */
    .modal-content123 {
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





<h3>Roadmap</h3>
<div class="row">
    <div class="col-md-12 d-flex justify-content-around">
                                            <div id="roadmapTracker" class ="tableCard">
                                                <h4>Week 1</h4>
                                              <table class="table table-striped">
                                                <tr>
                                                  <thead>
                                                    <th>#</th>
                                                    <th>Actions</th>
                                                    <th>About</th>
                                                    <th>Time Estimate</th>
                                                  </thead>
                                                </tr>
                                                <tbody id="week1">
                                                </tbody>
                                              </table>
                                            </div>   
</div>
</div>

    <div class="row">
    <div class="col-md-12 d-flex justify-content-around">
                                            
                                            <div id="roadmapTracker" class ="tableCard">
                                            <h4>Week 2</h4>

                                              <table class="table table-striped">
                                                <tr>
                                                  <thead>
                                                    <th>#</th>
                                                   
                                                    <th>Actions</th>
                                                    <th>About</th>
                                                    <th>Time Estimate</th>
                                                  </thead>
                                                </tr>
                                                <tbody id="week2">
                                                </tbody>
                                              </table>
                                            </div>     
                                            </div>
</div>
                                            <div class="row">
    <div class="col-md-12 d-flex justify-content-around">

                                            <div id="roadmapTracker" class ="tableCard">
                                            <h4>Week 3</h4>

                                              <table class="table table-striped">
                                                <tr>
                                                  <thead>
                                                    <th>#</th>
                                                    
                                                    <th>Actions</th>
                                                    <th>About</th>
                                                    <th>Time Estimate</th>
                                                  </thead>
                                                </tr>
                                                <tbody id="week3">
                                                </tbody>
                                              </table>
                                            </div>     
                                            </div>
</div>
                                            <div class="row">
    <div class="col-md-12 d-flex justify-content-around">

                                            <div id="roadmapTracker" class ="tableCard">
                                            <h4>Week 4</h4>

                                              <table class="table table-striped">
                                                <tr>
                                                  <thead>
                                                    <th>#</th>
                                                    
                                                    <th>Actions</th>
                                                    <th>About</th>
                                                    <th>Time Estimate</th>
                                                  </thead>
                                                </tr>
                                                <tbody id="week4">
                                                </tbody>
                                              </table>
                                            </div>     
       
    </div>
</div>

</div>
</div>



        <div id="editRow" class="modal1" >
                      <!-- Modal content -->
                       <div class="modal-content123">
                        <div>Edit User Details<span class="close">&times;</span><br></div>
						              <hr>
                            <form action="edituser.php" method="POST" style="margin-top:20px" onsubmit="return Formvalidate()">
                                              <div class="form-group row">
                                                <label for="userName" class="col-sm-2 col-form-label">Name</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="studentName" name="studentName" placeholder="Name" required>
                                                </div>
                                              </div>

                                              <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                  <input type="email" class="form-control" id="studentEmail" name="studentEmail" placeholder="Email" required>
                                                </div>
                                              </div>

                                              <input type="hidden" name="studentID" id="studentID">
                                             
                                              


                                              <div class="form-group row">
                                                <label for="userPhone" class="col-sm-2 col-form-label">Phone <span class="text-danger" id="errorphone"></span></label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="studentPhone" name="studentPhone" placeholder="Phone" required>
                                                </div>
                                              </div>

                                            

                                              <div class="form-group row" >
                                                <label for="userType" class="col-sm-2 col-form-label">Type</label>
                                                <div class="col-sm-10">
                                                  <select name="type" class="form-control"id="userType" onchange="addType(this.value)" required>
                                                    <option value="parent">Parent</option>
                                                    <option value="student">Student</option>
                                                    <option value="tutor">Tutor</option>
                                                  </select>
                                                </div>
                                              </div>

                                              <div class="form-group row" id="typeToAppend" >
                                                <label for="studentLevel" class="col-sm-2 col-form-label">Student Level</label>
                                                <div class="col-sm-10">
                                                  <select name="studentLevel" class="form-control"id="studentLevel">
                                                  </select>
                                                </div>
                                              </div>

                                              <div class="form-group row">
                                                <div class="col-sm-10">
                                                  <button type="submit" class="btn btn-primary"name="updatestudent" id="updatestudent" >Update</button>
                                                </div>
                                              </div>
                                   </form>
                                </div>
                    </div>

<script>
    let roadmapData="";
    $(document).ready(function(){
         roadmapData = <?php echo json_encode($roadMapData);?>;
        console.log(roadmapData);
        createTable(roadmapData);
    })

    function createTable(roadmapData){
        let idMap={
            "Week 1":"week1",
            "Week 2":"week2",
            "Week 3":"week3",
            "Week 4":"week4"
        }
        roadmapData.forEach(function(item){
            i=1;
            let val = item.Property.split("|");
            let id = idMap[val[0]];
            let tr=`<tr>
                        <td>${item.Q_ID}</td>
                        <td>${val[1]}</td>
                        <td>${val[2]}</td>
                        <td>${val[3]}</td>
                        <td><button type="button" class="btn btn-success" onclick="editRow(${item.Q_ID})">Edit</button></td>
                    </tr>`;
            $("#"+id).append(tr);
        })
    }

     function editRow(id){
            roadmapData.forEach(function(item){
                if(item.Q_ID==id){
                    let val = item.Property.split("|");
                    $("#editRow").css("display","block");
                    $("#roadmapRowID").val(id);
                    $("#roadmapAction").val(val[1]);
                    $("#roadmapAbout").val(val[2]);
                    $("#roadmapTime").val(val[3]);
                    $("#roadmapWeek").val(val[0]);
                }
            })
        }

        $(".close").click(function(){
                      $("#editRow").css("display","none");
                     

                     })
</script>
