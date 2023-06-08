<?php

class Pignation extends Model{

    protected function allUsersView($query){
        $defaultContr = new DefaultContr();
        $stmt = $this->con()->prepare($query);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        $s = 0;
        ?>

        <?php
        foreach ($rows as $row)
        {
            $rowsUser = $defaultContr->GetUserByID($row['userID']);

            if($rowsUser[0]['role'] == 'admin'){
                $color = '#00a65a';
            }
            else{
                $color = 'orange';
            }


            $s++;
            ?>

            <tr>
                <td><?php echo $s ?> </td>
                <td><a href="userProfile.php?userID=<?php echo $row['userID'] ?>"><?php echo $row["name"] ?></a></td>
                <td><a href="userProfile.php?userID=<?php echo $row['userID'] ?>"><?php echo $row["surname"]; ?></a></td>
                <td><span style="color: <?php echo $color ?>" class="badge bg-white rounded"><?php echo $rowsUser[0]["role"] ?></span> </td>
                <td><?php
                    if($rowsUser[0]['status'] == 1) {
                        ?>
                        <span class="badge bg-success rounded">active</span>
                        <?php
                    }
                    else{
                        ?>
                        <span class="badge bg-danger rounded">Inactive</span>
                        <?php
                    }
                    ?>

                </td>
            </tr>

            <?php
        }
    }

    protected function studentResultsView($query){
        $defaultContr = new DefaultContr();
        $userContr = new Usercontr();

        $stmt = $this->con()->prepare($query);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        $s = 0;
        foreach ($rows as $row){
            $cbhcRows = $userContr->GetCBHCResultsByUserID($row['userID']);
            $certificateResultRows = $userContr->GetCertificateResultsByUserID($row['userID']);

            $cbhcMark = 'PENDING';
            $certificateMark = 'PENDING';
            $cbhcMarkPercentage = 'PENDING';

            $cbhcMarkoutOf = 'PENDING';
            $certificateMarkoutOf = 'PENDING';
            $certificateMarkPercentage = 'PENDING';

            if(count($cbhcRows) > 0){
                $cbhcMark = $cbhcRows[0]['mark'];
                $cbhcMarkoutOf = $cbhcRows[0]['outOf'];
                $cbhcMarkPercentage = ($cbhcMark / $cbhcMarkoutOf) * 100 . '%';
            }if(count($certificateResultRows) > 0){
                $certificateMark = $certificateResultRows[0]['mark'];
                $certificateMarkoutOf = $certificateResultRows[0]['outOf'];
                $certificateMarkPercentage = ($certificateMark / $certificateMarkoutOf) * 100 . '%';
            }
            ?>
            <tr>
                <td><?php echo $s+=1 ?> </td>
                <td><a href="studentResults.php?userID=<?php echo $row['userID'] ?>"><?php echo $row["surname"]; ?></a></td>
                <td><a href="studentResults.php?userID=<?php echo $row['userID'] ?>"><?php echo $row["name"] ?></a></td>
                <td><a href="?userID=<?php echo $row['userID'] ?>"><?php echo $row["secondName"] ?></a></td>
                <td><?= $cbhcMarkPercentage ?></td>
                <td><?= $certificateMarkPercentage ?></td>
                <td></td>
                <td></td>
            </tr>
            <?php
        }
    }

