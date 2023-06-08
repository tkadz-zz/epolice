<?php include '../pageIncludes/emptyLayoutTop.inc.php'; ?>



<br>
<br>


<div class="row">
    <div class="col-12">
        <!-- Uncomment button below to print the system users table contents -->
        <!-- <button onclick="printDiv('printableArea')" class="btn btn-outline-dark"><i class="fa fa-print"> Print</i></button> -->
        <div id="printableArea" class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold -text-primary">Tips Off</h6><br>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table datatable table-hover" >
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>From</th>
                            <th>Date</th>
                            <th>Read</th>
                            <th>More</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $n = new Userview();
                        $n->viewTipsOff();
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../pageIncludes/emptyLayoutBottom.inc.php'; ?>


