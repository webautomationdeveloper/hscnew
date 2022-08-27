<style>
  /* The Modal (background) */
  .modal1 {
    display: none;
    /* Hidden by default */
    position: fixed;
    /* Stay in place */
    z-index: 1;
    /* Sit on top */
    left: 0;
    top: 0;
    width: 100%;
    /* Full width */
    height: 100%;
    /* Full height */
    /* overflow: auto; Enable scroll if needed */
    background-color: rgb(0, 0, 0);
    /* Fallback color */
    background-color: rgba(0, 0, 0, 0.4);
    /* Black w/ opacity */
  }

  /* Modal Content/Box */
  .modal-content12 {
    background-color: #fefefe;
    margin: 5% 23%;
    /* 15% from the top and centered */
    padding: 20px;
    border: 1px solid #888;
    width: 60%;
    /* Could be more or less, depending on screen size */
    height: 80%;
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

  .btn12 {
    color: white;
    background: #52B760;
    padding: 5px;
    border-radius: 5px;
    outline: none;
    border: 0px;
  }


  #flot_container {
    display: flex;
    margin-top: 10px;
  }

  .child {
    width: 50%;
    max-height: 100%;
    overflow-y: scroll;
    margin: 5px;
  }
</style>


<script>
  function Formvalidate() {
    var phone = document.getElementById("studentPhone").value;
    if (phone.length > 13) {
      document.getElementById("errorphone").innerHTML = "*";
      return false;
    }
  }
</script>
<input type="hidden" id="student" value='<?php echo json_encode($studentData) ?>'>
<input type="hidden" id="subList" value='<?php echo json_encode($subject) ?>'>
<input type="hidden" id="level" value='<?php echo json_encode($levelData) ?>'>


