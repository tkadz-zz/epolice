<?php include '../pageIncludes/emptyLayoutTop.inc.php'; ?>
<br>
<br>


<div class="row">
    <div class="col-12">

        <!--<a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>-->
        <div id="--printableArea" class="card-box">
            <h4 class="mt-0 header-title"></h4>
            <p class="text-muted font-14 mb-3">
                All Messages History
            </p>
            <table id="datatable" class="table datatable table-bordered dt-responsive nowrap">

                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>New/Pending Messages</th>
                    <th>More</th>
                </tr>
                </thead>

                <tbody>
                <?php
                $n = new Userview();
                $n->viewAllAdminMessages('admin');
                ?>
                </tbody>


            </table>
        </div>


    </div>


</div>


<?php include '../pageIncludes/emptyLayoutBottom.inc.php'; ?>



