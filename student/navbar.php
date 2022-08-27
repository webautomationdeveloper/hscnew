<nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-between nav2">
    <div class="collapse navbar-collapse mt-3" id="navbarNav">
        <?php if (isset($_REQUEST['id']) || isset($_SESSION['admin']) || isset($_SESSION['parent'])) {
            $id = $_REQUEST['id'];
           
        ?>
        <div class="mx-5" >Student Name - <span style="color:green;"><?php echo $uname = $_REQUEST['uname'];?></span></div>
            <ul class="navbar-nav">
                <?php if (isset($_SESSION['admin'])) { ?>
                    
                <?php } else { ?>

                    <li class="nav-item active navMenu">
                        <a class="nav-link" href="index.php?&action=eco">HSC Dashboard</a>
                    </li>
                <?php } ?>

                <li class="nav-item navMenu">
                    <a class="nav-link" href="index.php?&action=essay&id=<?= $id; ?>&uname=<?= $uname; ?>">Essay Tracker</a>
                </li>

                <li class="nav-item navMenu">
                    <a class="nav-link" href="index.php?&action=roadmap&id=<?= $id; ?>&uname=<?= $uname; ?>">Roadmap</a>
                </li>

                <li class="nav-item navMenu">
                    <a class="nav-link" href="index.php?&action=syllabus&id=<?= $id; ?>&uname=<?= $uname; ?>">Syllabus Tracker</a>
                </li>

                <li class="nav-item navMenu">
                    <a class="nav-link" href="index.php?&action=study&id=<?= $id; ?>&uname=<?= $uname; ?>">Study Plan</a>
                </li>

                <li class="nav-item navMenu">
                    <a class="nav-link" href="index.php?&action=goals&id=<?= $id; ?>&uname=<?= $uname; ?>">Goals</a>
                </li>

            </ul>
        <?php } else { ?>
            <ul class="navbar-nav">

                <li class="nav-item active navMenu">
                    <a class="nav-link" href="index.php?&action=eco">HSC Dashboard</a>
                </li>

                <li class="nav-item navMenu">
                    <a class="nav-link" href="index.php?&action=essay">Essay Tracker</a>
                </li>

                <li class="nav-item navMenu">
                    <a class="nav-link" href="index.php?&action=roadmap">Roadmap</a>
                </li>

                <li class="nav-item navMenu">
                    <a class="nav-link" href="index.php?&action=syllabus">Syllabus Tracker</a>
                </li>

                <li class="nav-item navMenu">
                    <a class="nav-link" href="index.php?&action=study">Study Plan</a>
                </li>

                <li class="nav-item navMenu">
                    <a class="nav-link" href="index.php?&action=goals">Goals</a>
                </li>

            </ul>

        <?php } ?>

    </div>
</nav>