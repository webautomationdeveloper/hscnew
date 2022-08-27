<?php
$Obj = new SubjectHandler();
$syllabusData = $Obj->syllabusTracker();

?>


<style>
    input[type="checkbox"]{
  width: 20px; /*Desired width*/
  height: 20px; /*Desired height*/
}
             
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




<input type="hidden"  id="syllabusTrackerData" value='<?php echo json_encode($essayData)?>' >
<div class="row">
    <div class="col-md-12 d-flex justify-content-around">
                      <div id="syllabusTrackerTable" class ="tableCard" style="overflow:scroll;height:85vh;">
                                              <h3>Syllabus Tracker</h3>
                                              <table class="table table-striped">
                                                <tr>
                                                  <thead>
                                                    
                                                    <th>Topic</th>
                                                    <th>Part</th>
                                                    <th>Syllabus Dot Point</th>
                                                    <th>Revise</th>
                                                    <th>SA Question</th>
                                                    <th>MC</th>
                                                    <th>SAQ</th>
                                                    <th>Essay</th>

                                                  </thead>
                                                </tr>
                                                <tbody id="syllabusTracker">
                                                </tbody>
                                              </table>
                                            </div>               
       
    </div>
</div>

</div>
</div>

                 

<script>
  let syllabusData=<?php echo json_encode($syllabusData)?>;
   $(document).ready(function(){
    createTable();
   })



   function editsyllabusRow(id){
    $("#editsyllabus").css("display","block");
    $("#syllabusPointID").val(id);
    syllabusData.forEach(function(item){
      if(item.Q_ID==id){

      $("#topic").val(item.topic);
      $("#part").val(item.part);
      $("#Syllabus_Point").val(item.syllabus_point);
      $("#revise").val(item.revise);
      $("#saQuestion").val(item.sa_question);

      }
    })
   }

   function updateSyllabus(){
    let id= $("#syllabusPointID").val();
    for(let i=0;i<syllabusData.length;i++){
      if(syllabusData[i].Q_ID==id){
        syllabusData[i].topic= $("#topic").val();
        syllabusData[i].part = $("#part").val();
        syllabusData[i].syllabus_point = $("#Syllabus_Point").val();
        syllabusData[i].revise = $("#revise").val();
        syllabusData[i].sa_question = $("#saQuestion").val();
      }
    }
    let topic = $("#topic").val();
    let part = $("#part").val();
    let syllabus_point =$("#Syllabus_Point").val();
    let revise=$("#revise").val();
    let saquestion=$("#saQuestion").val();


    data = "syllabusPointID="+id+"&topic="+topic+"&part="+part+"&syllabusPoint="+syllabus_point+"&revise="+revise+"&saquestion="+saquestion;
                          console.log(data);
                            $.ajax({  
                                    type:"POST",  
                                    url:"subjectHandler.php",  
                                    data:data,  
                                    success: function(status){ 
                                      alert(status);
                                      createTable();
                                      $("#editsyllabus").css("display","none");
                                      }
                                });
      }





   function createTable(){
   
    $("#syllabusTracker").empty();
    syllabusData.shift();
    syllabusData.forEach(function(item){
           let tr=`<tr>

                       <td id='syllabus${item.topic}_A'>
                       ${item.topic}
                       </td>

                       <td id='syllabus${item.Q_ID}_B'>
                       ${item.part}
                       </td>
                       
                       <td id='syllabus${item.Q_ID}_C'>
                       ${item.syllabus_point}
                       </td>

                       <td id='syllabus${item.Q_ID}_D'>
                       ${item.revise}
                       </td> 
                       
                       <td id='syllabus${item.Q_ID}_E'>
                       ${item.sa_question}
                       </td>

                       <td id='mct${item.Q_ID}'>
                       <input type="checkbox" id=mc_Check${item.Q_ID} value='${item.mc}' onchange="updateCheckVAl('mc_Check${item.Q_ID}','${item.Q_ID}')">
                       </td>

                       <td id='saqc${item.Q_ID}'>
                       <input type="checkbox" id=saq_Check${item.Q_ID} value='${item.saq}' onchange="updateCheckVAl('saq_Check${item.Q_ID}','${item.Q_ID}')">
                       </td>

                       <td id='essay${item.Q_ID}'>
                       <input type="checkbox" id=essay_Check${item.Q_ID} value='${item.essay}' onchange="updateCheckVAl('essay_Check${item.Q_ID}','${item.Q_ID}')">
                       </td>

                       <td>
                      <button type='button' class="btn btn-success" onclick="editsyllabusRow('${item.Q_ID}')">Edit</button>
                       </td>
                    
                        </tr>`;

                   $("#syllabusTracker").append(tr);

                   if(item.mc==1){
                    $("#"+`mc_Check${item.Q_ID}`).prop('checked', true)
                   }
                   if(item.saq==1){
                    $("#"+`saq_Check${item.Q_ID}`).prop('checked', true)
                   }
                   if(item.essay==1){
                    $("#"+`essay_Check${item.Q_ID}`).prop('checked', true)
                   }
       })
   }

   function updateCheckVAl(id,rowID){
    let val = $("#"+id).is(":checked");
    let type=id.split("_")[0];

              $.ajax({  
                     type:"POST",  
                     url:"subjectHandler.php",  
                     data:"rowID="+rowID+"&value="+val+"&type="+type, 
                     success: function(status){ 
                                      
                    }
                    });
      }

   $(".close").click(function(){
                      $("#editsyllabus").css("display","none");
                     })

</script>
   