    protected function actionLogView($query){
        $defaultContr = new DefaultContr();
        $stmt = $this->con()->prepare($query);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        $s = 0;
        if(count($rows) > 0){
        ?>
        <div>
            <table class="table table-responsive table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Action By</th>
                    <th>Date</th>
                    <th>Action</th>
                    <th>Agent</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($rows as $row){
                    $s+=1;
                    ?>
                    <tr>
                        <td><?= $s ?></td>
                        <td><?= $row['nameSurname'] ?></td>
                        <td><?= $defaultContr->dateTimeToDay($row['dateAdded'])  . ' ('. $defaultContr->timeAgo($row['dateAdded']) .')' ?></td>
                        <td><?= $row['action'] ?></td>
                        <td><?= $row['agent'] ?></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>

            </table>
        </div>
        <?php
        }else{
            ?>
            <div class="alert alert-warning  alert-dismissible fade show" role="alert">
                <h4 class="alert-heading">Data not found</h4>
                <hr>
                <p> No data on the action logs was found</p>

            </div>
            <?php
        }
    }


    protected function viewCLoop($query){
        $defaultContr = new DefaultContr();
        $stmt = $this->con()->prepare($query);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        if(count($rows) > 0){
            $s = 0;
            foreach ($rows as $row){
                $isUser = $defaultContr->isUser($row['userID'], 'student');
                ?>
                <?php
                if (isset($_GET['userID'])) {
                    if($s <= 0){
                    ?>
                    <h5>Showing certificates of  <?= $isUser[0]['name'] .' '. $isUser[0]['surname'] ?></h5>
                    <br>
                    <?php
                    }
                }
                if($row['source'] == ''){
                    $cl = 'danger';
                }else{
                    $cl = 'success';
                }
                ?>
                <div class="card -mb-3  border-start border-5 border-<?= $cl ?>">
                    <div class="row -g-0">

                        <div class="col-md-4">
                            <a href="certificate.php?cID=<?= $row['id'] ?>&userID=<?= $row['userID'] ?>">
                                <img src="../assets/img/docR.png" style="height: 250px" class="img-fluid rounded-start" alt="...">
                            </a>
                        </div>

                        <div class="col-md-8">
                            <div style="font-size: 15px" class="card-body">
                                <h5 class="card-title">Certificate #<?= $s+=1 ?>
                                    <?php
                                    if($_SESSION['role'] != 'student'){
                                    ?>
                                       : <span class="bx bx-user"></span>  <a href="userProfile.php?userID=<?= $row['userID'] ?>"><?= $isUser[0]['name'] .' '. $isUser[0]['surname'] ?> <span class="bx bx-arrow-to-right"></span></a>
                                        <?php
                                    }
                                    ?>
                                </h5>
                                <span class="card-title">Name: </span><span><?= $row['cName'] ?></span>
                                <br>
                                <br>
                                <?php
                                if(date('Y-m-d') <= $row['cEnded']){
                                    ?>
                                    <span class="text-info"> Acquisition in progress
                                    <div class="spinner-border spinner-border-sm" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                      </div>
                                    </span> <span> : Year <?= $defaultContr->dateToMonth($row['cEnded']) ?> <br>(<?= $defaultContr->timeTogo($row['cEnded']) ?>)</span>
                                    <?php
                                }
                                else{
                                    ?>
                                    <span class="text-success">Completed <span class="ri-check-double-fill"></span></span> <span> : <?= $defaultContr->timeAgo($row['cEnded']) ?></span>
                                    <?php
                                }
                                ?>
                                <hr>
                                <a href="certificate.php?cID=<?= $row['id'] ?>&userID=<?= $row['userID'] ?>" class="btn btn-outline-primary">View Details <span class="ri-arrow-right-circle-fill"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        }else{
            if(isset($_GET['userID'])) {
                $userID = $_GET['userID'];
                $isUser = $defaultContr->isUser($userID, 'student');
            }
            ?>
            <div class="alert alert-warning  alert-dismissible fade show" role="alert">
                <h4 class="alert-heading">No Record Found</h4>
                <?php
                if(isset($_GET['userID'])){
                ?>
                <p><?= $isUser[0]['name'] .' '. $isUser[0]['surname'] ?> has not been enrolled on any certificate program as of yet</p>
                    <?php
                }
                ?>
                    <hr>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
        }

    }



    public function paging($query,$records_per_page){
        $starting_position=0;
        if(isset($_GET["page_no"])) {
            $starting_position=($_GET["page_no"]-1)*$records_per_page;
        }
        $query2=$query." limit $starting_position,$records_per_page";
        return $query2;
    }


    public function paginationLinkNumbers($query,$records_per_page){
        $self = $_SERVER['PHP_SELF'];
        $stmt = $this->con()->prepare($query);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        $total_no_of_records = count($rows);

        $current_page = 1;
        if(isset($_GET["page_no"])) {
            $current_page=$_GET["page_no"];
        }
        $total_no_of_pages=ceil($total_no_of_records/$records_per_page);
        $numpages = $total_no_of_pages;
        $dotshow = true;

        if( $current_page == 2 || $current_page == $numpages -1 ){
            $limit = 2;
        }else if($current_page >= 3 && $current_page != $numpages ){
            $limit = 1;
        }else{
            $limit = 3;
        }

        $previous = $current_page - 1;
        $next = $current_page + 1;

        if ($numpages != 1) {
            ?>
            <div class="col-md-12 pt-3">
                <tr>
                    <td colspan="12">
                        <?php if($current_page > 1){ ?>
                            <a class="btn btn-sm" href="<?php echo $self ?>?page_no=1"><span class="fa fa-chevron-circle-left"></span> First Page</a>
                            <a class="btn btn-sm" href="<?php echo $self ?>?page_no=<?php echo $previous ?>"><span class="fa fa-reply"></span> Previous Page</a>
                        <?php } ?>

                        <?php
                        for($i=1; $i <= $numpages; $i++){
                            if ($i == 1 || $i == $numpages ||  ($i >= $current_page - $limit &&  $i <= $current_page + $limit) ) {
                                $dotshow = true;
                                if ($i != $current_page){
                                    ?>
                                    <a class="btn btn-outline-primary btn-sm" href="<?php echo $self ?>?page_no=<?php echo $i ?>"><?php echo $i ?></a>
                                    <?php
                                }else{
                                    ?>
                                    <a class="btn btn-primary btn-sm" href="<?php echo $self ?>?page_no=<?php echo $i ?>"><?php echo $i ?></a>
                                    <?php
                                }
                            }else if ( $dotshow ){
                                $dotshow = false;
                                ?>
                                ...
                                <?php
                            }
                        }

                        if($current_page < $total_no_of_pages){ ?>
                            <a class="btn btn-sm" href="<?php echo $self ?>?page_no=<?php echo $next ?>">Next Page <span class="fa fa-chevron-circle-right"></span></a>
                            <a class="btn btn-sm" href="<?php echo $self ?>?page_no=<?php echo $total_no_of_pages ?>">Last Page <span class="fa fa-angle-double-right"></span></a>
                        <?php } ?>
                    </td>
                </tr>
            </div>
            <?php
        }
    }


}