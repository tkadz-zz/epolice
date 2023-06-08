<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
            <img src="../assets/img/logo.png" alt="">
            <span class="d-none d-lg-block"><?php
                $n = new DefaultView();
                $n->viewWebShortName();
                ?></span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <!--<div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
            <input type="text" name="query" placeholder="Search" title="Enter search keyword">
            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
    </div>-->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <!--<li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li>-->

            <li class="nav-item dropdown">

                <!--<a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-bell"></i>
                    <span class="badge bg-primary badge-number">4</span>
                </a>-->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                    <li class="dropdown-header">
                        You have 4 new notifications
                        <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="notification-item">
                        <i class="bi bi-exclamation-circle text-warning"></i>
                        <div>
                            <h4>Lorem Ipsum</h4>
                            <p>Quae dolorem earum veritatis oditseno</p>
                            <p>30 min. ago</p>
                        </div>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="notification-item">
                        <i class="bi bi-x-circle text-danger"></i>
                        <div>
                            <h4>Atque rerum nesciunt</h4>
                            <p>Quae dolorem earum veritatis oditseno</p>
                            <p>1 hr. ago</p>
                        </div>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="notification-item">
                        <i class="bi bi-check-circle text-success"></i>
                        <div>
                            <h4>Sit rerum fuga</h4>
                            <p>Quae dolorem earum veritatis oditseno</p>
                            <p>2 hrs. ago</p>
                        </div>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="notification-item">
                        <i class="bi bi-info-circle text-primary"></i>
                        <div>
                            <h4>Dicta reprehenderit</h4>
                            <p>Quae dolorem earum veritatis oditseno</p>
                            <p>4 hrs. ago</p>
                        </div>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li class="dropdown-footer">
                        <a href="#">Show all notifications</a>
                    </li>

                </ul><!-- End Notification Dropdown Items -->

            </li><!-- End Notification Nav -->

            <?php
            if($_SESSION['role'] == 'admin'){
            ?>
                <?php
                $defContr = new Usercontr();
                $msgCount = $defContr->GetActiveAdminMail($_SESSION['id']);
                ?>
                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-chat-left-text"></i>
                        <?php
                        if(count($msgCount) > 0){
                            ?>
                            <span style="font-size: 12px" class="count badge bg-danger"><?= count($msgCount); ?></span>
                            <?php
                        }
                        ?>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                        <li class="dropdown-header">
                            You have <?= count($msgCount); ?> new messages
                            <!--<a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>-->
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <?php
                        $newUserv = new Userview();
                        $newUserv->viewMsgNavCountLoop($_SESSION['id']);
                        ?>

                        <li class="dropdown-footer">
                            <a href="allmessages.php">Show all messages</a>
                        </li>

                    </ul><!-- End Messages Dropdown Items -->

                </li><!-- End Messages Nav -->
            <?php
            }
            ?>


            <?php
            if($_SESSION['role'] == 'public'){
            ?>

            <?php
            $defContr = new Usercontr();
            $msgCount = $defContr->GetActiveUserMail($_SESSION['id']);
            ?>
            <li class="nav-item dropdown">

                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-chat-left-text"></i>
                    <?php
                    if(count($msgCount) > 0){
                        ?>
                        <span style="font-size: 12px" class="count badge bg-danger"><?= count($msgCount); ?></span>
                        <?php
                    }
                    ?>
                </a>

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                    <li class="dropdown-header">
                        You have <?= count($msgCount); ?> new messages
                        <a href="allmessages.php"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>


                    <li class="dropdown-footer">
                        <a href="allmessages.php">Show all messages</a>
                    </li>

                </ul><!-- End Messages Dropdown Items -->

            </li><!-- End Messages Nav -->

            <?php
            }
            ?>

            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <?php
                    $width = '';
                    $n = new DefaultView();
                    $n->viewAvatar($_SESSION['id'], $width);
                    ?>
                    <span class="d-none d-md-block dropdown-toggle ps-2"><?= $_SESSION['surname'] ?></span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6><?= $_SESSION['name'] .' '. $_SESSION['surname'] ?></h6>
                        <span><?= $_SESSION['role'] ?> account</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="profile.php">
                            <i class="bi bi-person"></i>
                            <span>My Profile</span>
                        </a>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <?php
                    if($_SESSION['role'] == 'admin' AND $_SESSION['accessLevel'] == 1){
                    ?>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="webSettings.php">
                            <i class="bi bi-gear"></i>
                            <span>Web Settings</span>
                        </a>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <?php
                    }
                    ?>

                    <?php
                    if($_SESSION['role'] == 'student'){
                        ?>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="results.php">
                                <i class="bi bi-paperclip"></i>
                                <span>Results</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="payments.php">
                                <i class="bi bi-currency-dollar"></i>
                                <span>Payments</span>
                            </a>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <?php
                    }
                    ?>



                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="?logout=true">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                        </a>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->