<div class="app-main__outer">
  <div class="app-main__inner">
    <div class="row">
      <div class="col-md-12">
        <div class="main-card mb-3 card">
          <div class="card-header">Students
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
                  <th class="text-center">Level</th>
                  <th class="text-center">Subjects</th>
                  <th class="text-center">Action</th>
                </tr>


              </thead>
              <tbody id="studentDataTable">

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>


  <div id="myModal" class="modal1">
    <!-- Modal content -->
    <div class="modal-content12">
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



        <div class="form-group row">
          <label for="userType" class="col-sm-2 col-form-label">Type</label>
          <div class="col-sm-10">
            <select name="type" class="form-control" id="userType" onchange="addType(this.value)" required>
              <option value="parent">Parent</option>
              <option value="student">Student</option>
              <option value="tutor">Tutor</option>
            </select>
          </div>
        </div>

        <div class="form-group row" id="typeToAppend">
          <label for="studentLevel" class="col-sm-2 col-form-label">Student Level</label>
          <div class="col-sm-10">
            <select name="studentLevel" class="form-control" id="studentLevel">
            </select>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary" name="updatestudent" id="updatestudent">Update</button>
          </div>
        </div>
      </form>
    </div>
  </div>




  <div id="subjectList" class="modal1" style="display:none">
    <!-- Modal content -->
    <div class="modal-content12" id="first">
      <div><span class="close">&times;</span><br></div>
      <div style="text-align:center;"><b>Subject Details<b></div>
      <div id="flot_container">

        <div class="child">
          <div>
            <h5 style="text-align:center;">List of all Subjects</h5>
          </div>
          <table class="align-middle mb-0 table table-borderless table-striped table-hover">
            <thead>
              <tr>
                <th class="text-center">#</th>
                <th class="text-center">Subject</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody id="subjectDataTable">
            </tbody>
          </table>
        </div>

        <div class="child">
          <div>
            <h5 style="text-align:center;">List of Subject Choosen by Student</h5>
          </div>

          <div>
            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
              <thead>
                <tr>

                  <th class="text-center">Subject</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody id="selectedSubjectTable">

              </tbody>
            </table>

          </div>

        </div>
      </div>
    </div>
  </div>








  <script>
    let studentData = JSON.parse($("#student").val());
    console.log(studentData);
    for (let i = 0; i < studentData.length; i++) {

      let tr = `<tr>
                                    <td class="text-center text-muted">${i+1}</td>
                                    <td class="text-center text-muted">${studentData[i]["Name"]}</td>
                                    <td class="text-center">${studentData[i]['Email']}</td>
                                    <td class="text-center">${studentData[i]['Phone']}</td>
									<td class="text-center">${studentData[i]['level_name']}</td>
                                    <td class="text-center">
									<button type="button" class="mb-2 mr-2 btn-transition btn btn-outline-info" onclick="addSubject(${studentData[i]['users_id']})" style="cursor:pointer;">View List</button>  
									</td>
									<td class="text-center">
                                    
                                   
									<button type="button" class="btn btn-default btn-lg btn-outline-warning"  onclick="edit(${studentData[i]['users_id']})"><i class="fa fa-edit"></i></button>  
									<button type="button" class="btn btn-default btn-lg btn-outline-danger"  onclick="deleteUser(${studentData[i]['users_id']})"><i class="fa fa-trash"></i></button>
                  <a target="_blank" href="../student/index.php?action=essay&id=${studentData[i]['users_id']}&uname=${studentData[i]['Name']}"><button class="btn btn-success">View Data</button></a> 
                  
                 
                
                 </td>                 

                                    </tr>`;
      $("#studentDataTable").append(tr);
    }

    $(".close").click(function() {
      $("#subjectList").css("display", "none");
      $("#myModal").css("display", "none");
    })



    function addType(val) {
      if (val == "student") {
        $("#typeToAppend").css("display", "");

      } else {
        $("#typeToAppend").css("display", "none");

      }
    }


    function edit(userID) {
      console.log(userID);
      $("#myModal").css("display", "block");
      let options = JSON.parse($("#level").val());

      $("#studentLevel").empty();

      for (let i = 0; i < options.length; i++) {
        let opt = `<option value=${options[i].level_ID}>${options[i].level_name}</option>`;
        $("#studentLevel").append(opt);
      }

      studentData.forEach(function(item) {
        console.log(item);
        if (item.users_id == userID) {
          $("#studentName").val(item.Name);
          $("#studentEmail").val(item.Email);
          $("#studentPhone").val(item.Phone);
          $("#userType").val(item.Type);
          $("#studentLevel").val(item.level_ID);
          $("#studentID").val(item.users_id);

        }
      })
    }


    function addSubject(userId) {

      $("#subjectList").css("display", "block");
      let sublist = JSON.parse($("#subList").val());
      console.log(sublist);
      $("#subjectDataTable").empty();

      $.ajax({
        type: "POST",
        url: "edituser.php",
        data: "uid=" + userId,
        success: function(data) {
          let val = JSON.parse(data);
          console.log(val);
          $("#selectedSubjectTable").empty();

          for (let i = 0; i < val.length; i++) {
            let tr = `<tr>
                                        <td class="text-center text-muted">${val[i].name}</td> 
                                        <td class="text-center text-muted"> 
                                        <button type="button" class="mb-2 mr-2 btn-transition btn btn-outline-info" onclick="removeSubject('${val[i].subject_ID}|${userId}')" style="cursor:pointer;">Remove Subject</button>
                                        </td> 
                                        </tr>`;
            $("#selectedSubjectTable").append(tr);
          }


        }
      });





      for (let i = 0; i < sublist.length; i++) {
        let para = sublist[i]['subject_ID'] + "|" + userId;
        console.log(para);
        let tr = `<tr>
                                    <td class="text-center text-muted">${i+1}</td>
                                    <td class="text-center text-muted">${sublist[i]["name"]}</td>
                                    <td class="text-center">
									                  <button type="button" class="mb-2 mr-2 btn-transition btn btn-outline-info" onclick="selectSubject('${para}')" style="cursor:pointer;">Add Subject</button>  
								                  	</td>              
                                  </tr>`;
        $("#subjectDataTable").append(tr);
      }
    }

    function selectSubject(subID) {
      let subjectID = subID.split("|")[0];
      let userID = subID.split("|")[1];
      console.log(subjectID, userID);

      let subData = "userID=" + userID + "&subID=" + subjectID;
      $.ajax({
        type: "POST",
        url: "edituser.php",
        data: subData,
        success: function(data) {
          console.log(data);
          let val = JSON.parse(data);
          console.log(val);
          let tr = `<tr>
                                      <td class="text-center text-muted">${val.name}</td> 
                                      <td class="text-center text-muted"> 
                                       <button type="button" class="mb-2 mr-2 btn-transition btn btn-outline-info" onclick="removeSubject('${val.subject_ID}|${userID}')" style="cursor:pointer;">Remove Subject</button>
                                       </td> 
                                       </tr>`;
          $("#selectedSubjectTable").append(tr);

        }
      });

    }

    function removeSubject(subID) {
      let subjectID = subID.split("|")[0];
      let userID = subID.split("|")[1];

      let subData = "usrID=" + userID + "&subID=" + subjectID;


      $.ajax({
        type: "POST",
        url: "edituser.php",
        data: subData,
        success: function() {
          alert("Removed");
          addSubject(userID);
        }
      });
    }



    function deleteUser(userID) {
      $.ajax({
        type: "POST",
        url: "edituser.php",
        data: "delID=" + userID + "&type=student",
        success: function(data) {
          location.replace("index.php?&user=student");
        }
      });
    }
  </script>