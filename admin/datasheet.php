<style>
   /* The Modal (background) */
   .modal1 {
   display: none; /* Hidden by default */
   position: fixed; /* Stay in place */
   z-index: 1; /* Sit on top */
   left: 0;
   top: 0;
   width: 100%; /* Full width */
   height: 100%; /* Full height */
   /* overflow: auto; Enable scroll if needed */
   background-color: rgb(0,0,0); /* Fallback color */
   background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
   }
   /* Modal Content/Box */
   .modal-content12 {
   background-color: #fefefe;
   margin: 5% 23%; /* 15% from the top and centered */
   padding: 20px;
   border: 1px solid #888;
   width: 60%; /* Could be more or less, depending on screen size */
   height:84%;
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
   #flot_container{
   display:flex;
   margin-top:10px;
   }
   .child {
   width:50%;
   max-height:100%;
   overflow-y:scroll;  
   margin:5px;  
   }  
   /* add data sheets css */
   .modaladd {
   display: none; /* Hidden by default */
   position: fixed; /* Stay in place */
   z-index: 1; /* Sit on top */
   left: 0;
   top: 0;
   width: 100%; /* Full width */
   height: 100%; /* Full height */
   /* overflow: auto; Enable scroll if needed */
   background-color: rgb(0,0,0); /* Fallback color */
   background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
   }
   /* Modal Content/Box */
   .modal-content123 {
   background-color: #fefefe;
   margin: 5% 23%; /* 15% from the top and centered */
   padding: 20px;
   border: 1px solid #888;
   width: 60%; /* Could be more or less, depending on screen size */
   height:80%;
   }
</style>
<script></script>
<?php
   require_once('function.php');
   //fetch data
   $obj = new DataOfSheets();
   $datasheetsread = $obj->datasheetsread();
   
   //insert data
   if(isset($_POST["btn-add"]))
   {
       $obj = new DataOfSheets();
       $datasheetsadddata = $obj->datasheetsAdd($_POST["atar_range"],$_POST["universities"],$_POST["bonuspointprograms"],$_POST["mark"],$_POST["rankrummary"],$_POST["rank"]);
   
   }
   
   
   
   ?>
<input type="hidden" id="datasheets" value='<?php echo json_encode($datasheetsread)?>' >
<div class="app-main__outer">
<div class="app-main__inner">
   <div class="row">
      <div class="col-md-12">
         <div class="main-card mb-3 card">
            <div class="card-header">
               Data Sheets
               <div class="btn-actions-pane-right">
                  <div role="group" class="btn-group-sm btn-group">
                     <button class="btn btn-primary" onclick="adddata()">Add</button>
                  </div>
               </div>
            </div>
            <div class="table-responsive">
               <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                  <thead>
                     <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">ATAR_Range</th>
                        <th class="text-center">Universities</th>
                        <th class="text-center">Bonus_Point_Programs</th>
                        <th class="text-center">Mark</th>
                        <th class="text-center">Rank_Summary</th>
                        <th class="text-center">Rank_</th>
                        <th class="text-center">Action</th>
                     </tr>
                  </thead>
                  <tbody id="datasheetstable">
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
<div id="myModal" class="modal1" >
   <!-- Modal content -->
   <div class="modal-content12">
      <div>Edit Data Sheets<span class="close">&times;</span><br></div>
      <hr>
      <form action="edituser.php" method="POST" style="margin-top:20px" >
         <!-- hidden id & name -->
         <input type="hidden" id="datasheetsID" name="datasheetsID" >
         <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Universities</label>
            <div class="col-sm-10">
               <input type="text" class="form-control" id="universities" name="universities" placeholder="Universities" required>
            </div>
         </div>
         <!-- <input type="hidden" name="studentID" id="studentID"> -->
         <div class="form-group row">
            <label for="userPhone" class="col-sm-2 col-form-label">Bonus_Point_Programs <span class="text-danger" id="errorphone"></span></label>
            <div class="col-sm-10">
               <input type="text" class="form-control" id="bonuspointprograms" name="bonuspointprograms" placeholder="Bonus_Point_Programs" required>
            </div>
         </div>
         <div class="form-group row">
            <div class="col-sm-10">
               <input type="submit" value="update" class="btn btn-success" name="updatedatasheet-btn" id="updatedatasheet-btn">
            </div>
         </div>
         
      </form>
   </div>
