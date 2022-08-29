<?php
// session_start(); 

require_once('functions.php');
//here we will firstmatch session and proced further for now we are proceeding for demo

$obj= new Readactions();
$roadmap  = $obj->roadMapTracker();
// start here  --    this condition used for show student record
if(isset($_REQUEST['id'])){
    $id = base64_decode($_REQUEST['id']);
    $roadmapResponse = $obj->readUserReaponse($id,'3');
  }else{
     $roadmapResponse = $obj->readUserReaponse($_SESSION['UserID'],'3');
  }
// end here --    this condition used for show student record
?>


<div class="container">

<div class="row mb-5  justify-content-center text-center sticky-top" style="background:#0080516e !important;padding:10px; margin-top:85px">
        <div class="col-lg-12 mb-2">
                  <div>
                    <span id="totalprogress">0%</span>
                    Progress Tracker
                  </div>
        </div>
    </div>




    <div class="row mb-5  justify-content-center text-center" >
        <div class="col-lg-12 mb-2">
            <div class="card">
                  <div class="card-header">
                    Week 1
                  </div>
                  <div class="card-body">
                   <table class="table table-striped">
                    <thead>
                        <tr>
                           
                            <th scope="col" id="week1progress">
                               0%
                            </th>
                            <th scope="col">
                                Action
                            </th>

                            <th scope="col">
                                About
                            </th>

                            <th scope="col">
                                Time Estimate
                            </th>
                        </tr>
                    </thead>
                    <tbody id="week1">

                    </tbody>
                   </table>
                </div>
        </div>
    </div>

    

    <div class="row mb-5  justify-content-center text-center" style="margin-top: 100px;">
        <div class="col-lg-12 mb-2">
            <div class="card">
                  <div class="card-header">
                    Week 2
                  </div>
                  <div class="card-body">
                   <table class="table table-striped">
                    <thead>
                        <tr>
                            
                            <th scope="col" id="week2progress">

                               0%
                            </th>
                            <th scope="col">
                                Action
                            </th>

                            <th scope="col">
                                About
                            </th>

                            <th scope="col">
                                Time Estimate
                            </th>
                        </tr>
                    </thead>
                    <tbody id="week2">

                    </tbody>
                   </table>
                </div>
        </div>
    </div>


    <div class="row mb-5  justify-content-center text-center" style="margin-top: 100px;">
        <div class="col-lg-12 mb-2">
            <div class="card">
                  <div class="card-header">
                    Week 3
                  </div>
                  <div class="card-body">
                   <table class="table table-striped">
                    <thead>
                        <tr>
                            
                            <th scope="col" id="week3progress">
                               0%
                            </th>
                            <th scope="col">
                                Action
                            </th>

                            <th scope="col">
                                About
                            </th>

                            <th scope="col">
                                Time Estimate
                            </th>
                        </tr>
                    </thead>
                    <tbody id="week3">

                    </tbody>
                   </table>
                </div>
        </div>
    </div>


    <div class="row mb-5  justify-content-center text-center" style="margin-top: 100px;">
        <div class="col-lg-12 mb-2">
            <div class="card">
                  <div class="card-header">
                    Week 4
                  </div>
                  <div class="card-body">
                   <table class="table table-striped">
                    <thead>
                        <tr>
                              
                            <th scope="col" id="week4progress">
                               0%
                            </th>
                            <th scope="col">
                                Action
                            </th>

                            <th scope="col">
                                About
                            </th>

                            <th scope="col">
                                Time Estimate
                            </th>
                        </tr>
                    </thead>
                    <tbody id="week4">

                    </tbody>
                   </table>
                </div>
        </div>
    </div>
</div>
<input type="hidden" value="0" name="" id="week1progressCount">
<input type="hidden" value="0" name="" id="week2progressCount">
<input type="hidden" value="0" name="" id="week3progressCount">
<input type="hidden" value="0" name="" id="week4progressCount">
<input type="hidden" value="0" name="" id="totalcount">





