<?php
// session_start(); 

require_once('functions.php');

  // require_once('../student/functions.php');
  // require_once('../parent/functions.php');
//here we will firstmatch session and proced further for now we are proceeding for demo

$obj= new Readactions();
$essyData  = $obj->essayTracker();
if(isset($_REQUEST['id'])){
  $id = $_REQUEST['id'];
  $userResponse = $obj->readUserReaponse($id,'2');
}else{
$userResponse = $obj->readUserReaponse($_SESSION['UserID'],'2');
}

?>

<div class="container">
        <div class="row mb-5  justify-content-center text-center" style="margin-top: 100px;">
            <div class="col-lg-12 mb-2">
            <div class="card">
                  <div class="card-header">
                    Essay Tracker
                  </div>
                  <div class="card-body" style="overflow:scroll;max-height:85vh">
                   <table class="table table-striped">
                    <thead>
                        <tr>
                             

                            <th scope="col">
                                Topic
                            </th>

                            <th scope="col">
                              Essay Name
                            </th>

                            <th scope="col">
                             Draft Completed
                            </th>

                            <th scope="col">
                            Submitted Feedback
                            </th>

                            <th scope="col">
                            Initial Mark
                            </th>

                            <th scope="col">
                              Enhanced
                            </th>

                            <th scope="col">
                              Updated Marks
                            </th>

                        </tr>
                    </thead>
                    <tbody id="essayTrackerRows">

                            <tr>
                              <td></td>
                              <td></td>
                              <td id="draftRating">0%</td>
                              <td id="feedbackRating">0%</td>
                              <td id="initalMark">0%</td>
                              <td id="enhancedRating">0%</td>
                              <td id="updatedmarkRating">0%</td>
                            </tr>

                    </tbody>
                   </table>
                  </div>
                </div>
            </div>
        </div>
</div>

<script>
   $( document ).ready(function() {
    let essayRow = <?php echo json_encode($essyData);?>;
    let userResponse =<?php echo json_encode( $userResponse);?>;

<?php if(isset($_SESSION['parent'])){ ?>
    essayRow.forEach(function(item){
       let tr=`<tr>
     
            <td>${item.topic}</td>
            <td>${item.essay_name}</td>
            <td><input type="checkbox" class="onoffswitch-checkbox" onclick="return false" id="essay${item.Q_ID}_A" onchange="addCounter('essay${item.Q_ID}_A','draftRating')"></td>
            <td><input type="checkbox" class="onoffswitch-checkbox" onclick="return false" id="essay${item.Q_ID}_B" onchange="addCounter('essay${item.Q_ID}_B','feedbackRating')"></td>
            <td><input type="number" class="onoffswitch-checkbox" readonly id="essay${item.Q_ID}_C" style="width:75%;outline:none" onchange="markRating('essay${item.Q_ID}_C','initalMark')"></td>
            <td><input type="checkbox" class="onoffswitch-checkbox" onclick="return false" id="essay${item.Q_ID}_D" onchange="addCounter('essay${item.Q_ID}_D','enhancedRating')"></td>
            <td><input type="number" class="onoffswitch-checkbox"  readonly id="essay${item.Q_ID}_E" style="width:75%;outline:none" onchange="markRating('essay${item.Q_ID}_E','updatedmarkRating')"></td>
            
     
          </tr>`;
       $("#essayTrackerRows").append(tr);
    })
<?php } else { ?>
  essayRow.forEach(function(item){
      
      let tr=`<tr>
    
           <td>${item.topic}</td>
           <td>${item.essay_name}</td>
           <td><input type="checkbox" class="onoffswitch-checkbox" id="essay${item.Q_ID}_A" onchange="addCounter('essay${item.Q_ID}_A','draftRating')"></td>
           <td><input type="checkbox" class="onoffswitch-checkbox" id="essay${item.Q_ID}_B" onchange="addCounter('essay${item.Q_ID}_B','feedbackRating')"></td>
           <td><input type="number" class="onoffswitch-checkbox" id="essay${item.Q_ID}_C" style="width:75%;outline:none" onchange="markRating('essay${item.Q_ID}_C','initalMark')"></td>
           <td><input type="checkbox" class="onoffswitch-checkbox" id="essay${item.Q_ID}_D" onchange="addCounter('essay${item.Q_ID}_D','enhancedRating')"></td>
           <td><input type="number" class="onoffswitch-checkbox" id="essay${item.Q_ID}_E" style="width:75%;outline:none" onchange="markRating('essay${item.Q_ID}_E','updatedmarkRating')"></td>
           <td><button type="button" class="btn btn-success" onclick="saveEssayResponse('${item.Q_ID}|${item.SAL_ID}|${item.subject_id}')">Save</button></td>
    
         </tr>`;
      $("#essayTrackerRows").append(tr);
   })

<?php } ?>

    if(userResponse.length>0){
        userResponse.forEach(function(e){
          console.log(e);
            let res = (e.response).split(",");

           
            let id1 = "essay"+e.Q_ID+"_A";
            let id2=  "essay"+e.Q_ID+"_B";
            let id3 = "essay"+e.Q_ID+"_C";
            let id4 = "essay"+e.Q_ID+"_D";
            let id5 = "essay"+e.Q_ID+"_E";

            
            $("#"+id1).prop('checked',res[0]==='true');
            $("#"+id2).prop('checked',res[1]==='true');
            $("#"+id3).val(res[2]);
            $("#"+id4).prop('checked',res[3]==='true');
            $("#"+id5).val(res[4]);
            
            addCounter(id1,'draftRating');
            addCounter(id2,'feedbackRating');
            addCounter(id4,'enhancedRating');
            markRating(id3,"initalMark");
            markRating(id5,"updatedmarkRating");

        })
    }
});




