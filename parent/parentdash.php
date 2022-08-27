<?php

  $obj = new ParentChildDetails();
  $studentalldata = $obj -> ParentChild($userid);                  
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

    <div class="container" id="mainContainer">
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
                            <a class="nav-link" href="index.php?&action=dash">HSC Dashboard</a>
                        </li>

                        <li class="nav-item navMenu">
                            <a class="nav-link" href="index.php?&action=parent">Our Child</a>
                          
                        </li>
                    
                    </ul>

                </div>

                
                <div class ="mt-5">
                  <a href="../logout.php" class="btn btn-info btn-lg">
                    <span class="glyphicon glyphicon-log-out"></span> Log out
                  </a>
                </div>

              </nav>
    </div>
            
                
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>Welcome to Parent Dashboard</h2>
                            </div>
                        </div>
                    </div>
            <!-- Modal -->
                </body>
            </html>

<script>
   let  studentdata = <?php echo json_encode($studentalldata); ?>;
  //  console.log(studentdata);
    $(document).ready(function(){
        createTable();
    })

    function createTable(){
        studentdata.forEach(function(item){
            let tr=`<tr>
                        <td class="text-center">${item.Name}</td>
                        <td class="text-center">${item.Email}</td>
                        <td class="text-center">${item.Phone}</td>
                        <td class="text-center"><button type="button" class="btn btn-success" onclick="showchildata(${item.users_id})">View</button></td>
                    </tr>`;
                    $("#Student_AllDetails").append(tr);
        })
    }

function showchildata(val)
{
  console.log("click");
  // console.log(val);
  // let id = $("#childID").val();
  // console.log(id);
}
</script>
                    
                   
                

