<?php include '../pageIncludes/emptyLayoutTop.inc.php'; ?>

<nav style="--bs-breadcrumb-divider: '';">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#!">Home / </a></li>
        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
    </ol>
</nav>


<div class="row">
    <div class="col-lg-3 col-sm-6">
        <a href="#!">
            <div class="card-box bg-blue">
                <div class="inner">
                    <h3>
                        <?php
                        $query = "SELECT * FROM users";
                        $o = new DefaultView();
                        $o->CountView($query);
                        ?>
                    </h3>
                    <p> All System Users </p>
                </div>
                <div class="icon">
                    <i class="fa fa-users" aria-hidden="true"></i>
                </div>

            </div>
        </a>
    </div>

    <?php
    if($_SESSION['accessLevel'] == '1'){
    ?>
    <div class="col-lg-3 col-sm-6">
        <a href="adminAcc.php">
            <div class="card-box bg-green">
                <div class="inner">
                    <h3> <?php
                        $query = "SELECT * FROM admin";
                        $o = new DefaultView();
                        $o->CountView($query);
                        ?> </h3>
                    <p> Admin Accounts </p>
                </div>
                <div class="icon">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                </div>

            </div>
        </a>
    </div>
    <?php
    }
    ?>


    <div class="col-lg-3 col-sm-6">

        <?php
        $n = new DefaultView();
        $n->accountStatsLoop();
        ?>
    </div>

</div>




</div>




<?php include '../pageIncludes/emptyLayoutBottom.inc.php'; ?>


