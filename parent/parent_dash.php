<?php
    include_once('functions.php');
    $obj= new Dashboard();
    $currentUser = $_SESSION['UserID'];
    $goalData = $obj->readGoalData($currentUser);
    $dashBoard = $obj->dashboardData($currentUser,"4");


    $obj= new Readactions();  
    $syllabustracker = $obj->syllabusTracker();
    $userResponse = $obj->readUserReaponse($_SESSION['UserID'],'4');


    //essaytrackerdraftcompletedata
    $obj1 = new Dashboard();
    $essaytrakdrafcompl = $obj1->essaytrackerdraftcompletedata();
               
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
<div>
  <?php include('header.php');?>
</div>
<div class="site-section">
      <div class="container">

      <div class="row mb-5  justify-content-center text-center" style="margin-top: 100px;">
        <div class="col-lg-5 mb-2">
          <h2 class="section-title-underline mb-">
            
            <span>HSC Economics Dashboard </span>
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
                </div>
                <div class="card-body">
                  <p class="card-title" id="goalAttr">99</p>
                </div>
              </div>
            </div>
            <div class="col-sm-4 col">
              <div class="card">
                <div class="card-header">
                  Goal HSC Economics Mark
                </div>
                <div class="card-body">
                  <p class="card-title" id="goalMark">99</p>
                </div>
              </div>
            </div>
            <div class="col-sm-4 col">
              <div class="card">
                <div class="card-header">
                  Total Remaining HSC Marks
                </div>
                <div class="card-body">
                  <p class="card-title" id="remainingTrial">99</p>
                </div>
              </div>
            </div>
            <div class="col-sm-4 col">
              <div class="card">
                <div class="card-header">
                  Study Notes Progress
                </div>
                <div class="card-body">
                  <p class="card-title" id="studyNotes">99</p>
                </div>
              </div>
            </div>
            <div class="col-sm-4 col">
              <div class="card">
                <div class="card-header">
                  SAQ Progress
                </div>
                <div class="card-body">
                  <p class="card-title" id="saqProgress">99</p>
                </div>
              </div>
            </div>
            <div class="col-sm-4 col">
              <div class="card">
                <div class="card-header">
                  Essay Writing Progress
                </div>
                <div class="card-body">
                  <p class="card-title" id="essaywriprog">99</p>
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
              <p class="card-title" style="background:red;text-align:center" id="redColor">99</p>
            </div>
            <div class="strip">
              <p class="card-title" style="background:orange;text-align:center" id="orangeColor">99</p>
            </div>
            <div class="strip">
              <p class="card-title" style="background:green;text-align:center" id="greenColor">99</p>
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
              <div id="myChart" style="width:100%; max-width:600px; height:500px;"></div>
            </div>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="card">
            <div class="card-header">
              Essay Writing Progress
            </div>
            <div class="card-body">
                <div id="myChart2" style="width:100%; max-width:600px; height:500px;"></div>
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
    <tbody id="syllabusPart">
       
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


<script>

$(document).ready(function(){
  let goalData = <?php echo json_encode($goalData); ?>;
  let dashboardData = <?php echo json_encode($dashBoard); ?>;

  let syllabusTracker = <?php echo json_encode($syllabustracker);?>;
  syllabusTrackerTable(syllabusTracker);

  assignGoalData(goalData);
  assignSyllabusData(dashboardData);;

  drawGraph([0,0,0,0],0,"myChart");
  drawGraph([0,0,0,0],0,"myChart2");

})

function syllabusTrackerTable(syllabusTracker){

  let hrCount=[0,8,10,9,9,2,2,10,9,4,8,15,8,7,7,4,1,10,9,6,12,4,4,6]; // pointer to add horizonatal row in table

  let j=1;
  let k=0;
  let i=0;
  syllabusTracker.forEach(function(item){
    
    // console.log(item);
    if(hrCount[k]==i){

      let tr=`<tr>
               <td>${item.part}</td>
               <td id="studyNotes${j}"></td>
               <td id="saq${j}"></td> 
           </tr>`;
           $("#syllabusPart").append(tr);
           j++;
           k++;
           i=0;
    }
    i++;
    })

}


let redCount=0;
let orangeCount=0;
let greenCount =0;
let saqCount=0;
let studyNotes=0;

function assignSyllabusData(assignSyllabusData){
  assignSyllabusData.forEach(function(item){

    let res = (item.response).split(",");

    if(res[0]){
      studyNotes++;
    }

    if(res[1]=='red'){
          redCount++;
      }

      if(res[1]=='orange'){
          orangeCount++;
      }

      if(res[1]=='green'){
          greenCount++;
      }

      if(res[1]=='green'){
          greenCount++;
      }

      if(res[6]==='true')saqCount++;

  })

  $("#studyNotes").text((studyNotes/165).toFixed(2)*100);
  $("#saqProgress").text((saqCount/165).toFixed(2)*100);
  $("#redColor").text((redCount/165).toFixed(2)*100);
  $("#orangeColor").text((orangeCount/165).toFixed(2)*100);
  $("#greenColor").text((greenCount/165).toFixed(2)*100);
  




}

function assignGoalData(goalData){

  $("#goalAttr").text(goalData.atar);
  $("#goalMark").text(goalData.economic_marks);
  $("#remainingTrial").text(goalData.Mark_hsc_trials);

}


function drawGraph(val,markLimit,id){


google.charts.load('current', {
  'packages': ['corechart']
});

google.charts.setOnLoadCallback(drawChart);

google.charts.load('current', {
  'packages': ['corechart']
});


function drawChart() {
  var data = google.visualization.arrayToDataTable([
      ['Contry', 'Mark','Goal'],
      ['#1', val[0],markLimit],
      ['#2', val[1],markLimit],
      ['#3', val[2],markLimit],
      ['HSC Trails', val[3],markLimit],
  ]);

  var options = {
      title: 'Goal Mark vs Actual Assessment Results'
  };

  var chart = new google.visualization.LineChart(document.getElementById(id));
  chart.draw(data, options);
}
}



//essay writing progress values add in td
let essaywetingprogressdata = <?php echo json_encode($essaytrakdrafcompl); ?>;

essaywetingprogressdata.forEach(function (item)
{
$("#essaywriprog").text(item.draft_completed);
});
</script>