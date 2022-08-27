                                  <script>



                                      function validateForm()
                                         {
                                          var phone=document.getElementById("userPhone").value;
                                            if(phone.length>13)
                                            {
                                              document.getElementById("errorphone").innerHTML="*!";
                                              return false;
                                            }
                                            else
                                            {
                                              document.getElementById("errorphone").innerHTML="";
                                            }

                                            var pass=document.getElementById("inputPassword3").value;
                                            var cpass=document.getElementById("inputPassword4").value;
                                            if(pass.length!=6)
                                            {
                                              document.getElementById("passlenght").innerHTML="Password must be greater than 5 character";
                                              return false;
                                            }
                                            else
                                            {
                                              document.getElementById("passlenght").innerHTML="";
                                              if(pass!=cpass)
                                              {
                                                document.getElementById("cpasserror").innerHTML="Password not matched";
                                                return false;
                                              }
                                              else
                                              {
                                                document.getElementById("cpasserror").innerHTML="";
                                              }
                                            }  
                                          }

                                          </script>               
          <input type="hidden" id="level" value='<?php echo json_encode($levelData)?>' >

                <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="row">
                            <div class="col-md-12">
                              <div class="main-card mb-3 card">


                                    <div class="card-header">
                                      <label id="operationType">Add User Details</label>
                                        <div class="btn-actions-pane-right">
                                           
                                        </div>
                                    </div>
                                   



                                  <div class="d-block text-center card-footer" id="userDetail">
                                      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" onsubmit="return validateForm()">
                                              <div class="form-group row">
                                                <label for="userName" class="col-sm-2 col-form-label">Name</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="userName" name="username" placeholder="Name" required>
                                                </div>
                                              </div>

                                              <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                  <input type="email" class="form-control" id="inputEmail3" name="userEmail" placeholder="Email" required>
                                                </div>
                                              </div>


                                              <div class="form-group row">
                                                <label for="userPhone" class="col-sm-2 col-form-label">Phone<span class="text-danger" id="errorphone"></span></label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="userPhone" name="userPhone" placeholder="Phone" required>
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
                                                <label for="inputPassword3" class="col-sm-2 col-form-label">Password <span class="text-danger" id="passlenght"></span></label>
                                                <div class="col-sm-10">
                                                  <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password length must be greater than 6" required>
                                                </div>
                                              </div>


                                              <div class="form-group row">
                                                <label for="inputPassword4" class="col-sm-2 col-form-label">Confirm Password <span class="text-danger" id="cpasserror"></span></label>
                                                <div class="col-sm-10">
                                                  <input type="password" class="form-control" id="inputPassword4" name="confirmPassword" placeholder="Confirm Password" required>
                                                </div>
                                              </div>

                                              
                                              <div class="form-group row">
                                                <div class="col-sm-10">
                                                  <button type="submit" class="btn btn-primary"name="addUser" >Add User</button>
												                          <!-- <button type="submit" class="btn btn-primary"name="addUser" >Cancel</button> -->
                                                </div>
                                              </div>

                                        </form>
                                  </div>
                                      
                                

                                
                                
                                </div>
                            </div>
                        </div>
                    </div>

<script>
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
  </script>



                   
                 
                    
            
                  




                   


