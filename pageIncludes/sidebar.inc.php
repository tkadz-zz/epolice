<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="index.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->



        <?php
        if($_SESSION['role'] == 'public'){
        ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="tipOff.php">
                    <i class="ri-arrow-right-fill"></i>
                    <span>TipOff</span>
                </a>
            </li><!-- End Login Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="mostWanted.php">
                    <i class="ri-arrow-right-fill"></i>
                    <span>Most Wanted</span>
                </a>
            </li><!-- End Login Page Nav -->

                                                          <!--//admin sidebar-->
            <li class="nav-item">
                <a class="nav-link collapsed" href="crimeReports.php">
                    <i class="ri-arrow-right-fill"></i>
                    <span>CrimeReports</span>
                </a>
            </li><!-- End Login Page Nav -->
        <?php
        }
        if($_SESSION['role'] == 'admin'){
        ?>
            <!--//admin sidebar-->
            <li class="nav-item">
                <a class="nav-link collapsed" href="crimeReports.php">
                    <i class="ri-arrow-right-fill"></i>
                    <span>CrimeReports</span>
                </a>
            </li><!-- End Login Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="tipsoff.php">
                    <i class="ri-arrow-right-fill"></i>
                    <span>Tips-Off</span>
                </a>
            </li><!-- End Login Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="mostWanted.php">
                    <i class="ri-arrow-right-fill"></i>
                    <span>Most Wanted</span>
                </a>
            </li><!-- End Login Page Nav -->

        <?php
        }
        ?>

    </ul>

</aside>

<main id="main" class="main">