<script>

    let roadmapData="";
    $(document).ready(function(){
         roadmapData = <?php echo json_encode($roadmap);?>;
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
            <?php if(isset($_SESSION['parent'])){ ?>
                <td><input type="checkbox" onclick="return false" id="roadmapCheck${item.Q_ID}" onclick=setProgress('${id+"progress"}',${item.Q_ID},'${item.Q_ID}|${item.SAL_ID}|${item.subject_id}')></td>
            <?php }else{  ?>
                <td><input type="checkbox" id="roadmapCheck${item.Q_ID}" onclick=setProgress('${id+"progress"}',${item.Q_ID},'${item.Q_ID}|${item.SAL_ID}|${item.subject_id}')></td>
            <?php } ?>
                        <td>${val[1]}</td>
                        <td>${val[2]}</td>
                        <td>${val[3]}</td>
                    </tr>`;
            $("#"+id).append(tr);
        })
        let roadmapResponse = <?php echo json_encode( $roadmapResponse);?>;
    

        if(roadmapResponse.length>0){
            let count1=0;
            let count2=0;
            let count3=0;
            let count4=0;
            let totalCount = 0;
            roadmapResponse.forEach(function(e){
            let id = "roadmapCheck"+e.Q_ID;
            console.log(e.Q_ID);
            if(e.Q_ID>=1 && e.Q_ID<=6 && e.response=='true'){
                count1++;
               
                $("#"+id).prop('checked',true);
                 $("#week1progressCount").val(count1);
                $("#week1progress").text((count1/6).toFixed(1)*100+"%");
            }
            if(e.Q_ID>=7 && e.Q_ID<=12 && e.response=='true'){   
                count2++;
                
                $("#week2progressCount").val(count2);   
                $("#week2progress").text((count2/6).toFixed(1)*100+"%");
                $("#"+id).prop('checked',true);
            }
            if(e.Q_ID>=13 && e.Q_ID<=18 && e.response=='true'){
                count3++;
               
                $("#week3progressCount").val(count3);
                $("#week3progress").text((count3/6).toFixed(1)*100+"%");
                $("#"+id).prop('checked',true);
            }
            if(e.Q_ID>=19 && e.Q_ID<=24 && e.response=='true'){
                count4++;
              
                $("#week4progressCount").val(count4);
                $("#week4progress").text((count4/6).toFixed(1)*100+"%");
                $("#"+id).prop('checked',true);
            }
         })
         totalCount = count1+count2+count3+count4;
         console.log(totalCount);
         $("#totalcount").val(totalCount);
         $("#totalprogress").text((totalCount/24).toFixed(2)*100+"%");
        }
    }

    function setProgress(idName,rowID,parameter){
        let currentProgess = $("#"+idName).text().trim().replace("%","");
        let currentCheckVAl =$('#roadmapCheck' + rowID).is(":checked");
        let count = +$("#"+idName+"Count").val();
        let totalcount = +$("#totalcount").val();

        if(currentCheckVAl){
            count= count+1;
            totalcount++;
        }else{
            count = count-1;
            totalcount--;

        }
        if(count<0){
            count=0;
        }

       $("#totalcount").val(totalcount);
      
        $("#totalprogress").text((totalcount/24).toFixed(2)*100+"%");
        
        $("#"+idName+"Count").val(count);
        $("#"+idName).text((count/6).toFixed(1)*100+"%");
        <?php if(isset($_REQUEST['id'])){ ?>
            let userID = <?php echo json_encode($id);?>;
       <?php } else { ?>
        let userID = <?php echo json_encode($_SESSION['UserID']);?>;  

       <?php } ?>
        
        // console.log(userID);
        let [qid,sal_ID,sub_id]=parameter.split("|");
        let res = "qid="+qid+"&sal_id="+sal_ID+"&sub_ID="+sub_id+"&userID="+userID+"&res="+currentCheckVAl;
        $.ajax({  
                                    type:"POST",  
                                    url:"../subject_1/studentHandler.php",  
                                    data:res,  
                                    success: function(retVal){ 
                                      console.log(retVal);
                                    }
                                }); 
    }
</script>

