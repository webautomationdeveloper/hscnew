<div style="margin-top:10%;"></div>
<div class="container">

    <div class="d-flex justify-content-center">
        <h3>Welcome - <span style="color:green">
                <?php if (isset($_SESSION['student'])) {
                    echo $_SESSION['student'];
                }else if(isset($_SESSION['admin'])){
                   echo $_SESSION['admin'];
                }
                ?></span>
        </h3>
    </div>
</div>