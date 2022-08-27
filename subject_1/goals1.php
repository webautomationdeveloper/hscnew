<?php
require_once('functions.php');
$obj = new GoalsAllData();
$goalsdata = $obj->goalsfetchdata();

$internalWeighting = $obj->internalweightingfetch();

if (isset($_REQUEST['id'])) {
    $studid = $_REQUEST['id'];
} else {
    $studid = $_SESSION['UserID'];
}
$studentgoalresult = $obj->studentfetchdatabyid($studid);

?>

<style>
    .heading {
        background-color: #008021b8;
        color: white;
    }

    .firstpart {
        padding: 20px;
    }

    .padding {
        padding: 10px;
        font-size: 15px;
    }

    .width {
        width: 100%;
    }

    .btnwidth {
        width: 160px;
    }

    .card1 {
        border: 1px solid #00000040;
        box-shadow: 1px 1px 25px rgba(0, 0, 0, 0.35);
        margin: 20px;

    }

    .firstvals {


        box-shadow: 1px 1px 25px rgb(0 0 0 / 5%);
        margin-top: 100px;
    }

    .card-header {
        background-color: #008021b8;
        color: white;
        font-size: 16px;
        font-weight: 600;
        text-align: center;
        padding: 5px;

    }

    .card-title {
        font-size: 14px;
        font-weight: 500;
        text-align: center;
        align-items: center;
        margin: 10px 0px 13px;
    }


    @media (min-width: 420px) and (max-width: 659px) {
        .container {
            width: 100%;
            grid-template-columns: repeat(2, 160px);
        }
    }

    @media (min-width: 660px) and (max-width: 899px) {
        .container {
            width: 100%;
            grid-template-columns: repeat(3, 160px);
        }
    }

    @media (min-width: 900px) {
        .container {
            width: 100%;
            grid-template-columns: repeat(4, 160px);
        }
    }
    .save_button{
        background-color:#008021b8;
        color:white;
        margin-left:-100px;
        margin-top: 1rem;
        
    }
</style>

