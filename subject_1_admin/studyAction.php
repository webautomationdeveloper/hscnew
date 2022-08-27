<style>
       #subheading{
                  background-color:#008021b8;
                  padding:5px;
                  color:white;
                  margin:10px;
                }

                table {
                    border-collapse: collapse;
                    width: 100%;
                    text-align: center;
                    background:#ffffff;
                    

                }
                .tableCard{  
                  border-radius:10px;
                  width:90%;
                  padding:10px;
                  margin-top:15px;
                  -webkit-box-shadow: 3px 1px 22px 0px rgba(0,0,0,0.75);
                    -moz-box-shadow: 3px 1px 22px 0px rgba(0,0,0,0.75);
                    box-shadow: 3px 1px 22px 0px rgba(0,0,0,0.75);
                }
                h3{
                  text-align:center;
                  margin:5px;
                }
</style>


<div class="row" >
                            <div class="col-md-12">
                              <div class="row">

                                      <div class="col-md-6 d-flex justify-content-around">
                                         <div id="weeklyActionTable" class ="tableCard">
                                              <h3>Weekly Study Actions</h3>
                                              <table>
                                                <tr>
                                                  <thead>
                                                    <th>#</th>
                                                    <th>Actions</th>
                                                    <th>Select</th>
                                                  </thead>
                                                </tr>
                                                <tbody id="weekly">
                                                </tbody>
                                              </table>
                                            </div>
                                        </div>


                                          <div class="col-md-6 d-flex justify-content-around">
                                            <div id="monthlyActionTable" class ="tableCard">
                                                <h3>Monthly Study Actions	</h3>
                                                <table>
                                                <tr>
                                                  <thead>
                                                    <th>#</th>
                                                    <th>Actions</th>
                                                    <th>Select</th>
                                                  </thead>
                                                </tr>
                                                <tbody id="monthly">
                                                  </tbody>
                                                </table>
                                              </div>
                                           </div>

                                        </div>
                                </div>
                          </div>



                          <div class="row">
                            <div class="col-md-12">
                              <div class="row">

                                      <div class="col-md-6 d-flex justify-content-around">
                                         <div id="twoweekpriorActionTable" class ="tableCard">
                                              <h3>Two week Prior Actions</h3>
                                              <table>
                                                <tr>
                                                  <thead>
                                                    <th>#</th>
                                                    <th>Actions</th>
                                                    <th>Select</th>
                                                  </thead>
                                                </tr>
                                                <tbody id="twoweekprior">
                                                </tbody>
                                              </table>
                                            </div>
                                        </div>


                                          <div class="col-md-6 d-flex justify-content-around">
                                            <div id="daybeforeActionTable" class ="tableCard">
                                                <h3>Day before Exam	</h3>
                                                <table>
                                                <tr>
                                                  <thead>
                                                    <th>#</th>
                                                    <th>Actions</th>
                                                    <th>Select</th>
                                                  </thead>
                                                </tr>
                                                <tbody id="daybefore">
                                                  </tbody>
                                                </table>
                                              </div>
                                           </div>


                                      </div>
                                  </div>
                              </div>



                              <div class="row">
                              <div class="col-md-12">
                              <div class="row">

                                      <div class="col-md-6 d-flex justify-content-around">
                                         <div id="duringexamActionTable" class ="tableCard">
                                              <h3>During Exam</h3>
                                              <table>
                                                <tr>
                                                  <thead>
                                                    <th>#</th>
                                                    <th>Actions</th>
                                                    <th>Select</th>
                                                  </thead>
                                                </tr>
                                                <tbody id="duringexam">
                                                </tbody>
                                              </table>
                                            </div>
                                        </div>

                                        </div>
                                    </div>
                              </div>

</div>
</div>   
                
<script>
    let actionData = JSON.parse($("#weeklyActionData").val());
  $(document).ready(function(){
    setup();
})

function setup(){
  console.log("test");
  createTable(actionData,"weekly");
  createTable(actionData,"monthly");
  createTable(actionData,"twoweekprior");
  createTable(actionData,"daybefore");
  createTable(actionData,"duringexam");
}

function createTable(data,id){
  $("#"+id).empty();

  j=1;
  for(let i=0;i<data.length;i++){
    if(data[i].SubjectAttribute_property==id){
      let tr = `<tr>
      <td>${j}</td>
      <td id="study${j++}" >${data[i].Question}</td>
      <td>
      <button type="button" class="btn btn-default btn-lg btn-outline-warning"  onclick="editActions(${data[i]['Q_ID']})"><i class="fa fa-edit"></i></button>
      </td>
      </tr>`;
      $("#"+id).append(tr);
    }
  }
} 


$(".close").click(function(){
                      $("#editModel").css("display","none");

                     })

function editActions(id){
  
  $("#editModel").css("display","block");
  $("#actionID").val(id);
  $("#typeOfAction").val("studyAction");
 
  
  for(let i=0;i<actionData.length;i++){
    if(actionData[i]['Q_ID']==id) {
      $("#actionName").val(actionData[i]['Question']);
    }
  }
}



</script>
