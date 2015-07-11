<!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <?php
                                    $email = $_SESSION['s_email'];
                                    $default = "http://ls3.rnet.ryerson.ca/ls3-content/people/unknown.jpg";
                                    $size = 60;
                                    $grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
                                    ?>
                            <img src="<?php echo $grav_url; ?>" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, <?php echo $_SESSION['s_user']; ?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active>">  
                            <a href="index.php">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                         </li>
                        <li>
                             
                            <a href="userinfo.php">
                                <i class="fa fa-users"></i> <span>User</span> 
                            </a>
                            
                        </li>
                        <li class="treeview">
                            <a href="studentManage.php">
                                <i class="fa fa-user"></i>
                                <span>Student</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="studentManage.php"><i class="fa fa-angle-double-right"></i> Registration</a></li>
                                <li><a href="studentSearch.php"><i class="fa fa-angle-double-right"></i> Find</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> Update Semester <small class="badge pull-right bg-green">Coming</small></a></li>
                            </ul>
                        </li>
                        
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
