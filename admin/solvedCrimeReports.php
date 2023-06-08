<?php include '../pageIncludes/emptyLayoutTop.inc.php'; ?>




<br>
<br>

<div>
    <a href="newCrimeReport.php" class="btn btn-outline-primary">New Crime Report <span class="bi bi-plus"></span></a>
</div>
<br>
<br>


<div class="row">
    <div class="col-12">
        <!-- Uncomment button below to print the system users table contents -->
        <!-- <button onclick="printDiv('printableArea')" class="btn btn-outline-dark"><i class="fa fa-print"> Print</i></button> -->
        <div id="printableArea" class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Solved Crime Reports</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table datatable table-hover" >
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Case ID</th>
                            <th>Complaint</th>
                            <th>Suspect</th>
                            <th>Category</th>
                            <th>Case Date</th>
                            <th>Date Recorded</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $unsolved = 0;
                        $n = new Userview();
                        $n->viewAllCrimes($unsolved);
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include '../pageIncludes/emptyLayoutBottom.inc.php'; ?>