function saveEssayResponse(val){
    let id = val.split("|")[0];
    console.log(id);
    let response = $("#essay"+id+'_A').is(':checked')+","+$("#essay"+id+'_B').is(':checked')+","+$("#essay"+id+'_C').val()+","+$("#essay"+id+'_D').is(':checked')+","+$("#essay"+id+'_E').val();
    response = val+"|"+response;
    console.log(response);
    saveresponse(response);
}


function saveresponse(resp){

  // let userID = <?php //echo json_encode($_SESSION['UserID']);?>;
  <?php if(isset($_REQUEST['id'])){ $id= $_REQUEST['id'];?>
  let userID = <?php echo json_encode($id);?>;
  <?php } else { ?>
    let userID = <?php echo json_encode($_SESSION['UserID']);?>;
  <?php } ?>

  let [qid,sal_ID,sub_id,response]=resp.split("|");

  let res = "qid="+qid+"&sal_id="+sal_ID+"&sub_ID="+sub_id+"&userID="+userID+"&res="+response;
  console.log(res);
  $.ajax({  
                                    type:"POST",  
                                    url:"../subject_1/studentHandler.php",  
                                    data:res,  
                                    success: function(retVal){ 
                                      console.log(retVal);
                                      alert("Record Saved Successfully");
                                       
                                    }
                                }); 
}

let ratingIndexVal = {
    "draftRating":0,
    "feedbackRating":0,
    "enhancedRating":0,
    "initalMark":0,
    "updatedmarkRating":0
  }

function addCounter(id,ratingVar){
  if($("#"+id).is(":checked")==true){
    ratingIndexVal[ratingVar]=ratingIndexVal[ratingVar]+1; 
  }
  else{
    ratingIndexVal[ratingVar]=ratingIndexVal[ratingVar]-1;
  }
  $("#"+ratingVar).text((ratingIndexVal[ratingVar]/12).toFixed(2)*100+"%");
}



function markRating(id,ratingVar){
 $("#"+ratingVar).text("");
 let val =  +$("#"+id).val();
 console.log(ratingIndexVal[ratingVar]);
 ratingIndexVal[ratingVar]=ratingIndexVal[ratingVar]+val;
 console.log(ratingIndexVal[ratingVar]);
 $("#"+ratingVar).text((ratingIndexVal[ratingVar]/12).toFixed(2)+"%");
}

</script>