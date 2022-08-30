
<style>
.app-sidebar .scrollbar-sidebar {
    overflow: scroll !important;
}
</style>
    <form action="main.php" method="get">
                <div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                <li class="app-sidebar__heading">Dashboards</li>
                                <li>
                                    <a href="<?php echo $admin_url ?>index.php" class="mm-active">
                                        <i class="metismenu-icon pe-7s-rocket"></i>
                                        Overall
                                    </a>
                                </li>
                                <li class="app-sidebar__heading">Users</li>
                                <li>
                                    <a href="<?php echo $admin_url ?>index.php?&user=addnew">
                                        <i class="metismenu-icon pe-7s-add-user">
                                        </i>Add New
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $admin_url ?>index.php?&user=student" >
                    
                                        <i class="metismenu-icon pe-7s-users">
                                        </i>Student
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $admin_url ?>index.php?&user=parent">
                                        <i class="metismenu-icon pe-7s-user">
                                        </i>Parents
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $admin_url ?>index.php?&user=tutor">
                                        <i class="metismenu-icon pe-7s-user">
                                        </i>Tutor
                                    </a>
                                </li>
                            </ul>
                        </div>


                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                <li class="app-sidebar__heading">Subject</li>
                                <li>
                                    <a href="../subject_1_admin/ecoSubjectDesc.php?&form=study">
                                        <i class="metismenu-icon pe-7s-notebook"></i>
                                        Economics
                                    </a>
                                </li>
                            </ul>   
                        </div>    




						<div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                <li class="app-sidebar__heading">Setting</li>
                                <li>
                                    <a href="<?php echo $admin_url ?>index.php?&user=level" class="mm-active">
                                        <i class="metismenu-icon pe-7s-settings"></i>
                                        Levels
                                    </a>
                                </li>
								 <li>
                                    <a href="<?php echo $admin_url ?>index.php?&user=subject" class="mm-active">
                                        <i class="metismenu-icon pe-7s-settings"></i>
                                        Subjects
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo $admin_url ?>index.php?&user=goaldata" class="mm-active">
                                        <i class="metismenu-icon pe-7s-settings"></i>
                                        Data Sheet
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo $admin_url ?>index.php?&user=interweighting" class="mm-active">
                                        <i class="metismenu-icon pe-7s-settings"></i>
                                        Internal Weighting
                                    </a>
                                </li>
                                
                            </ul>
                        </div>

                </div>
        </form>
</div>       
                    
                    <script>
                        $(document).ready(function() {
                                    var list = $('ul li');

                                    if ($(list).has('ul')) {  
                                        list.find('ul').addClass('collapse');
                                    }

                                    $('.expand').on("click", function(e) {
                                        if ($(".showli").hasClass('collapse')) {  
                                            $(".showli").removeClass("collapse mm-collapse");
                                        }else{
                                            $(".showli").addClass("collapse mm-collapse");

                                        }
                                    });
                                    });
                    </script>