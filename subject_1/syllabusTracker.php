<?php
// session_start(); 

require_once('functions.php');

//here we will firstmatch session and proced further for now we are proceeding for demo

$obj = new Readactions();

$syllabustracker = $obj->syllabusTracker();

if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $userResponse = $obj->readUserReaponse($id, '4');
} else {
    $userResponse = $obj->readUserReaponse($_SESSION['UserID'], '4');
}

?>
<style>
    .flagProp {
        width: 100%;
        height: 100%;
    }
</style>

<div class="container">
    <div class="row mb-5  justify-content-center text-center" style="margin-top: 100px;">
        <div class="col-lg-12 mb-2">
            <div class="card">
                <div class="card-header">
                    Syllabus Tracker
                </div>
                <div class="card-body" style="overflow:scroll; max-height:85vh">
                    <table class="table table-striped">
                        <thead>
                            <tr>

                                <th scope="col">
                                    Topic
                                </th>

                                <th scope="col">
                                    Part
                                </th>

                                <th scope="col">
                                    Syllabus Dot Point
                                </th>

                                <th scope="col">
                                    Study Notes Completion
                                </th>

                                <th scope="col">
                                    Traffic Light Rating
                                </th>

                                <!-- <th scope="col">
                                Common Question Type
                            </th> -->

                                <th scope="col">
                                    MC
                                </th>

                                <th scope="col">
                                    SAQ
                                </th>

                                <th scope="col">
                                    Essay
                                </th>
                                <th scope="col">
                                    Priority Rating
                                </th>
                                <th scope="col">
                                    Revise
                                </th>
                                <th scope="col">
                                    SA Question
                                </th>

                                <th scope="col">
                                    SAQ Completion
                                </th>
                            </tr>
                        </thead>
                        <tbody id="essayTrackerRows">
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td id="studyCompletionProgresss">0%</td>
                                <td>
                                    <p class="flagProp" style="background-color: red;" id="colorProgress3">0%</p>
                                    <p class="flagProp" style="background-color: orange;" id="colorProgress1">0%</p>
                                    <p class="flagProp" style="background-color: green;" id="colorProgress2">0%</p>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td id="saqPrgress" style="background-color: red;">0%</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<input type="hidden" id="studyProgressCount" value=0>