</div>
<div id="myModaladd" class="modaladd" >
   <!-- Modal add new data sheets content -->
   <div class="modal-content123">
      <div>Add Data Sheets<span class="close">&times;</span><br></div>
      <hr>
      <!-- <form action="edituser.php" method="POST" style="margin-top:20px"> -->
      <form action="edituser.php" method="POST" style="margin-top:20px" id="form1">
         <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">ATAR_Range</label>
            <div class="col-sm-10">
               <input type="text" class="form-control" id="atar_rangeid" name="atar_range" placeholder="ATAR_Range"  />
            </div>
         </div>
         <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Universities</label>
            <div class="col-sm-10">
               <input type="text" class="form-control" id="universitiesid" name="universities" placeholder="Universities"  />
            </div>
         </div>
         <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Bonus_Point_Programs <span class="text-danger" id="errorphone"></span></label>
            <div class="col-sm-10">
               <input type="text" class="form-control" id="bonuspointprogramsid" name="bonuspointprograms" placeholder="Bonus_Point_Programs"/>
            </div>
         </div>
         <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Mark <span class="text-danger" id="errorphone"></span></label>
            <div class="col-sm-10">
               <input type="text" class="form-control" id="markid" name="mark" placeholder="Mark"/>
            </div>
         </div>
         <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Rank_Summary <span class="text-danger" id="errorphone"></span></label>
            <div class="col-sm-10">
               <input type="text" class="form-control" id="rankrummaryid" name="rankrummary" placeholder="Rank_Summary"/>
            </div>
         </div>
         <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Rank_ <span class="text-danger" id="errorphone"></span></label>
            <div class="col-sm-10">
               <input type="text" class="form-control" id="rankid" name="rank" placeholder="Mark"/>
            </div>
         </div>
         <div class="form-group row">
            <div class="col-sm-10">
               <!-- <button type="submit" class="btn btn-primary" name="btn-add" id="btn-add" >Add</button> -->
               <input type="submit" class="btn btn-primary" name="btn-add" id="btn-add">
            </div>
         </div>
      </form>
   </div>
</div>
<script>
   let datasheetsofalldata =JSON.parse( $("#datasheets").val() );
   // let datasheetsofalldata = <?php //echo json_encode($datasheetsread); ?>;
   //console.log(datasheetsofalldata);
   
   for(let i=0;i<datasheetsofalldata.length;i++){
   
   let tr = `<tr data-row-id="${datasheetsofalldata[i]["datasheet_id"]}">
               <td class="text-center text-muted">${i+1}</td>
               <td "text-center editable-col" contenteditable="true"  id="atar_range${datasheetsofalldata[i]["datasheet_id"]}">${datasheetsofalldata[i]["ATAR_Range"]}</td>
              
               <td class="text-center">${datasheetsofalldata[i]['Universities']}</td>
               <td class="text-center">${datasheetsofalldata[i]['Bonus_Point_Programs']}</td>
               <td class="text-center editable-col" id="Marks${datasheetsofalldata[i]["datasheet_id"]}" name="Marks" contenteditable="true" >${datasheetsofalldata[i]['Mark']}</td>
   
               <td class="text-center editable-col" id="ranks_summary${datasheetsofalldata[i]["datasheet_id"]}" contenteditable="true"  >${datasheetsofalldata[i]['Rank_Summary']}</td>
               <td "text-center editable-col" contenteditable="true"  id="ranksU${datasheetsofalldata[i]["datasheet_id"]}">${datasheetsofalldata[i]['Rank_']}</td>
            
                <td class="text-center">
                            
                <button type="button" class="btn btn-default btn-lg btn-outline-warning"  onclick="edit(${datasheetsofalldata[i]['datasheet_id']})"><i class="fa fa-edit"></i></button>  
                <button type="button" class="btn btn-default btn-lg btn-outline-danger" onclick="deletedatasheet(${datasheetsofalldata[i]['datasheet_id']})"><i class="fa fa-trash"></i></button> 
   
                </td>                 
   
               </tr>`; 
   $("#datasheetstable").append(tr);
    
   }
   
   //edit function
   $(".close").click(function(){
   $("#subjectList").css("display","none");
   $("#myModal").css("display","none");
   })
   
   function edit(datasheetsID){
   //console.log(datasheetsID);
   $("#myModal").css("display","block");
   
   datasheetsofalldata.forEach(function(item)
   {
   if(item.datasheet_id == datasheetsID)
   {
       //console.log(item);
       $("#atarrange").val(item.ATAR_Range);
       $("#universities").val(item.Universities);
       $("#bonuspointprograms").val(item.Bonus_Point_Programs);
       $("#mark").val(item.Mark);
       $("#rankrummary").val(item.Rank_Summary);
       $("#rank").val(item.Rank_);
       $("#datasheetsID").val(item.datasheet_id);//use hidden in update form
   }
   })
   
   }
   
   
   
   
   //add insert data model open
   $(".close").click(function(){
   $("#subjectList").css("display","none");
   $("#myModaladd").css("display","none");
   })
   
   function adddata(){
   console.log("runn add data sheets");
   $("#myModaladd").css("display","block");
   }
   
   
   
   
   // delete
     function deletedatasheet(DeleteID)
         {
           console.log(DeleteID);
           $.ajax({
             url:"edituser.php",
             type:"POST",
             data:{id:DeleteID},
             success:function(data)
             {
                 window.location.reload();
             }
           });
         }
   
   
      
            $('td').focusout(function() {
               let id = $(this).parent('tr').attr('data-row-id');
              console.log("tetetetete "+ $("#atar_range"+id).text());
                let A = $("#atar_range"+id).text();
   
                let b = $("#Marks"+id).text();
                let c = $("#ranks_summary"+id).text();
                let D = $("#ranksU"+id).text();
                console.log("a = "+A);
                console.log("b = "+b);
                console.log("c = "+c);
                console.log("d = "+D);
                console.log("id = "+id);
                let data = {
                    A: A,
                    b: b,
                    c: c,
                    D: D,
                    id: id,
                    
                };
               
              
                $.ajax({
                    url: "datasheetcode.php",
                    type: "POST",
                    data: JSON.stringify(data),
                    success: function(data) {
                        // alert("Add Success");
                        console.log(data);
                     
                    }
                });
            });
   
   
   
</script>