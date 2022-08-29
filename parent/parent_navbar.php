<nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-between">
                  <div class="collapse navbar-collapse nav2">
                      <ul class="navbar-nav">
                       <?php if(isset($_REQUEST['id'])){
                        $id = base64_decode($_REQUEST['id']);
                        $name = $_REQUEST['uname'];
                       }?>

                        <li class="nav-item navMenu menu1">
                            <a class="nav-link" href="index.php?&action=parenthscdash&id=<?php echo $id;?>">Hsc Dashboard</a>
                        </li>

                        <li class="nav-item navMenu menu1">
                            <a class="nav-link" href="index.php?&action=essay&id=<?php echo $id;?>">Essay Tracker</a>
                        </li>

                        <li class="nav-item navMenu menu1">
                            <a class="nav-link" href="index.php?&action=roadmap&id=<?php echo $id;?>">Roadmap</a>
                        </li>

                        <li class="nav-item navMenu menu1">
                            <a class="nav-link" href="index.php?&action=syllabus&id=<?php echo $id;?>">Syllabus Tracker</a>
                        </li>

                        <li class="nav-item navMenu menu1">
                            <a class="nav-link" href="index.php?&action=study&id=<?php echo $id;?>">Study Plan</a>
                        </li>

                        <li class="nav-item navMenu menu1">
                            <a class="nav-link" href="index.php?&action=goals&id=<?php echo $id;?>">Goals</a>
                        </li>
                        
                      </ul>
                        <div class="nav-item navMenu username"><?php //echo "Name:- ".$_SESSION["student"]?></div>
                    </div>

              </nav>