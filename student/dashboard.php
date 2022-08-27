<?php 
// session_start();

include_once('functions.php');
$obj= new Dashboard();

$currentUser = $_SESSION['UserID'];
$goalData = $obj->readGoalData($currentUser);
$dashBoard = $obj->dashboardData($currentUser,"4");


$obj= new Readactions();
$syllabustracker = $obj->syllabusTracker();
$syllabusResponse = $obj->readUserReaponse($_SESSION['UserID'],'4',"9");


//essaytrackerdraftcompletedata
$obj1 = new Dashboard();
$essaytrakdrafcompl = $obj1->essaytrackerdraftcompletedata($_SESSION['UserID'],'2',"9");


?>


<style>

   
</style>


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
                        <th scope="col">Loads high priority items in order of priority, chosen by 'Syllabus Part'</th>
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
    let essayTrackerData = <?php echo json_encode($essaytrakdrafcompl); ?>;

    
    
    drawGraph([0,0,0,0],0,"myChart");
    essayTrackerTable(essayTrackerData);
    let syllabusTracker = <?php echo json_encode($syllabustracker);?>;
    let syllabusResponse = <?php echo json_encode($syllabusResponse); ?>;
    syllabusTrackerTable(syllabusTracker);
    assigninSyllabus(syllabusResponse);
    assignGoalData(goalData);
    assignSyllabusData(dashboardData);

  })

function essayTrackerTable(essayTrackerData){
  
    let essayWriting=0;
    let intialMark=[];
    let updatedMark=[];

    essayTrackerData.forEach(function(item){
      let res = item.response.split(",");
         if(res[0]=="true"){
              essayWriting++;
          }
          intialMark.push([+item.Q_ID, +res[2]]);
          updatedMark.push([+item.Q_ID, +res[4]]);
          $("#essaywriprog").text(((essayWriting/11)*100).toFixed(2)+"%");
    })


    drawEssayGraph(intialMark,updatedMark,"myChart2");
}


function assigninSyllabus(syllabusResponse){
  let setOfVal={

  }

  // syllabusResponse.forEach(function(item){
  //   console.log(item);
  //   let hrCount=[0,8,10,9,9,2,2,10,9,4,8,15,8,7,7,4,1,10,9,6,12,4,4,6]; // pointer to add horizonatal row in table



  // })
    let hrCount=[0,8,10,9,9,2,2,10,9,4,8,15,8,7,7,4,1,10,9,6,12,4,4,6]; // pointer to add horizonatal row in table
    let studyNotes ={};
    let saq={};
    for(let k = 0;k<=hrCount.length;k++){

      let lBound=hrCount[k]+1;
      let uBound =hrCount[k]+hrCount[k+1];
      
      studyNotes[k+1]= [];
      saq[k+1]=[];
      
      syllabusResponse.forEach(function(item){
                                                          if(item.Q_ID>=lBound && item.Q_ID<=uBound){
                                                           let val =  item.response.split(",")[0];
                                                           let saqVal= item.response.split(",")[7];
                                                           if(val=="true")
                                                           studyNotes[k+1].push( val);
                                                           saq[k+1].push(saqVal);
                                                          } 
                                                          })

      $("#studyNotes"+(k+2)).text((studyNotes[k+1].length/hrCount[k+1]*100).toFixed(2)+"%");
      $("#saq"+(k+2)).text((saq[k+1].length/hrCount[k+1]*100).toFixed(2)+"%");


      console.log([k+1]+"   "+(studyNotes[k+1].length/hrCount[k+1]*100).toFixed(2)+"%");
      console.log([k+1]+"   "+(saq[k+1].length/hrCount[k+1]*100).toFixed(2)+"%");
    }



}

  function syllabusTrackerTable(syllabusTracker){
    let hrCount=[0,8,10,9,9,2,2,10,9,4,8,15,8,7,7,4,1,10,9,6,12,4,4,6]; // pointer to add horizonatal row in table
    let j=1;
    let k=0;
    let i=0;
    syllabusTracker.forEach(function(item){
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
    let mark1 = goalData.Mark1.split("%")[0];
    let mark2 = goalData.Mark2.split("%")[0];
    let mark3 = goalData.Mark3.split("%")[0];
    let mark4 = goalData.Mark_hsc_trials.split("%")[0];

    drawGraph([ Math.trunc(mark1), Math.trunc(mark2), Math.trunc(mark3), Math.trunc(mark4)],99,"myChart");
    // drawGraph([ Math.trunc(mark1), Math.trunc(mark2), Math.trunc(mark3), Math.trunc(mark4)],99,"myChart2");

    

    $("#goalAttr").text(goalData.atar);
    $("#goalMark").text(goalData.economic_marks);
    $("#remainingTrial").text(goalData.Mark_hsc_trials);

  }


function drawEssayGraph(val,markLimit,id){

 let dataVal = Array(['Essay','Initial Mark','Updated Mark'],
                  ['#Essay 1', 0,0],
                  ['#Essay 2', 0,0],
                  ['#Essay 3', 0,0],
                  ['#Essay 4', 0,0],
                  ['#Essay 5', 0,0],
                  ['#Essay 6', 0,0],
                  ['#Essay 7', 0,0],
                  ['#Essay 8', 0,0],
                  ['#Essay 9', 0,0],
                  ['#Essay 10', 0,0],
                  ['#Essay 11', 0,0], 
              );

 let i=0;
 val.forEach(function(item){
  dataVal[item[0]][1]=item[1];
  dataVal[item[0]][2]=markLimit[i][1];
  i++;

 })

 dataVal=JSON.stringify(dataVal);
        google.charts.load('current', {
            'packages': ['corechart']
        });

        google.charts.setOnLoadCallback(drawChart);

        google.charts.load('current', {
            'packages': ['corechart']
        });


        function drawChart() {
            
          var data = google.visualization.arrayToDataTable(JSON.parse(dataVal));

            var options = {
                title: 'Goal Mark vs Actual Assessment Results'
            };

            var chart = new google.visualization.LineChart(document.getElementById(id));
            chart.draw(data, options);
        }
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

  </script>