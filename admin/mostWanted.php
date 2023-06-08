<?php include '../pageIncludes/emptyLayoutTop.inc.php'; ?>



<br>
<br>
<div>
    <a href="addMostWanted.php" class="btn btn-outline-primary">Add Most Wanted<span class="bi bi-plus"></span></a>
</div>
<br>

<div class="row">
    <div class="col-12">
        <!-- Uncomment button below to print the system users table contents -->
        <!-- <button onclick="printDiv('printableArea')" class="btn btn-outline-dark"><i class="fa fa-print"> Print</i></button> -->
        <div id="printableArea" class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold -text-primary">View Most Wanted</h6><br>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table datatable table-hover" >
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Date Added</th>
                            <th>More</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $n = new Userview();
                        $n->viewAllMostWanted();
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../pageIncludes/emptyLayoutBottom.inc.php'; ?>


