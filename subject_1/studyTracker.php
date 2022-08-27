<?php
// session_start(); 

require_once('functions.php');

//here we will firstmatch session and proced further for now we are proceeding for demo

$obj = new Readactions();
$studyData  = $obj->studyplan();
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $userResponse = $obj->readUserReaponse($id, '1');
} else {
    $userResponse = $obj->readUserReaponse($_SESSION['UserID'], '1');
}


?>

<div>

    <div class="container">
        <div class="row mb-5  justify-content-center text-center" style="margin-top: 100px;">
            <div class="col-lg-6 mb-2">
                <div class="card">
                    <div class="card-header">
                        Weekly
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>


                                    <th scope="col">
                                        Study Action
                                    </th>

                                    <th scope="col">

                                    </th>

                                </tr>
                            </thead>
                            <tbody id="weeklyActions">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="col-lg-6 mb-2">
                <div class="card">
                    <div class="card-header">
                        Monthly
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>


                                    <th scope="col">
                                        Study Action
                                    </th>

                                    <th scope="col">

                                    </th>

                                </tr>
                            </thead>
                            <tbody id="monthlyActions">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="row mb-5  justify-content-center text-center" style="margin-top: 100px;">
            <div class="col-lg-6 mb-2">
                <div class="card">
                    <div class="card-header">
                        2 week prior
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>


                                    <th scope="col">
                                        Study Action
                                    </th>

                                    <th scope="col">

                                    </th>

                                </tr>
                            </thead>
                            <tbody id="twoWeekActions">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="col-lg-6 mb-2">
                <div class="card">
                    <div class="card-header">
                        Day Before
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>


                                    <th scope="col">
                                        Study Action
                                    </th>

                                    <th scope="col">

                                    </th>

                                </tr>
                            </thead>
                            <tbody id="dayBeforeActions">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="row mb-5  justify-content-center text-center" style="margin-top: 100px;">

            <div class="col-lg-6 mb-2">
                <div class="card">
                    <div class="card-header">
                        During Exam
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>


                                    <th scope="col">
                                        Study Action
                                    </th>

                                    <th scope="col">

                                    </th>

                                </tr>
                            </thead>
                            <tbody id="duringExamActions">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            createTable()
        });


        function createTable() {
            let idChecker = {
                'weekly': 'weeklyActions',
                'monthly': 'monthlyActions',
                'twoweekprior': 'twoWeekActions',
                'daybefore': 'dayBeforeActions',
                'duringexam': 'duringExamActions'
            }
            let essayRow = <?php echo json_encode($studyData); ?>;
            let userResponse = <?php echo json_encode($userResponse); ?>;
            console.log(userResponse);
            let i = 1;
            essayRow.forEach(function(item) {
                let id = idChecker[item.SubjectAttribute_property];
                let tr = `<tr>
      
       <td>${item.Question}</td>
       <?php if (isset($_SESSION['parent'])) { ?>
       <td><input type="checkbox" onclick="return false" class="onoffswitch-checkbox" id="actions${item.Q_ID}" onclick="saveStudyresponse(this.checked,'${item.Q_ID}|${item.SAL_ID}|${item.subject_ID}')"></td>
       <?php } else { ?>
        <td><input type="checkbox" class="onoffswitch-checkbox" id="actions${item.Q_ID}" onclick="saveStudyresponse(this.checked,'${item.Q_ID}|${item.SAL_ID}|${item.subject_ID}')"></td>
        <?php } ?>
       </tr>`;
                $("#" + id).append(tr);
            })

            if (userResponse.length > 0) {
                userResponse.forEach(function(e) {
                    let id = "actions" + e.Q_ID;
                    $("#" + id).prop('checked', e.response);
                })
            }
        }

        function saveStudyresponse(response, parameter) {
            <?php if (isset($_REQUEST['id'])) { ?>
                let userID = <?php echo json_encode($id); ?>;
            <?php } else { ?>
                let userID = <?php echo json_encode($_SESSION['UserID']); ?>;

            <?php } ?>

            let [qid, sal_ID, sub_id] = parameter.split("|");


            let res = "qid=" + qid + "&sal_id=" + sal_ID + "&sub_ID=" + sub_id + "&userID=" + userID + "&res=" + response;
            console.log(res);
            $.ajax({
                type: "POST",
                url: "../subject_1/studentHandler.php",
                data: res,
                success: function(retVal) {
                    console.log(retVal);
                }
            });

        }
    </script>