<body>

    <div class="container">

        <div class="firstvals">
            <form action="#" method="POST" id="form1">
                <div class="row firstpart">

                    <div class="col-sm-4 heading media">
                        <label class="padding">Goal University Course(s) >></label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form control padding width media" name="goaluniversitycourse" id="goaluniversitycourse">
                    </div>
                    <div class="col-sm-4">
                        <a href="https://www.uac.edu.au/" type="button" class="btn padding media btnwidth" target="_blank" style="background-color: #ff7d5f; color: white;">Uni Course
                            Search
                        </a>
                    </div>



                </div>

                <div class="row firstpart">

                    <div class="col-sm-4 heading media">
                        <label class="padding">Goal University >></label>
                    </div>
                    <div class="col-sm-4">

                        <select class="form-select padding width media" aria-label="Default select example" id="universitiestable" name="universitiestable">
                            <option selected>Open this select Goal University</option>

                        </select>
                    </div>
                    <div class="col-sm-4">
                        <a href="" type="button" class="btn padding btnwidth media" target="_blank" id="unibonuspoints" name="unibonuspoints" style="background-color: #ff7d5f; color: white;">Uni
                            Bonus
                            Points
                        </a>

                    </div>



                </div>


                <div class="row firstpart">
                    <div class="col-sm-4 heading media">
                        <label class="padding">Goal ATAR >></label>
                    </div>
                    <div class="col-sm-4">

                        <select class="form-select padding width media" aria-label="Default select example" id="atar_range" name="atar_range">
                            <option value="">Open this select Goal ATAR</option>
                        </select>

                    </div>
                    <div class="col-sm-4">
                        <a href="https://www.hscninja.com/atar-calculator " type="button" class="btn padding btnwidth media" target="_blank" style="background-color: #ff7d5f; color: white;">ATAR Calculator
                        </a>
                    </div>
                </div>



                <div class="row firstpart">

                    <div class="col-sm-4 heading media">
                        <label class="padding ">Goal HSC Economics Mark >></label>
                    </div>
                    <div class="col-sm-4">
                        <select class="form-select padding width media" aria-label="Default select example" id="marktable" name="marktable" onchange="calculation()">
                            <option selected>Open this select Goal HSC Economics Mark</option>
                        </select>
                    </div>

                </div>






                <div class="row firstpart">

                    <div class="col-sm-4 heading media">
                        <label class="padding">Goal Rank >></label>
                    </div>
                    <div class="col-sm-4">
                        <select class="form-select padding width media" aria-label="Default select example" id="ranktable" name="ranktable" onchange="calculation()">
                            <option selected>Open this select Goal Rank</option>
                        </select>
                    </div>

                </div>
        </div>


        <div class="firstvals">
            <div class="row">
                <div class="col-sm-6"></div>
                <div class="col-sm-4"></div>
                <div class="col-sm-2 justify-content-end ml-5">
                <?php if (!isset($_SESSION['parent'])) { ?>
                    <button type="button" class="btn save_button" style="background-color:#008021b8;color:white;margin-left:100px" id="submit_button">SAVE</button>
                <?php } ?>
                <!-- <input type="submit" class="btn btn-primary" id="update-btn" name="update-btn" value="update"> -->
                </div>
            </div>
            <table class="table table-striped" style="margin-top: 30px;;">
                <thead>
                    <tr style="background-color: #008021b8; color: white;">
                        <th scope="col">Assessment</th>
                        <th scope="col">#1</th>
                        <th scope="col">#2</th>
                        <th scope="col">#3</th>
                        <th scope="col">HSC Trials</th>
                        <th scope="col">Current Mark</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Mark</td>
                        <td> <select class="form-select padding" aria-label="Default select example" value=0 onchange="calculation()" name="mark1" id="mark1">
                                <option selected value=0> Select Mark</option>
                            </select></td>
                        <td> <select class="form-select padding" aria-label="Default select example" value=0 onchange="calculation()" name="mark2" id="mark2">
                                <option selected value=0>Select Mark</option>
                            </select></td>
                        <td> <select class="form-select padding" aria-label="Default select example" value=0 onchange="calculation()" name="mark3" id="mark3">
                                <option selected value=0>Select Mark</option>
                            </select></td>
                        <td> <select class="form-select padding" aria-label="Default select example" value=0 onchange="calculation()" name="mark4" id="mark4">
                                <option selected value=0>Select Mark</option>

                            </select></td>
                        <td id="markTotal" value="0">0%</td>

                        <input type="hidden" id="mval1" value=0 />
                        <input type="hidden" id="mval2" value=0 />
                        <input type="hidden" id="mval3" value=0 />
                        <input type="hidden" id="mval4" value=0 />



                    </tr>


                    <tr>
                        <td>Rank</td>
                        <td> <select class="form-select padding" aria-label="Default select example" value=0 id="rank1" name="rank1" onchange="calculation()">
                                <option selected value=0>Select Rank</option>
                            </select></td>
                        <td> <select class="form-select padding" aria-label="Default select example" value=0 id="rank2" name="rank2" onchange="calculation()">
                                <option selected value=0>Select Rank</option>
                            </select></td>
                        <td> <select class="form-select padding" aria-label="Default select example" value=0 id="rank3" name="rank3" onchange="calculation()">
                                <option selected value=0>Select Rank</option>
                            </select></td>
                        <td> <select class="form-select padding" aria-label="Default select example" value=0 id="rank4" name="rank4" onchange="calculation()">
                                <option selected value=0>Select Rank</option>
                            </select></td>
                        <td id="TotalRank">0</td>

                        <input type="hidden" id="rval1" value=0 />
                        <input type="hidden" id="rval2" value=0 />
                        <input type="hidden" id="rval3" value=0 />
                        <input type="hidden" id="rval4" value=0 />
                    </tr>

                    <tr>
                        <td>Internal Weighting</td>
                        <td> <select class="form-select padding" aria-label="Default select example" id="InternalWeighting1" name="InternalWeighting1" onchange="calculation()">
                                <option selected value=0 id="rankfirst">Select Intern Weight</option>
                            </select></td>
                        <td> <select class="form-select padding" aria-label="Default select example" id="InternalWeighting2" name="InternalWeighting2" onchange="calculation()">
                                <option selected value=0>Select Intern Weight</option>
                            </select></td>
                        <td> <select class="form-select padding" aria-label="Default select example" id="InternalWeighting3" name="InternalWeighting3" onchange="calculation()">
                                <option selected value=0>Select Intern Weight</option>
                            </select></td>
                        <td> <select class="form-select padding" aria-label="Default select example" id="InternalWeighting4" name="InternalWeighting4" onchange="calculation()">
                                <option selected value=0>Select Intern Weight</option>
                            </select></td>
                        <td id="InternalWeighting5">0</td>
                    </tr>

                    <tr>
                        <td>Overrall Weighting</td>
                        <td id="internalVal1" name="internalVal1"> 0</td>
                        <td id="internalVal2" name="internalVal2"> 0</td>
                        <td id="internalVal3" name="internalVal3"> 0</td>
                        <td id="internalVal4" name="internalVal4"> 0</td>
                        <td id="internalTotal" name="internalTotal"> 0</td>

                        <!-- <input type="hidden" id="internalVal1" name="internalVal1">
                        <input type="hidden" id="internalVal2" name="internalVal2">
                        <input type="hidden" id="internalVal3" name="internalVal3">
                        <input type="hidden" id="internalVal4" name="internalVal4">
                        <input type="hidden" id="internalTotal" name="internalTotal"> -->

                        <!-- <input type="hidden" id="value1" value=0 />
                        <input type="hidden" id="value2" value=0 />
                        <input type="hidden" id="value3" value=0 />
                        <input type="hidden" id="value4" value=0 /> -->


                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="background-color: #008021b8; color: white;">Current Total Internal Marks</td>
                    </tr>

                    <tr>
                        <td>Weighted Mark</td>
                        <td id="weightedmark1" name="weightedmark1">0</td>
                        <td id="weightedmark2" name="weightedmark2">0</td>
                        <td id="weightedmark3" name="weightedmark3">0</td>
                        <td id="weightedmark4" name="weightedmark4">0</td>
                        <td id="weightedmark5" name="weightedmark5">0</td>
                    </tr>
                    <tr>
                        <td>Weighted %</td>
                        <td id="weighted1" name="weighted1">0%</td>
                        <td id="weighted2" name="weighted2">0%</td>
                        <td id="weighted3" name="weighted3">0%</td>
                        <td id="weighted4" name="weighted4">0%</td>
                        <td id="weightedtotalall" name="weightedtotalall">0%</td>

                        <input type="hidden" id="w1" value=0 />
                        <input type="hidden" id="w2" value=0 />
                        <input type="hidden" id="w3" value=0 />
                        <input type="hidden" id="w4" value=0 />

                    </tr>



                </tbody>
            </table>
        </div>

        <div class="firstvals">
            <div class="row firstpart">

                <div class="col-sm-4">
                    <table class="table table-striped" style="margin-top: 30px;;">
                        <thead>
                            <tr style="background-color: #008021b8; color: white;">
                                <th scope="col">Remaining Internal Marks Left</th>
                                <th scope="col">Total Remaining HSC Marks Left
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="rimleft1" name="rimleft1">.0</td>
                                <td id="hscmarksleftid" name="hscmarksleftid">23</td>
                                <input type="hidden" value=50 id="fiftyvalue">
                            </tr>
                        </tbody>
                    </table>

                </div>
                <div class="col-sm-4">
                    <table class="table table-striped" style="margin-top: 30px;;">
                        <thead>
                            <tr style="background-color: #008021b8; color: white;">
                                <th scope="col">Goal Mark
                                </th>
                                <th scope="col">Current Weighted Average Mark
                                </th>
                                <th>Gap</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="economicmarkid" name="economicmarkid">0%</td>
                                <td id="cwamark" name="cwamark">0%</td>
                                <td id="gapid" name="gapid">0</td>


                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-4">
                    <table class="table table-striped" style="margin-top: 30px;;">
                        <thead>
                            <tr style="background-color: #008021b8; color: white;">
                                <th scope="col">Goal Rank
                                </th>
                                <th scope="col">Current Rank
                                </th>
                                <th>
                                    Gap
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="goalrankid" name="goalrankid">0</td>
                                <td id="currentrankid" name="currentrankid">0</td>
                                <td id="gapid2" name="gapid2">0</td>
                            </tr>
                        </tbody>

                    </table>

                </div>
                <!--div>
                    <?php /*if (!isset($_SESSION['parent'])) { ?>
                        <button type="button" class="btn " style="background-color:#008021b8;color:white;" id="submit_button" style="width:100px">SAVE</button>
                    <?php }*/ ?>
                     <input type="submit" class="btn btn-primary" id="update-btn" name="update-btn" value="update">

                </div-->

            </div>
        </div>

        <div class="row" style="align-items: center; margin-top: 50px;">
            <div class="col-sm-6">
                <!-- graph -->
                <div id="container" style="width: 100%;">

                    <div id="myChart" style="width:100%; max-width:600px; height:500px;"></div>


                </div>
            </div>
            <div class="col-sm-6">
                <!-- graph -->
                <div id="container" style="width: 100%;">
                    <div id="myChart2" style="width:100%; max-width:600px; height:500px;"></div>
                </div>
            </div>
        </div>



    </div>
    </div>
    </form>
    <script>
        $(document).ready(function() {
            let datasheetData = <?php echo json_encode($goalsdata); ?>;
            let internalWeighting = <?php echo json_encode($internalWeighting); ?>;
            assignData(datasheetData);
            assignInternalWeighting(internalWeighting);
            drawGraph([0, 0, 0, 0], 0, "myChart");
            drawGraph([0, 0, 0, 0], 0, "myChart2");
            let studentdata = <?php echo json_encode($studentgoalresult); ?>;
            if (studentdata.length > 0) {
                studentdata.forEach(function(item) {
                    $('#goaluniversitycourse').val(item.university_course);
                    $('#atar_range').val(item.atar);
                    $('#marktable').val(item.economic_marks);
                    $('#ranktable').val(item.rank_);
                    $('#mark1').val(item.Mark1);
                    $('#mark2').val(item.Mark2);
                    $('#mark3').val(item.Mark3);
                    $('#mark4').val(item.Mark_hsc_trials);
                    $('#rank1').val(item.rank1);
                    $('#rank2').val(item.rank2);
                    $('#rank3').val(item.rank3);
                    $('#rank4').val(item.rank_hsc_trials);
                    $('#InternalWeighting1').val(item.Internal_Weighting1);
                    $('#InternalWeighting2').val(item.Internal_Weighting2);
                    $('#InternalWeighting3').val(item.Internal_Weighting3);
                    $('#InternalWeighting4').val(item.Internal_Weighting_hsc_trials);
                    $('#internalVal1').val(item.Overall_Weighting1);
                    $('#internalVal2').val(item.Overall_Weighting2);
                    $('#internalVal3').val(item.Overall_Weighting3);
                    $('#internalVal4').val(item.Overall_Weighting_hsc_trials);
                    calculation();
                });
            }



        })

        function assignInternalWeighting(internalWeighting) {
            internalWeighting.forEach(function(item) {
                let opt = `<option value=${item.value}>${item.value}</option>`;
                $("#InternalWeighting1").append(opt);
                $("#InternalWeighting2").append(opt);
                $("#InternalWeighting3").append(opt);
                $("#InternalWeighting4").append(opt);
            })
        }


        function assignData(datasheetData) {
            datasheetData.forEach(function(item) {
                let uniOption = `<option value="${item.Universities+"__"+item.Bonus_Point_Programs}" >${item.Universities}</option>`;
                let goalAtrOption = `<option value="${item.ATAR_Range}">${item.ATAR_Range}</option>`;

                let mark = item.Mark.trim();

                let ecoMarkOption = "";
                if (mark.length > 0 && mark != "$mark")
                    ecoMarkOption = `<option value="${item.Mark}">${item.Mark} </option>`;
                let rankOption = "";

                let rank = item.Rank_.trim();

                if (rank.length > 0 && rank != "$rank")
                    rankOption = `<option value="${item.Rank_}">${item.Rank_}</option>`;
                $("#universitiestable").append(uniOption);
                $("#atar_range").append(goalAtrOption);
                $("#marktable").append(ecoMarkOption);
                $("#ranktable").append(rankOption);
                $("#mark1").append(ecoMarkOption);
                $("#mark2").append(ecoMarkOption);
                $("#mark3").append(ecoMarkOption);
                $("#mark4").append(ecoMarkOption);
                $("#rank1").append(rankOption);
                $("#rank2").append(rankOption);
                $("#rank3").append(rankOption);
                $("#rank4").append(rankOption);
            })
        }


        $("#universitiestable").change(function() {
            let val = $(this).val();
            let url = val.split("__")[1];
            console.log(url);
            $("#unibonuspoints").attr("href", url);
        });

        function calculation() {
            let mark1 = $("#mark1").val();
            let mark2 = $("#mark2").val();
            let mark3 = $("#mark3").val();
            let mark4 = $("#mark4").val();

            let rank1 = $("#rank1").val();
            let rank2 = $("#rank2").val();
            let rank3 = $("#rank3").val();
            let rank4 = $("#rank4").val();

            let internal1 = $("#InternalWeighting1").val();
            let internal2 = $("#InternalWeighting2").val();
            let internal3 = $("#InternalWeighting3").val();
            let internal4 = $("#InternalWeighting4").val();

            let val = [(+mark1.split("%")[0]), (+mark2.split("%")[0]), (+mark3.split("%")[0]), (+mark4.split("%")[0])];
            let markLimit = +$("#marktable").val().split("%")[0];
            console.log(markLimit);
            drawGraph(val, markLimit, "myChart");

            let markAvg = ((+mark1.split("%")[0]) + (+mark2.split("%")[0]) + (+mark3.split("%")[0]) + (+mark4.split("%")[0])) / 4;
            $("#markTotal").text(markAvg + "%");

            let val1 = [(+rank1), (+rank2), (+rank3), (+rank4)];
            let markLimit1 = +$("#ranktable").val();
            drawGraph(val1, markLimit1, "myChart2");

            let rankAvg = ((+rank1) + (+rank2) + (+rank3) + (+rank4)) / 4;

            $("#TotalRank").text(rankAvg);

            let internalAvg = ((+internal1) + (+internal2) + (+internal3) + (+internal4)) / 4;
            $("#InternalWeighting5").text(internalAvg);

            let overall1 = 0;
            let overall2 = 0;
            let overall3 = 0;
            let overall4 = 0;



            if (internal1 != 0) {
                overall1 = (+internal1) / 2;
                $("#internalVal1").text((+internal1) / 2)
            }
            if (internal2 != 0) {
                overall2 = (+internal2) / 2;
                $("#internalVal2").text((+internal2) / 2)
            }
            if (internal3 != 0) {
                overall3 = (+internal3) / 2;
                $("#internalVal3").text((+internal3) / 2)
            }
            if (internal4 != 0) {
                overall4 = (+internal4) / 2;
                $("#internalVal4").text((+internal4) / 2)
            }

            let totalInternalAvg = (((+internal1) / 2) + ((+internal2) / 2) + ((+internal3) / 2) + ((+internal4) / 2));
            $("#internalTotal").text(totalInternalAvg);

            let weightedmark1 = +(+mark1.split("%")[0] * overall1) / 100;
            let weightedmark2 = +(+mark2.split("%")[0] * overall2) / 100;
            let weightedmark3 = +(+mark3.split("%")[0] * overall3) / 100;
            let weightedmark4 = +(+mark4.split("%")[0] * overall4) / 100;

            $("#weightedmark1").text(weightedmark1);
            $("#weightedmark2").text(weightedmark2);
            $("#weightedmark3").text(weightedmark3);
            $("#weightedmark4").text(weightedmark4);



            let weightedAvg = (weightedmark1 + weightedmark2 + weightedmark3 + weightedmark4);
            $("#weightedmark5").text(weightedAvg);


            let weighted1 = isNaN(weightedmark1 / overall1) ? 0 : weightedmark1 / overall1;
            let weighted2 = isNaN(weightedmark2 / overall2) ? 0 : weightedmark2 / overall2;
            let weighted3 = isNaN(weightedmark3 / overall3) ? 0 : weightedmark3 / overall3;
            let weighted4 = isNaN(weightedmark4 / overall4) ? 0 : weightedmark4 / overall4;


            $("#weighted1").text(weighted1 * 100 + "%");
            $("#weighted2").text(weighted2 * 100 + "%");
            $("#weighted3").text(weighted3 * 100 + "%");
            $("#weighted4").text(weighted4 * 100 + "%");
            let totalWeightedAvg = (weightedAvg / (((overall1 + overall2 + overall3 + overall4))).toFixed(2) * 100);
            $("#weightedtotalall").text(totalWeightedAvg + "%");

            $("#rimleft1").text(overall4);
            $("#hscmarksleftid").text(50 + overall4);
            $("#economicmarkid").text(markLimit.toFixed(2));
            $("#cwamark").text(totalWeightedAvg.toFixed(2));
            $("#gapid").text((markLimit - totalWeightedAvg).toFixed(2));

            $("#goalrankid").text(markLimit1);
            $("#currentrankid").text(rankAvg);
            $("#gapid2").text(markLimit1 - rankAvg);

        }


        function drawGraph(val, markLimit, id) {

            console.log(val, markLimit, id);
            google.charts.load('current', {
                'packages': ['corechart']
            });

            google.charts.setOnLoadCallback(drawChart);

            google.charts.load('current', {
                'packages': ['corechart']
            });


            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Contry', 'Mark', 'Goal'],
                    ['#1', val[0], markLimit],
                    ['#2', val[1], markLimit],
                    ['#3', val[2], markLimit],
                    ['HSC Trails', val[3], markLimit],
                ]);

                var options = {
                    title: 'Goal Mark vs Actual Assessment Results'
                };

                var chart = new google.visualization.LineChart(document.getElementById(id));
                chart.draw(data, options);
            }
        }


        $('#submit_button').click(function() {

            let a = $('#goaluniversitycourse').val();
            let b = $('#atar_range').val();
            let c = $('#marktable').val();
            let d = $('#ranktable').val();
            let ee = $('#mark1').val();
            let f = $('#mark2').val();
            let g = $('#mark3').val();
            let h = $('#mark4').val();
            let i = $('#rank1').val();
            let j = $('#rank2').val();
            let k = $('#rank3').val();
            let l = $('#rank4').val();
            let m = $('#InternalWeighting1').val();
            let n = $('#InternalWeighting2').val();
            let o = $('#InternalWeighting3').val();
            let p = $('#InternalWeighting4').val();
            let q = $('#internalVal1').text();
            let r = $('#internalVal2').text();
            let s = $('#internalVal3').text();
            let t = $('#internalVal4').text();
            let u = $("#universitiestable").val();
            let v = $("#unibonuspoints").prop('href');
            let uid = <?php echo $studid; ?>;

            let data = {
                a: a,
                b: b,
                c: c,
                d: d,
                e: ee,
                f: f,
                g: g,
                h: h,
                i: i,
                j: j,
                k: k,
                l: l,
                m: m,
                n: n,
                o: o,
                p: p,
                q: q,
                r: r,
                s: s,
                t: t,
                u: u,
                v: v,
                uid: uid,
            };

            console.log(data);

            $.ajax({
                type: "POST",
                url: "../student/edituser.php",
                data: JSON.stringify(data),
                success: function(data) {
                    alert("Add Successfull");
                    console.log(data);
                }
            });

        });



        $("#submit_button").on("click", function() {
            //$a
        });
    </script>