<script>
    let syllabustracker = <?php echo json_encode($syllabustracker); ?>;
    let userResponse = <?php echo json_encode($userResponse); ?>;
    let redCount = 0;
    let orangeCount = 0;
    let greenCount = 0;
    let totalCount = syllabustracker.length;
  
    let saqCount = 0;

    $(document).ready(function() {
        let hrCount = [8, 10, 9, 9, 2, 2, 10, 9, 4, 8, 15, 8, 7, 7, 4, 1, 10, 9, 6, 12, 4, 4, 6]; // pointer to add horizonatal row in table
        let i = 0;
        let j = 1;
        let sectionVar = 1;

        syllabustracker.shift();

        syllabustracker.forEach(function(item) {
            studyNotesProgress(`syllabus${item.Q_ID}_A`, sectionVar);
            let tr = `<tr>
       <td>${item.topic}</td>
       <td>${item.part}</td>
       <td>${item.syllabus_point}</td>
       <?php if (isset($_SESSION['parent'])) { ?>
       <td><input type="checkbox" onclick="return false" class="onoffswitch-checkbox" id="syllabus${item.Q_ID}_A" onclick="studyNotesProgress('syllabus${item.Q_ID}_A','${sectionVar}')"></td>
                     <input type="hidden" id="currentSecValue${sectionVar}" value="0">
       
        <td><input type="checkbox" onclick="return false" class="onoffswitch-checkbox" id="syllabus${item.Q_ID}_B" onclick="studyNotesProgress('syllabus${item.Q_ID}_A','${sectionVar}')"></td>
       
       <td>

            <select style="pointer-events: none;" onclick="return false;" onkeydown="return false;" id="trafficRating${item.Q_ID}" onclick="colorCount('trafficRating${item.Q_ID}','${item.Q_ID}')" value="">
                <option value = "" >Choose Flag</option>
                <option value = "red" style="background-color:red">Red</option>
                <option value = "orange" style="background-color:orange">Orange</option>
                <option value = "green" style="background-color:green">Green</option>
             </select>

       </td>
       <?php } else { ?>
        <td><input type="checkbox"  class="onoffswitch-checkbox" id="syllabus${item.Q_ID}_A" onclick="studyNotesProgress('syllabus${item.Q_ID}_A','${sectionVar}')"></td>
       
       <td><input type="checkbox" class="onoffswitch-checkbox" id="syllabus${item.Q_ID}_B" onclick="studyNotesProgress('syllabus${item.Q_ID}_B','${sectionVar}')"></td>
      
      <td>

           <select  id="trafficRating${item.Q_ID}" onclick="colorCount('trafficRating${item.Q_ID}','${item.Q_ID}')" value="">
               <option value = "" >Choose Flag</option>
               <option value = "red" style="background-color:red">Red</option>
               <option value = "orange" style="background-color:orange">Orange</option>
               <option value = "green" style="background-color:green">Green</option>
            </select>

      </td>


    <?php } ?>
       <td>
            <span id="mc${item.Q_ID}_val"></span>
            <input type="hidden" id="mc${item.Q_ID}" >
        </td>

        <td>
            <span id="saq${item.Q_ID}_val"></span>
            <input type="hidden" id="saq${item.Q_ID}" >
        </td>

        <td>
            <span id="essay${item.Q_ID}_val"></span>
            <input type="hidden" id="essay${item.Q_ID}">
        </td>

        <td>
            <input style="width:100%;" type="text" disabled  id="priority${item.Q_ID}">
        </td>


       <td>
            <a href='${item.revise}' target='_blank'> 
                Revise
            </a>
        </td>
       <td><span id="saQuestion" >${item.sa_question}<span></td>    
       <?php if (isset($_SESSION['parent'])) { ?> 
       <td><input type="checkbox" onclick="return false" class="onoffswitch-checkbox" onclick="saqCounter('saqCompletion${item.Q_ID}')" id="saqCompletion${item.Q_ID}"></td>
     
       <?php } else { ?>
        <td><input type="checkbox" class="onoffswitch-checkbox" onclick="saqCounter('saqCompletion${item.Q_ID}')" id="saqCompletion${item.Q_ID}"></td>
       <td><button type="button" class="btn btn-success" onclick="saveSyllabusResponse('${item.Q_ID}|${item.SAL_ID}|${item.subject_id}|${sectionVar}')">Save</button></td>

        <?php } ?>
       </tr>`;

            $("#essayTrackerRows").append(tr);
            if (item.mc == '1') {
                $("#" + `mc${item.Q_ID}_val`).text('Y');
                $("#" + `mc${item.Q_ID}`).val(1);
            }

            if (item.saq == "1") {
                $("#" + `saq${item.Q_ID}_val`).text('Y');
                $("#" + `saq${item.Q_ID}`).val(1);
            }

            if (item.essay == "1") {
                $("#" + `essay${item.Q_ID}_val`).text('Y');
                $("#" + `essay${item.Q_ID}`).val(1);
            }

            if (hrCount[i] == j) {
                let tr = `<tr>
                    </tr>
                    <tr style="background:yellow";>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td id="section${sectionVar}">0%</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                    </tr>`;
                $("#essayTrackerRows").append(tr);
                i++;
                j = 0;
                sectionVar++;
            }
            j++;
        })

        if (userResponse.length > 0)
            userResponse.forEach(function(item) {
                let res = (item.response).split(",");



                if (res[1] == 'red') {
                    redCount++;
                    $("#trafficRating" + item.Q_ID).css("background", "red");
                    $("#colorProgress3").text((redCount / totalCount).toFixed(2) * 100 + "%");
                }

                if (res[1] == 'orange') {
                    orangeCount++;
                    $("#trafficRating" + item.Q_ID).css("background", "orange");
                    $("#colorProgress1").text((orangeCount / totalCount).toFixed(2) * 100 + "%");
                }

                if (res[1] == 'green') {
                    $("#trafficRating" + item.Q_ID).css("background", "green");
                    greenCount++;
                    $("#colorProgress2").text((greenCount / totalCount).toFixed(2) * 100 + "%");
                }

                if (res[6] === 'true') saqCount++;

                $("#" + `syllabus${item.Q_ID}_A`).prop('checked', res[0] === 'true');
                $("#" + `syllabus${item.Q_ID}_B`).prop('checked', res[1] === 'true');
                $("#" + `trafficRating${item.Q_ID}`).val(res[2]);
                $("#" + `mc${item.Q_ID}`).val(res[3]);
                $("#" + `saq${item.Q_ID}`).val(res[4]);
                $("#" + `essay${item.Q_ID}`).val(res[5]);
                $("#" + `priority${item.Q_ID}`).val(res[6]);
                $("#" + `saqCompletion${item.Q_ID}`).prop('checked', res[7] === 'true');
                saqCounter('saqCompletion' + item.Q_ID);
                sectionVar = res[8];
                studyNotesProgress('syllabus' + item.Q_ID + '_A', sectionVar)

            })
    });




    function studyNotesProgress(id, sectionVar) {
        console.log(sectionVar);
        let currentSectionValue = +$("#currentSecValue" + sectionVar).val();
        console.log(currentSectionValue);

        let sectionprogress = 0;
        let hrCount = [8, 10, 9, 9, 2, 2, 10, 9, 4, 8, 15, 8, 7, 7, 4, 1, 10, 9, 6, 12, 4, 4, 6]; // pointer to add horizonatal row in table

        let progresscount = $("#studyProgressCount").val();
        if ($("#" + id).is(':checked') == true) {
            sectionprogress++;
            let index = sectionVar - 1;
            let newVal = currentSectionValue + sectionprogress;
            $("#currentSecValue" + sectionVar).val(newVal);
            $("#section" + sectionVar).text((newVal / hrCount[index]).toFixed(2) * 100 + "%");
            progresscount = +progresscount + 1;
            $("#studyCompletionProgresss").text((progresscount / totalCount).toFixed(2) * 100 + "%");
            $("#studyProgressCount").val(progresscount);
        } else {
            // sectionprogress=sectionprogress>0?--sectionprogress:0;
            let index = sectionVar - 1;
            let newVal = currentSectionValue > 0 ? --currentSectionValue : 0;
            $("#currentSecValue" + sectionVar).val(newVal);
            $("#section" + sectionVar).text((newVal / hrCount[index]).toFixed(2) * 100 + "%");
            progresscount = progresscount > 0 ? +progresscount - 1 : 0;
            $("#studyCompletionProgresss").text((progresscount / totalCount).toFixed(2) * 100 + "%");
            $("#studyProgressCount").val(progresscount);
        }

    }

    function saqCounter(id) {
        if ($("#" + id).is(':checked')) {
            saqCount = +saqCount + 1;
            $("#saqPrgress").text((saqCount / totalCount).toFixed(2) * 100 + "%");
        }
    }

    function colorCount(id, rowID) {
        let colorName = $("#" + id).val();

        calculatePriority(rowID);

        if ($("#" + id).val() == "") {
            $("#" + id).css("background", "white");
        }

        if (colorName == 'red') {
            $("#" + id).css("background", "red");
            redCount++;
            $("#colorProgress3").text((redCount / totalCount).toFixed(2) * 100 + "%");
        }

        if (colorName == 'orange') {
            $("#" + id).css("background", "orange");
            orangeCount++;
            $("#colorProgress1").text((orangeCount / totalCount).toFixed(2) * 100 + "%");
        }

        if (colorName == 'green') {
            $("#" + id).css("background", "green");
            greenCount++;
            $("#colorProgress2").text((greenCount / totalCount).toFixed(2) * 100 + "%");
        }

    }






    function saveSyllabusResponse(val) {

        let id = val.split("|")[0];
        let response = $("#syllabus" + id + '_A').is(':checked') + "," +
            $("#syllabus" + id + '_B').is(':checked') + "," +
            $("#trafficRating" + id).val() + "," +
            $("#mc" + id).val() + "," +
            $("#saq" + id).val() + "," +
            $("#essay" + id).val() + "," +
            $("#priority" + id).val() + "," +
            $("#saqCompletion" + id).is(':checked');

        response = val + "|" + response;
        saveresponse(response);
    }


    function saveresponse(resp) {
       
        <?php if(isset($_REQUEST['id'])){ ?>
            let userID = <?php echo json_encode($id);?>;
       <?php } else { ?>
        let userID = <?php echo json_encode($_SESSION['UserID']);?>; 
        <?php } ?>
       
        
        let [qid, sal_ID, sub_id, sectionNum, response] = resp.split("|");
        response = response + "," + sectionNum;

        let res = "qid=" + qid + "&sal_id=" + sal_ID + "&sub_ID=" + sub_id + "&userID=" + userID + "&res=" + response;
      
        $.ajax({
            type: "POST",
            url: "../subject_1/studentHandler.php",
            data: res,
            success: function(retVal) {
             
                alert("Record saved Successfully");
            }
        });

    }


    function calculatePriority(id) {


        let colorValue = {
            "red": 3,
            "orange": 2,
            "green": 1
        }

        let point = {
            "mc": 1,
            "saq": 3,
            "essay": 5
        };

        let flagval = $("#trafficRating" + id).val();
        let colorWeight = colorValue[flagval];


        let priorityWeight = 0;

        let mc = $("#mc" + id).val();
        let saq = $("#saq" + id).val();
        let essay = $("#essay" + id).val();



        if (mc == 1) {
            priorityWeight = priorityWeight + colorWeight * point['mc'];
        }
        if (saq == 1) {
            priorityWeight = priorityWeight + colorWeight * point['saq'];
        }
        if (essay == 1) {
            priorityWeight = priorityWeight + colorWeight * point['essay'];
        }

        $("#priority" + id).val(priorityWeight);
    }
</script>