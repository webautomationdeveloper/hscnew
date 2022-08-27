<?php
                    // parent login than show child list 
                    $obj = new ParentChildDetails();

                    $studentalldata = $obj -> ParentChild($userid);

                    $userid = $_SESSION["UserID"];
                    $studentalldata = $obj -> ParentChild($userid);


// essaytracker fetch data by child id (users table primarykey id=>(users_id)) 
$childessaytracker = $obj->EssayTrackerChildById();

// roadmaptracker fetch data by child id (user table primaryKey id(users_id))
$roadmapchild = $obj->RoadMapTrackerChild();

                    

                   

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Parent dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<style>
  .navMenu a:hover{
    color:#008021b8 !important;
  }

  .card-header{
        background-color:#008021b8 !important;
    }

  .navMenu a{
    color:#000 !important;
    font-size:16px;
  }

  .btn-info {
    color: #000;
    background-color: #008021b8 !important;
    border-color: #008021b8 !important;
}

.btn-info:hover {
    color: #fff;
   
}

  ul.nav li.dropdown:hover ul.dropdown-menu{ display: block; }


  .mb-3 {
    margin-bottom: 1rem!important;
    width: 80%;
    margin: 0 auto;
}
</style>
</head>

<body>
    <!-- <div class="container" id="mainContainer">
            <nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-between">

                <a class="navbar-brand" href="#">
                  <img src="logo.png" alt=""class="img-fluid" style="height: 100px;">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse mt-5" id="navbarNav">
                   
                    <ul class="navbar-nav">
                      
                        <li class="nav-item active navMenu">
                            <a class="nav-link" href="index.php?&action=parentdash">HSC Dashboard</a>
                        </li>

                        <li class="nav-item navMenu">
                            <a class="nav-link" href="index.php?&action=parent">Our Child</a>
                        </li>
                    
                    </ul>

                </div>

                <div class="username"><?php echo "Name: - ".$_SESSION["parent"]; ?></div>
                <div class ="mt-5">
                  <a href="../logout.php" class="btn btn-info btn-lg">
                    <span class="glyphicon glyphicon-log-out"></span> Log out
                  </a>
                </div>

              </nav>
    </div> -->
    <div>
    <?php include('header.php');?>
</div>
    


<div class="site-section">
      
        <div class="container">
        <div class="row mb-5  justify-content-center text-center" style="margin-top: 100px;">
          <div class="col-lg-5 mb-2">
            <h2 class="section-title-underline mb-">
              <span>HSC Economics Dashboard</span>
            </h2>
          </div>
        </div>

        <div class="row" style="align-items: center;">
          <div class="col-sm-9 d-flex">
            <div class="row">
              <div class="col-sm-4 col">
                <div class="card">
                  <div class="card-header">
                    Goal ATAR
                    <?php  //echo $_SESSION["UserID"];?>
                  </div>
                  <div class="card-body">
                    <p class="card-title">99</p>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 col">
                <div class="card">
                  <div class="card-header">
                    Goal HSC Economics Mark
                  </div>
                  <div class="card-body">
                    <p class="card-title">99</p>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 col">
                <div class="card">
                  <div class="card-header">
                    Total Remaining HSC Marks
                  </div>
                  <div class="card-body">
                    <p class="card-title">99</p>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 col">
                <div class="card">
                  <div class="card-header">
                    Study Notes Progress
                  </div>
                  <div class="card-body">
                    <p class="card-title">99</p>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 col">
                <div class="card">
                  <div class="card-header">
                    SAQ Progress
                  </div>
                  <div class="card-body">
                    <p class="card-title">99</p>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 col">
                <div class="card">
                  <div class="card-header">
                    Essay Writing Progress
                  </div>
                  <div class="card-body">
                    <p class="card-title">99</p>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <div class="col-sm-3 ">
            <div class="card second-box second-box">
              <div class="card-header">
                Traffic Light Rating Progress
              </div>

              <div class="strip">
                <p class="card-title">99</p>
              </div>
              <div class="strip">
                <p class="card-title">99</p>
              </div>
              <div class="strip">
                <p class="card-title">99</p>
              </div>
              <div class="strip">
                <p class="card-title">99</p>
              </div>

            </div>
          </div>
        </div>

        <div class="row" style="align-items: center; margin-top: 50px;">
          <div class="col-sm-6">
            <div class="card">
              <div class="card-header">
                Total Remaining HSC Marks

              </div>
              <div class="card-body">
                <p class="card-title">Insert Graph Here</p>
              </div>
          </div>
          </div>
          <div class="col-sm-6">
            <div class="card">
              <div class="card-header">
                Essay Writing Progress
              </div>
              <div class="card-body">
                <p class="card-title">Insert Graph Here</p>
              </div>
      </div>

  </div>
    </div>

    <table class="table table-striped" style="margin-top: 100px;;">
      <thead>
          <tr style="background-color: #008021b8; color: white;">
              <th scope="col">Syllabus Part</th>
              <th scope="col">Study Notes Completion</th>
              <th scope="col">SAQ Completion</th>

          </tr>
      </thead>
      <tbody>
          <tr>
              <td>1</td>
              <td>Mark</td>
              <td>Otto</td>

          </tr>
          <tr>
              <td>2</td>
              <td>Jacob</td>
              <td>Thornton</td>

          </tr>
          <tr>
              <td>3</td>
              <td>Larry</td>
              <td>the Bird</td>

          </tr>
      </tbody>
  </table>

  <div class="row mb-5 justify-content-center text-center " style="margin-top: 100px;">
    <div class="col-lg-6 mb-2">
      <h2 class="section-title-underline mb-">
        <span>High Priority Study Focus Areas
        </span>
      </h2>
    </div>
  </div>
  <div class="row" style="align-items: center; margin-top: 50px;">
    <div class="col-sm-12 mb-5">
    
              <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                <option selected>Select Your Topic Area >></option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
          

            <table class="table table-striped" style="margin-top: 30px;;">
                <thead>
                    <tr style="background-color: #008021b8; color: white;">
                        <th scope="col">Loads high priority items in order of priority, chosen by 'Syllabus
                            Part'</th>
                        <th scope="col">Priority Rating</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>1</th>
                        <td>Mark</td>


                    </tr>
                    <tr>
                        <th>2</th>
                        <td>Jacob</td>


                    </tr>
                    <tr>
                        <th>3</th>
                        <td>Larry</td>


                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

            
                
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
                                    <p id="demo"></p>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>

                                            <tr>  
                                                <th class="text-center">Name</th>
                                                <th class="text-center">Email ID</th>
                                                <th class="text-center">Phone</th>
                                                
                                            </tr>
                                            
                                            
                                            </thead>
                                            <tbody id="Student_AllDetails">
                                                 <tr>
                                                  <td></td>
                                                 </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <!-- Modal -->
                </body>
            </html>

<script>
   let  studentdata = <?php echo json_encode($studentalldata); ?>;
//    console.log(studentdata);
    $(document).ready(function(){
        createTable();
    })

    function createTable(){
        studentdata.forEach(function(item){
            let tr=`<tr>
                        <td class="text-center">${item.Name}</td>
                        <td class="text-center">${item.Email}</td>
                        <td class="text-center">${item.Phone}</td>
                        <td class="text-center"><button type="button" class="btn btn-success" onclick="childdata(${item.users_id})" >View</button></td>
                    </tr>`;
                    $("#Student_AllDetails").append(tr);
        })
    }

function childdata(ID)
{
    console.log(ID);
}
</script>
                    
                   
                

