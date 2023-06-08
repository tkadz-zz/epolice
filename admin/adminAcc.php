<?php include '../pageIncludes/emptyLayoutTop.inc.php'; ?>

<nav style="--bs-breadcrumb-divider: '';">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#!">Home / </a></li>
        <li class="breadcrumb-item"><a href="#!">Admin Acc</a></li>
    </ol>
</nav>

<div>
    <a data-bs-toggle="modal" data-bs-target="#addAdminModal" href="#!" id="#!" class="btn btn-outline-primary"><span class="fa fa-user-plus"></span> Add Admin</a>
</div>

    <div class="row">


        <div class="col-lg-3 col-sm-6">
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
        </div>


    </div>

<div class="row">
    <div class="col-md-6"></div>
    <div class="s003 col-md-6 -shadow-sm">
        <form method="GET">
            <label><span class="fa fa-search"></span> Search</label>
            <div class="inner-form row">
                <div class="input-field second-wrap col-md-8">
                    <input class="form-control" <?php if(isset($_GET['search'])){?> value="<?php echo $_GET['search'] ?>" <?php } ?> id="search" pattern="[ a-zA-Z0-9]+" name="search" type="search" placeholder="Search by Name, Surname or National-ID..." />
                </div>
                <div class="input-field third-wrap col-md-4">
                    <button class="btn btn-primary" type="submit">
                        Search
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<br>


    <div class="row">
        <div class="col-12">
            <!-- Uncomment button below to print the system users table contents -->
            <!-- <button onclick="printDiv('printableArea')" class="btn btn-outline-dark"><i class="fa fa-print"> Print</i></button> -->
            <div id="printableArea" class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">System Users</h6>
                </div>
                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="table -datatable table-hover" >
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Role</th>
                                <th>status</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Role</th>
                                <th>status</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php
                            $limit = 20;
                            $n = new DefaultView();

                            if (isset($_GET['search'])) {
                                $search = $_GET['search'];
                                $query = "SELECT * FROM admin WHERE name LIKE '%$search%' OR surname LIKE '%$search%' OR nationalID LIKE '%$search%' ORDER BY id DESC";
                            } else {
                                $query = "SELECT * FROM admin  ORDER BY id DESC";
                            }
                            $n->ViewAllUsers($limit, $query);
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            </div>

        </div>


    </div>




<?php include '../pageIncludes/emptyLayoutBottom.inc.php'; ?>


