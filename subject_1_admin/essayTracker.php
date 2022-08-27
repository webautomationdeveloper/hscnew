<?php
$essayObj = new SubjectHandler();
$essayData = $essayObj->essayPlanRead();

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




<input type="hidden"  id="essayTrackerData" value='<?php echo json_encode($essayData)?>' >
<div class="row">
    <div class="col-md-12 d-flex justify-content-around">
    <div id="essayTrackerTable" class ="tableCard">
                                              <h3>Essay Tracker</h3>
                                              <table class="table table-striped">
                                                <tr>
                                                  <thead>
                                                    <th>#</th>
                                                    <th>Topic</th>
                                                    <th></th>

                                                   
                                                  </thead>
                                                </tr>
                                                <tbody id="essayTracker">
                                                </tbody>
                                              </table>
                                            </div>               
       
    </div>
</div>

</div>
</div>

                 

<script>
  let essayData=<?php echo json_encode($essayData)?>;
    $(document).ready(function(){
       
       
        $("#editEssayModal").empty();
        essayData.forEach(function(item){
            let tr=`<tr>
                        <td>
                        ${item.Q_ID}
                        </td>
                        
                        <td id='essay${item.Q_ID}'>
                        ${item.essay_name}
                        </td>
                        
                        <td>
                       <button type='button' class='btn btn-success' onclick="editEssay('${item.Q_ID}')">Edit</button>
                        </td>
                        
                       
                         </tr>`;

                    $("#essayTracker").append(tr);
        })
    })



    function editEssay(val){
      
     for(let i=0;i<essayData.length;i++){
      let item = essayData[i];
      if(item.Q_ID==val){
        $("#actionName").val(item.essay_name);
        $("#actionID").val(val);
        $("#typeOfAction").val("essayTracker");
      }
     }
      $("#editModel").css("display","block");
    }

    $(".close").click(function(){
                      $("#editModel").css("display","none");
                      })


</script>