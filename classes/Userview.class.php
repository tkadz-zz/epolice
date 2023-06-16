<?php

class Userview extends Model {

    public function viewNewCrimeReportForm($id){
        $defaultContr = new DefaultContr();
        $userRows = $defaultContr->GetUserByID($id);
        if($userRows[0]['role'] == 'public'){
            $isUser = $defaultContr->isUser($userRows[0]['id'], $userRows[0]['role']);
            $nationalID = $isUser[0]['nationalID'];
            $name = $isUser[0]['name'];
            $surname = $isUser[0]['surname'];
        }
        ?>
        <br>
        <br>

        <div class="card">
            <div class="card-body"><br>
                <h4>New Case Recording Form</h4>
                <hr>
                <form class="needs-validation" method="POST" action="../includes/insert.inc.php" novalidate>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Complaint Details</h5>
                            <br>
                            <div class="row pb-4">

                                <input type="text" name="userID" value="<?= $_SESSION['id'] ?>" hidden>

                                <div class="col-6">
                                    <label for="yourLoginID" class="form-label">Complaint Nation-ID</label>
                                    <div class="input-group has-validation">
                                        <input type="text" value="<?php if(isset($nationalID)){ echo $nationalID; } ?>" name="cNationalID" class="form-control" id="yourLoginID" placeholder="Complaint ID..." required>
                                        <div class="invalid-feedback">Please Enter Complaint Nation-ID.</div>
                                    </div>
                                </div>

                            </div>
                            <div class="row pb-4">
                                <div class="col-6">
                                    <label for="yourLoginID" class="form-label">Complaint Name</label>
                                    <div class="input-group has-validation">
                                        <input type="text" value="<?php if(isset($name)){ echo $name; } ?>" name="cName" class="form-control" id="yourLoginID" placeholder="Complaint Name..." required>
                                        <div class="invalid-feedback">Please Enter Complaint Name.</div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="yourLoginID" class="form-label">Complaint Surname</label>
                                    <div class="input-group has-validation">
                                        <input type="text" value="<?php if(isset($surname)){ echo $surname; } ?>" name="cSurname" class="form-control" id="yourLoginID" placeholder="Complaint Surname..." required>
                                        <div class="invalid-feedback">Please Enter Complaint Surname.</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row pb-4">
                                <div class="col-6">
                                    <label for="yourLoginID" class="form-label">Complaint Gender</label>
                                    <div class="input-group has-validation">
                                        <select name="cGender" class="form-control form-select" required>
                                            <option value="">-- Complaint Gender --</option>
                                            <option value="MALE"> Male </option>
                                            <option value="FEMALE"> Female </option>
                                        </select>
                                        <div class="invalid-feedback">Please Enter Complaint Gender.</div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label for="yourLoginID" class="form-label">Complaint DOB</label>
                                    <div class="input-group has-validation">
                                        <input type="date" max="<?= date('Y-m-d') ?>" name="cdob" class="form-control" id="yourLoginID" placeholder="Complaint DOB..." required>
                                        <div class="invalid-feedback">Please Enter Complaint DOB.</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row pb-4">
                                <div class="col-12">
                                    <label for="yourLoginID" class="form-label">Complaint Address</label>
                                    <div class="input-group has-validation">
                                        <input type="text" name="caddress" class="form-control" id="yourLoginID" placeholder="Complaint Address..." required>
                                        <div class="invalid-feedback">Please Enter Complaint Address.</div>
                                    </div>
                                </div>
                            </div>


                        </div>





                        <div class="col-md-6 border-start">
                            <h5>Suspect Details</h5>
                            <br>
                            <div class="row pb-4">
                                <div class="col-6">
                                    <label for="yourLoginID" class="form-label">Suspect Name</label>
                                    <div class="input-group has-validation">
                                        <input type="text" name="sName" class="form-control" id="yourLoginID" placeholder="Complaint Name..." required>
                                        <div class="invalid-feedback">Please Enter Suspect Name.</div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="yourLoginID" class="form-label">Suspect Surname</label>
                                    <div class="input-group has-validation">
                                        <input type="text" name="sSurname" class="form-control" id="yourLoginID" placeholder="Complaint Surname..." required>
                                        <div class="invalid-feedback">Please Enter Suspect Surname.</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row pb-4">
                                <div class="col-6">
                                    <label for="yourLoginID" class="form-label">Suspect Gender</label>
                                    <div class="input-group has-validation">
                                        <select name="sGender" class="form-control form-select" required>
                                            <option value="">-- Suspect Gender --</option>
                                            <option value="MALE"> Male </option>
                                            <option value="FEMALE"> Female </option>
                                        </select>
                                        <div class="invalid-feedback">Please Enter Suspect Gender.</div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label for="yourLoginID" class="form-label">Suspect Age</label>
                                    <div class="input-group has-validation">
                                        <input type="date" max="<?= date('Y-m-d') ?>" name="sdob" class="form-control" id="yourLoginID" placeholder="Complaint DOB...">
                                        <div class="invalid-feedback">Please Enter Suspect DOB.</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row pb-4">
                                <div class="col-12">
                                    <label for="yourLoginID" class="form-label">Suspect Address</label>
                                    <div class="input-group has-validation">
                                        <input type="text" name="saddress" class="form-control" id="yourLoginID" placeholder="Suspect Address..." required>
                                        <div class="invalid-feedback">Please Enter Suspect Address.</div>
                                    </div>
                                </div>
                            </div>


                        </div>



                    </div>

                    <br>
                    <br>

                    <div class="col-md-12">
                        <div class="row pb-4">
                            <div class="col-12">
                                <label for="yourLoginID" class="form-label">Incident Category</label>
                                <div class="input-group has-validation">
                                    <input type="text" name="icategory" class="form-control" id="yourLoginID" placeholder="eg Theft, Rape, Corruption..." required>
                                    <div class="invalid-feedback">Please Enter Incident Category.</div>
                                </div>
                            </div>
                        </div>
                        <div class="row pb-4">
                            <div class="col-12">
                                <label for="yourLoginID" class="form-label">Incident Address</label>
                                <div class="input-group has-validation">
                                    <input type="text" name="iaddress" class="form-control" id="yourLoginID" placeholder="Incident Address..." required>
                                    <div class="invalid-feedback">Please Enter Incident Address.</div>
                                </div>
                            </div>
                        </div>
                        <div class="row pb-4">
                            <div class="col-12">
                                <label for="yourLoginID" class="form-label">Incident Date and Time</label>
                                <div class="input-group has-validation">
                                    <input type="datetime-local" name="idatetime" class="form-control" id="yourLoginID" placeholder="Incident Date and Time..." required>
                                    <div class="invalid-feedback">Please Enter Incident Date and Time.</div>
                                </div>
                            </div>
                        </div>

                        <div class="row pb-4">
                            <div class="col-12">
                                <label for="yourLoginID" class="form-label">Incident Description</label>
                                <div class="input-group has-validation">
                                    <textarea type="text" name="idescription" class="form-control" id="yourLoginID" placeholder="Incident Description..." required style="height: 200px"></textarea>
                                    <div class="invalid-feedback">Please Enter Incident Address.</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" name="btn_add_crime" class="btn btn-outline-primary">Record</button>
                    </div>

                </form>
            </div>
        </div>


        <?php
    }


    public function viewMsgNavCountLoop($adminID){
        $defaultContr = new DefaultContr();
        $rows = $this->GetActiveAdminMail($adminID);
        foreach ($rows as $row) {
            $userRows = $defaultContr->GetUserByID($row['userID']);
            $isUser = $defaultContr->isUser($userRows[0]['id'], $userRows[0]['role']);
            ?>
            <li class="message-item">
                <a href="messages.php?userID=<?= $row['userID'] ?>">
                    <img src="../<?= $isUser[0]['avatar'] ?>" alt="" class="rounded-circle">
                    <div>
                        <h4><?= $isUser[0]['name'] .' '. $isUser[0]['surname'] ?></h4>
                        <p class="fw-light small-text mb-0"> Received <?= $defaultContr->timeAgo($row['dateAdded']) ?> @ <?= $defaultContr->dateToTime($row['dateAdded']) ?> </p>
                    </div>
                </a>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>

            <?php
        }
    }

    public function userMessages($adminID, $userID){
        $defaultContr = new DefaultContr();
        $rows = $this->GetUserMessages($userID, $adminID);
        $adminRole = $defaultContr->isUser($adminID, 'admin');
        $userRole = $defaultContr->isUser($userID, 'public');
        $this->updateUserReadStatus($userID, $adminID);
        ?>
        <section --style="background-color: #eee;">
            <div --class="container py-5">

                <div class="row d-flex justify-content-center">
                    <div class="col-md-12 col-lg-12 col-xl-12">

                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center p-3"
                                 --style="border-top: 4px solid #0067ff;">
                                <br>
                                <h5 class="mb-0 pt-2">Chat with <?= $adminRole[0]['name'] .' '. $adminRole[0]['surname'] ?></h5>
                                <div class="d-flex flex-row align-items-center">
                                    <!--<span class="badge bg-warning me-3">20</span>-->
                                    <i class="fas fa-minus me-3 text-muted fa-xs"></i>
                                    <i class="fas fa-comments me-3 text-muted fa-xs"></i>
                                    <i class="fas fa-times text-muted fa-xs"></i>
                                </div>
                            </div>
                            <div class="card-body" data-mdb-perfect-scrollbar="true" --style="position: relative; height: 400px">
                                <?php
                                if(count($rows) < 1){
                                    ?>
                                    <br><div class="alert alert-danger pt-2">No messages yet</div>
                                    <?php
                                }
                                foreach ($rows as $row){
                                    if($row['ToFrom'] == 0){
                                        //left
                                        ?>
                                        <div class="d-flex justify-content-start">
                                            <p class="small mb-1"><?= $adminRole[0]['name'] .' '. $adminRole[0]['surname'] ?> : <?= $defaultContr->timeAgo($row['dateAdded']) ?></p>
                                        </div>
                                        <div class="d-flex flex-row justify-content-start"><!--
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava5-bg.webp"
                         alt="avatar 1" style="width: 45px; height: 100%;">-->
                                            <div>
                                                <p class="small p-2 ms-3 mb-3 text-white rounded-3 bg-secondary" style="background-color: #f5f6f7;"> <span style="font-size: 10px"><?= $defaultContr->dateToTime($row['dateAdded']) ?></span> : <?= $row['message'] ?></p>
                                            </div>
                                        </div>
                                        <?php
                                    }else{
                                        //right
                                        if($row['status'] == 1){
                                            $bg = 'danger';
                                            $fa = 'circle';
                                        }else{
                                            $bg = 'success';
                                            $fa = 'check';
                                        }
                                        ?>
                                        <div class="d-flex justify-content-end">
                                            <p class="small mb-1"><?= $userRole[0]['name'] .' '. $userRole[0]['surname'] ?> : <?= $defaultContr->timeAgo($row['dateAdded']) ?></p>
                                        </div>

                                        <div class="d-flex flex-row justify-content-end mb-4 pt-1">
                                            <div>
                                                <p class="small p-2 me-3 mb-3 justify-content-end text-right text-white rounded-3 bg-primary"> <span style="font-size: 10px"><?= $defaultContr->dateToTime($row['dateAdded']) ?></span> : <?= $row['message'] ?>
                                                    <span style="font-size: 10px" class="badge bg-<?= $bg ?>"><span class="fa fa-<?= $fa ?>"></span></span>
                                                    <br>
                                                    <a onclick="return confirm('This message will be deleted and it will no longer be available to the recipient. Proceed?')" style="text-decoration: none" class="text-danger" href="../includes/additional.inc.php?action=delMsg&msgID=<?= $row['id'] ?>">delete</a>
                                                </p>
                                            </div><!--
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava6-bg.webp"
                         alt="avatar 1" style="width: 45px; height: 100%;">-->
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>

                            <div class="card-footer text-muted d-flex justify-content-center align-items-center p-3">
                                <div -class="input-group mb-0">
                                    <form method="POST" action="../includes/additional.inc.php?action=usersendmsg">
                                        <input name="adminID" value="<?= $adminID ?>" hidden>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <textarea style="height: 100px;" class="form-control" type="text" name="msg" placeholder="Type Message here..." required></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <button name="send" type="submit" class="btn btn-warning btn-sm">Send <span class="fa fa-send"></span></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </section>
        <?php

    }


    public function viewAllUserMessages($role){
        $defaultContr = new DefaultContr();
        $rows = $this->GetAllUserBYRole($role);
        $s = 0;
        foreach ($rows as $row){
            $isUser = $defaultContr->isUser($row['id'], $row['role']);
            $msg = $this->GetActiveUserMsgsByAdminID($row['id'], $_SESSION['id']);
            ?>
            <tr>
                <td><?= $s+=1 ?></td>
                <td><?= $isUser[0]['name'] ?></td>
                <td><?= $isUser[0]['surname'] ?></td>
                <td><?= count($msg) ?></td>
                <td><a href="messages.php?userID=<?= $row['id'] ?>"><span class="ri-mail-check-fill"></span></a></td>
            </tr>
            <?php
        }
    }

    public function viewAllAdminMessages($role){
        $defaultContr = new DefaultContr();
        $rows = $this->GetAllUserBYRole($role);
        $s = 0;
        foreach ($rows as $row){
            $isUser = $defaultContr->isUser($row['id'], $row['role']);
            $msg = $this->GetActiveAdminMsgsByAdminID($row['id'], $_SESSION['id']);
            ?>
            <tr>
                <td><?= $s+=1 ?></td>
                <td><?= $isUser[0]['name'] ?></td>
                <td><?= $isUser[0]['surname'] ?></td>
                <td><?= count($msg) ?></td>
                <td><a href="messages.php?adminID=<?= $row['id'] ?>"><span class="ri-mail-check-fill"></span></a></td>
            </tr>
            <?php
        }
    }

    public function adminMessage($adminID, $userID){
        $defaultContr = new DefaultContr();
        $rows = $this->GetUserMessages($userID, $adminID);
        $adminRole = $defaultContr->isUser($adminID, 'admin');
        $userRole = $defaultContr->isUser($userID, 'public');
        $this->updateAdminReadStatus($userID, $adminID);
        ?>
        <section style="background-color: #eee;">
            <div --class="container py-5">

                <div class="row d-flex justify-content-center">
                    <div class="col-md-10 col-lg-12 col-xl-12">

                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center p-3"
                                 --style="border-top: 4px solid #0067ff;">
                                <br>
                                <h5 class="mb-0">Chat with <?= $userRole[0]['name'] .' '. $userRole[0]['surname'] ?></h5>
                                <div class="d-flex flex-row align-items-center">
                                    <!--<span class="badge bg-warning me-3">20</span>-->
                                    <i class="fas fa-minus me-3 text-muted fa-xs"></i>
                                    <i class="fas fa-comments me-3 text-muted fa-xs"></i>
                                    <i class="fas fa-times text-muted fa-xs"></i>
                                </div>
                            </div>
                            <div class="card-body" data-mdb-perfect-scrollbar="true" --style="position: relative; height: 400px;">
                                <?php
                                if(count($rows) < 1){
                                    ?>
                                    <br><div class="alert alert-danger pt-2">No messages yet</div>
                                    <?php
                                }
                                foreach ($rows as $row){
                                    if($row['ToFrom'] == 1){
                                        //left
                                        ?>
                                        <div class="d-flex justify-content-start">
                                            <p class="small mb-1"><a href="userProfile.php?userID=<?= $userID ?>"><?= $userRole[0]['name'] .' '. $userRole[0]['surname'] ?></a> : <?= $defaultContr->timeAgo($row['dateAdded']) ?></p>
                                        </div>
                                        <div class="d-flex flex-row justify-content-start"><!--
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava5-bg.webp"
                         alt="avatar 1" style="width: 45px; height: 100%;">-->
                                            <div>
                                                <p class="small p-2 ms-3 mb-3 text-white rounded-3 bg-secondary" style="background-color: #f5f6f7;"> <span style="font-size: 10px"><?= $defaultContr->dateToTime($row['dateAdded']) ?></span> : <?= $row['message'] ?></p>
                                            </div>
                                        </div>
                                        <?php
                                    }else{
                                        //right
                                        if($row['status'] == 1){
                                            $bg = 'danger';
                                            $fa = 'circle';
                                        }else{
                                            $bg = 'success';
                                            $fa = 'check';
                                        }
                                        ?>
                                        <div class="d-flex justify-content-end">
                                            <p class="small mb-1"><?= $adminRole[0]['name'] .' '. $adminRole[0]['surname'] ?> : <?= $defaultContr->timeAgo($row['dateAdded']) ?></p>
                                        </div>
                                        <div class="d-flex flex-row justify-content-end mb-4 pt-1">
                                            <div>
                                                <p class="small p-2 me-3 mb-3 justify-content-end text-right text-white rounded-3 bg-primary"> <span style="font-size: 10px"><?= $defaultContr->dateToTime($row['dateAdded']) ?></span> : <?= $row['message'] ?>
                                                    <span style="font-size: 10px" class="badge bg-<?= $bg ?>"><span class="fa fa-<?= $fa ?>"></span></span>
                                                    <br>
                                                    <a onclick="return confirm('This message will be deleted and it will no longer be available to the recipient. Proceed?')" style="text-decoration: none" class="text-danger" href="../includes/additional.inc.php?action=delMsg&msgID=<?= $row['id'] ?>">delete</a>
                                                </p>

                                            </div><!--
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava6-bg.webp"
                         alt="avatar 1" style="width: 45px; height: 100%;">-->
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>

                            <div class="card-footer text-muted d-flex justify-content-center align-items-center p-3">
                                <div --class="input-group mb-0">
                                    <form method="POST" action="../includes/additional.inc.php?action=adminsendmsg">
                                        <input name="userID" value="<?= $userID ?>" hidden>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <textarea style="height: 100px;" class="form-control" type="text" name="msg" placeholder="Type Message here..." required></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <button name="send" type="submit" class="btn btn-warning btn-sm">Send <span class="fa fa-send"></span></button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </section>
        <?php

    }


    public function viewTipOffPublic(){
        if(isset($_SESSION['id'])){
            $directory = '../';
            $userID = $_SESSION['id'];
        }else{
            $directory='';
            $userID = 0;
        }
        ?>
        <div>
            <div class="pt-4 pb-2">
                <h5 class="card-title text-center pb-0 fs-4">Tip Off</h5>
                <p class="text-center small">Provide an anonymous Tip-Off </p>
            </div>

            <form class="row g-3 needs-validation" novalidate method="POST" action="<?= $directory ?>includes/insert.inc.php">
                <input type="text" name="userID" value="<?= $userID ?>" hidden>

                <div class="col-6">
                    <label for="yourLoginID" class="form-label">National-ID (optional)</label>
                    <div class="input-group has-validation">
                        <input type="text" name="nationalID" class="form-control" id="yourLoginID" placeholder="Your National-ID">
                        <div class="invalid-feedback">Please enter your national-ID.</div>
                    </div>
                </div>
                <div class="col-6"></div>

                <div class="col-6">
                    <label for="yourLoginID" class="form-label">Name (optional)</label>
                    <div class="input-group has-validation">
                        <input type="text" <?php if(isset($_SESSION['id'])){ ?> value="<?= $_SESSION['name'] ?>" <?php } ?> name="name" class="form-control" id="yourLoginID" placeholder="Your Name">
                        <div class="invalid-feedback">Please enter your name.</div>
                    </div>
                </div>
                <div class="col-6">
                    <label for="yourLoginID" class="form-label">Surname (optional)</label>
                    <div class="input-group has-validation">
                        <input type="text" name="surname" <?php if(isset($_SESSION['id'])){ ?> value="<?= $_SESSION['surname'] ?>" <?php } ?> class="form-control" id="yourLoginID" placeholder="Your Surname">
                        <div class="invalid-feedback">Please enter your surname.</div>
                    </div>
                </div>


                <div class="col-12">
                    <label for="yourLoginID" class="form-label">Tip-Off Details</label>
                    <div class="input-group has-validation">
                        <textarea style="height: 200px" name="tip" class="form-control" placeholder="Tip-Off Details..." required minlength="20"></textarea>
                        <div class="invalid-feedback">Please enter detailed tip-off (20 characters minimum).</div>
                    </div>
                </div>


                <!--
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                </div>
                -->
                <div class="col-12">
                    <button name="btn_add_tipoff" class="btn btn-primary w-100" type="submit">Submit</button>
                </div>
            </form>
        </div>
        <?php
    }

    public function viewMostWantedProfile($id){
        $defaultContr = new DefaultContr();
        $rows = $this->GetMostWantedByID($id);
        if(count($rows) > 0){
            ?>
            <div class="card">
                <div class="card-body"><br>
                    <h4>Most Wanted</h4><hr>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="pb-2"><span class="fw-bold">Date Added</span> : <br> <span><?= $defaultContr->dateToDay($rows[0]['dateAdded']) ?></span></div>
                            <div class="pb-2"><span class="fw-bold">Name</span> : <br> <span><?= $rows[0]['name'] ?></span></div>
                            <div class="pb-2"><span class="fw-bold">Surname</span> : <br> <span><?= $rows[0]['surname'] ?></span></div>
                            <hr>
                            <a onclick="return confirm('You are about to delete. Proceed ?')" href="../includes/delete.inc.php?action=delMostWanted&id=<?= $rows[0]['id'] ?>">delete</a>
                        </div>
                        <div class="col-md-8">
                            <div class="image"><img src="../<?= $rows[0]['source'] ?>"></div>
                        </div>
                    </div>

                </div>
            </div>

            <?php
        }else{
            echo 'Invalide Most wanted ID';
        }
    }


    public function viewTipOff($id){
        $defaultContr = new DefaultContr();
        $rows = $this->GetTipByID($id);
        if(count($rows) > 0){
            if($_SESSION['role'] == 'admin'){
                $this->updateTipOffStatus($id);
            }
            ?>
            <div class="card">
                <div class="card-body">
                    <div class="row p-4">
                        <div class="col-md-12">
                            <h5>Tip Details</h5><hr>
                            <div class="pb-2"><span class="fw-bold">From</span> : <br> <span><?= $rows[0]['surname'] ?> <?= $rows[0]['name'] ?></span></div>
                            <div class="pb-2"><span class="fw-bold">national ID</span> : <br> <span><?= $rows[0]['nationalID'] ?></span></div>
                            <div class="pb-4"><span class="fw-bold">Incident Date-Time</span> : <br> <span><?= $defaultContr->dateTimeToDay($rows[0]['dateAdded']) ?></span></div>
                            <div class="pb-2"><span class="fw-bold">Tip Details</span> : <br> <span><?= $rows[0]['tipoff'] ?></span></div>
                            <hr>
                            <a onclick="return confirm('You are about to delete. Proceed ?')" href="../includes/delete.inc.php?action=delTipOff&id=<?= $rows[0]['id'] ?>">delete</a>
                        </div>

                    </div>
                </div>
            </div>
            <?php
        }else{
            echo 'Invalid TipOff ID';
        }
    }


    public function viewCrime($caseID){
        $defaultContr = new DefaultContr();
        $rows = $this->GetCrimeByCaseID($caseID);
        if(count($rows) > 0){
            if($rows[0]['solved'] == 0){
                $status = 'pending';
                $bg = 'warning';
            } elseif($rows[0]['solved'] == 1){
                $status = 'accepted';
                $bg = 'primary';
                $print = true;
            } elseif($rows[0]['solved'] == 2){
                $status = 'rejected';
                $bg = 'danger';
            }elseif($rows[0]['solved'] == 3){
                $status = 'solved';
                $bg = 'success';
                $print = true;
            }elseif($rows[0]['solved'] == 4){
                $status = 'not solved';
                $bg = 'danger';
                $print = true;
            }else{
                $status = 'pending';
                $bg = 'danger';
            }
            ?>

            <div class="card">
                <div class="card-body">
                    <?php if(isset($print)){ ?>
                        <div class="p-3"><a href="#!" onclick="printDiv('printme')" class="bi-printer btn btn-sm btn-outline-secondary">Print</a></div>
                    <?php } ?>

                    <div class="row border-bottom border-success pb-4">
                        <br>
                        <h6 class="pt-4">Case Solved  Status : <span class="badge bg-<?= $bg ?>"><?= $status ?></span></h6><br>
                        <?php if($_SESSION['role'] == 'admin'){ ?>

                            <form method="POST" action="../includes/update.inc.php">
                                <div class="row">
                                    <input name="caseID" value="<?= $rows[0]['caseID'] ?>" hidden>
                                    <div class="col-md-3">

                                        <select name="status" class="form-control form-select" required>
                                            <option value=""> -- SELECT ACTION --</option>
                                            <option value="1">Accept</option>
                                            <option value="2">Reject</option>
                                            <option value="3">Solved</option>
                                            <option value="4">Not Solved</option>


                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <button name="btn_update_crime_status" type="submit" class="btn btn-sm btn-outline-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        <?php } ?>
                    </div>

                   <div id="printme" class="printme">
                    <div class="row p-4">
                        <div class="col-md-4">
                            <h5>Case Docket</h5><hr>
                            <div class="pb-2"><span class="fw-bold">Recorded By</span> : <br> <span><?= $rows[0]['addedBy'] ?></span></div>
                            <div class="pb-2"><span class="fw-bold">Case ID</span> : <br> <span><?= $rows[0]['caseID'] ?></span></div>
                            <div class="pb-2"><span class="fw-bold">Case Category</span> : <br> <span><?= $rows[0]['incidentCategory'] ?></span></div>
                            <div class="pb-2"><span class="fw-bold">Incident Addredd</span> : <br> <span><?= $rows[0]['incidentAddress'] ?></span></div>
                            <div class="pb-2"><span class="fw-bold">Incident Date-Time</span> : <br> <span><?= $defaultContr->dateTimeToDay($rows[0]['IncidentDateTime']) ?></span></div>
                            <div class="pb-2"><span class="fw-bold">Incident Description</span> : <br> <span><?= $rows[0]['inceidentDescription'] ?></span></div>
                        </div>

                        <div class="col-md-4 border-start">
                            <h5>Complaint Details</h5><hr>
                            <div class="pb-2"><span class="fw-bold">Complaint Name</span> : <br> <span><?= $rows[0]['compliantSurname'] ?> <?= $rows[0]['compliantName'] ?></span></div>
                            <div class="pb-2"><span class="fw-bold">Complaint National ID</span> : <br> <span><?= $rows[0]['complaintID'] ?></span></div>
                            <div class="pb-2"><span class="fw-bold">Complaint DOB</span> : <br> <span><?= $defaultContr->dateToDay($rows[0]['complaintDob']) ?></span></div>
                            <div class="pb-2"><span class="fw-bold">Complaint Gender</span> : <br> <span><?= $rows[0]['complaintGender'] ?></span></div>
                            <div class="pb-2"><span class="fw-bold">Complaint Address</span> : <br> <span><?= $rows[0]['complaintAddress'] ?></span></div>
                        </div>

                        <div class="col-md-4 border-start">
                            <h5>Suspect Details</h5><hr>
                            <div class="pb-2"><span class="fw-bold">Suspect Name</span> : <br> <span><?= $rows[0]['suspectName'] ?></span></div>
                            <div class="pb-2"><span class="fw-bold">Suspect Surname</span> : <br> <span><?= $rows[0]['suspectSurname'] ?></span></div>
                            <div class="pb-2"><span class="fw-bold">Suspect DOB</span> : <br> <span><?= $rows[0]['suspectDob'] ?></span></div>
                            <div class="pb-2"><span class="fw-bold">Suspect Gender</span> : <br> <span><?= $rows[0]['suspectGender'] ?></span></div>
                            <div class="pb-2"><span class="fw-bold">Suspect Address</span> : <br> <span><?= $rows[0]['suspectAddress'] ?></span></div>
                        </div>
                        <hr>
                        <?php if($_SESSION['role'] == 'admin'){ ?>

                        <?php } ?>
                    </div>
                   </div>
                    <a onclick="return confirm('You are about to delete. Proceed ?')" href="../includes/delete.inc.php?action=delCrime&id=<?= $rows[0]['caseID'] ?>">delete</a>
                    <script>
                        function printDiv(printme) {
                            var printContents = document.getElementById(printme).innerHTML;
                            var originalContents = document.body.innerHTML;

                            document.body.innerHTML = printContents;

                            window.print();

                            document.body.innerHTML = originalContents;
                        }
                    </script>
                </div>
            </div>

            <?php
        }else{
            echo 'Invalid Case ID';
        }
    }



    public function viewMostWantedToPublic(){
        $defaultCntr = new DefaultContr();
        $rows = $this->GetAllMostWanted();
        $s=0;
        ?>
        <div class="table-responsive">
            <table class="table datatable table-hover" >
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Date</th>
                    <th>Image</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($rows as $row){
                    ?>
                    <tr>
                        <td><?= $s+=1 ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['surname'] ?></td>
                        <td><?= $defaultCntr->dateToDay($row['dateAdded']) ?></td>
                        <td><a target="_blank" href="<?php if(isset($_SESSION['id'])){ echo '../'; } ?><?= $row['source'] ?>"><span class="bi-eye"></span></a></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
        <?php
    }


    public function viewAllMostWanted(){
        $defaultContr = new DefaultContr();
        $rows = $this->GetAllMostWanted();
        $s=0;
        foreach ($rows as $row){
            ?>
            <tr>
                <td><?= $s+=1 ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['surname'] ?></td>
                <td><?= $defaultContr->dateTimeToDay($row['dateAdded']) ?></td>
                <td><a href="mostWantedProfile.php?id=<?= $row['id'] ?>">View</a></td>
            </tr>
            <?php
        }
    }

    public function viewAllMyTipsOff($userID){
        $defaultContr = new DefaultContr();
        $rows = $this->GetAllTipsOffByUserID($userID);
        $s = 0;
        foreach ($rows as $row){
            if($row['readStatus'] == 0){
                $read = 'Yes';
                $co = 'success';
            }else{
                $read = 'No';
                $co = 'danger';
            }
            ?>
            <tr>
                <td><?= $s+=1 ?></td>
                <td><?= $row['surname'] .' '. $row['name'] ?></td>
                <td><?= $defaultContr->dateTimeToDay($row['dateAdded']) ?></td>
                <td><span class="badge  bg-<?= $co ?>"> <?= $read ?></span></td>
                <td><a href="mytipoff.php?id=<?= $row['id'] ?>">More</a></td>
            </tr>
            <?php
        }
    }

    public function viewTipsOff(){
        $defaultContr = new DefaultContr();
        $rows = $this->GetAllTipsOff();
        $s = 0;
        foreach ($rows as $row){
            if($row['readStatus'] == 0){
                $read = 'Yes';
                $co = 'success';
            }else{
                $read = 'No';
                $co = 'danger';
            }
            ?>
            <tr>
                <td><?= $s+=1 ?></td>
                <td><?= $row['surname'] .' '. $row['name'] ?></td>
                <td><?= $defaultContr->dateTimeToDay($row['dateAdded']) ?></td>
                <td><span class="badge  bg-<?= $co ?>"> <?= $read ?></span></td>
                <td><a href="tipoff.php?id=<?= $row['id'] ?>">More</a></td>
            </tr>
            <?php
        }
    }


    public function viewMyCrimeReports($id){
        $defaultContr = new DefaultContr();
        $crimeRows = $this->GetCrimeReportsByReporterID($id);
        $s = 0;
        foreach ($crimeRows as $crimeRow){
            if($crimeRow['solved'] == 0){
                $status = 'pending';
                $bg = 'warning';
            } elseif($crimeRow['solved'] == 1){
                $status = 'accepted';
                $bg = 'primary';
            } elseif($crimeRow['solved'] == 2){
                $status = 'rejected';
                $bg = 'danger';
            }elseif($crimeRow['solved'] == 3){
                $status = 'solved';
                $bg = 'success';
            }elseif($crimeRow['solved'] == 4){
                $status = 'not solved';
                $bg = 'danger';
            }else{
                $status = 'pending';
                $bg = 'danger';
            }
            ?>
            <tr>
                <td><?= $s+=1 ?></td>
                <td><a href="crime.php?caseID=<?= $crimeRow['caseID'] ?>"><?= $crimeRow['caseID'] ?></a></td>
                <td><span class="badge bg-<?= $bg ?>"><?= $status ?> </span></td>
                <td><?= $crimeRow['compliantSurname'] .' '. $crimeRow['compliantName'] ?></td>
                <td><?= $crimeRow['suspectSurname'] .' '. $crimeRow['suspectName'] ?></td>
                <td><?= $crimeRow['incidentCategory'] ?></td>
                <td><?= $crimeRow['IncidentDateTime'] ?></td>
                <td><?= $defaultContr->dateToDay($crimeRow['dateAdded']) ?></td>
            </tr>
            <?php
        }
    }

    public function viewAllCrimes($solvability){
        $defaultContr = new DefaultContr();
        $crimeRows = $this->GetCrimesBySolvability($solvability);
        $s = 0;
        foreach ($crimeRows as $crimeRow){
            $reporterUserRows = $defaultContr->GetUserByID($crimeRow['reportedID']);
            if(count($reporterUserRows) > 0) {
                if ($reporterUserRows[0]['role'] == 'public') {
                    $visibility = 'External';
                } else {
                    $visibility = 'Internal';
                }
            }else{
                $visibility = 'External';
            }

            if($crimeRow['solved'] == 0){
                $status = 'pending';
                $bg = 'warning';
            } elseif($crimeRow['solved'] == 1){
                $status = 'accepted';
                $bg = 'primary';
            } elseif($crimeRow['solved'] == 2){
                $status = 'rejected';
                $bg = 'danger';
            }elseif($crimeRow['solved'] == 3){
                $status = 'solved';
                $bg = 'success';
            }elseif($crimeRow['solved'] == 4){
                $status = 'not solved';
                $bg = 'danger';
            }else{
                $status = 'pending';
                $bg = 'danger';
            }
            ?>
            <tr>
                <td><?= $s+=1 ?></td>
                <td><a href="crime.php?caseID=<?= $crimeRow['caseID'] ?>"><?= $crimeRow['caseID'] ?></a></td>
                <td><?= $visibility ?> Report</td>
                <td><span class="badge bg-<?= $bg ?>"><?= $status ?> </span></td>
                <td><?= $crimeRow['compliantSurname'] .' '. $crimeRow['compliantName'] ?></td>
                <td><?= $crimeRow['suspectSurname'] .' '. $crimeRow['suspectName'] ?></td>
                <td><?= $crimeRow['incidentCategory'] ?></td>
                <td><?= $crimeRow['IncidentDateTime'] ?></td>
                <td><?= $defaultContr->dateToDay($crimeRow['dateAdded']) ?></td>
            </tr>
            <?php
        }
    }












    public function viewStudentMarksResult($userID){
        $defaultContr = new DefaultContr();
        $studentRows = $defaultContr->isUser($userID, 'student');

        $cbhcRows = $this->GetCBHCResultsByUserID($userID);
        $certificateResultRows = $this->GetCertificateResultsByUserID($userID);

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

        if(count($studentRows) > 0){

            ?>
            <div class="card"><br>
                <div class="card-body">

                    <h5>Results: <?= $studentRows[0]['surname'] ?> <?= $studentRows[0]['name'] ?> <?= $studentRows[0]['secondName'] ?></h5>

                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <th>SUBJECT</th>
                            <?php if($_SESSION['role'] != 'student'){ ?>
                                <th>MARK</th>
                            <?php } ?>
                            <th>PERCENTAGE</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <td>CBHC</td>
                            <?php if($_SESSION['role'] != 'student'){ ?>
                                <td><?= $cbhcMark ?> / <?= $cbhcMarkoutOf ?></td>
                            <?php } ?>
                            <td><?= $cbhcMarkPercentage ?></td>
                        </tr>
                        <tr>
                            <td>CERTIFICATE</td>
                            <?php if($_SESSION['role'] != 'student'){ ?>
                                <td><?= $certificateMark ?> / <?= $certificateMarkoutOf ?></td>
                            <?php } ?>
                            <td><?= $certificateMarkPercentage ?></td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>

            <?php
        }else{
            ?>
            Student Account Not Found
            <?php
        }
    }



    public function viewUpateWebSettings(){
        $defaultCntr = new DefaultContr();
        $rows = $defaultCntr->GetWebDetails();
        ?>
        <form method="POST" action="../includes/update.inc.php">
            <!--<div class="row mb-3">
                <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                <div class="col-md-8 col-lg-9">
                    <img src="assets/img/profile-img.jpg" alt="Profile">
                    <div class="pt-2">
                        <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                        <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                    </div>
                </div>
            </div>-->

            <div class="row mb-3">
                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Website Name</label>
                <div class="col-md-8 col-lg-9">
                    <input name="fullName" type="text" class="form-control" placeholder="Website Full Name..." id="fullName" value="<?= $rows['0']['webNameFull'] ?>" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="shortName" class="col-md-4 col-lg-3 col-form-label">Short Name</label>
                <div class="col-md-8 col-lg-9">
                    <input name="shortName" type="text" placeholder="Website Short..." class="form-control" maxlength="5" id="shortName" value="<?= $rows['0']['webNameShort'] ?>" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="about" class="col-md-4 col-lg-3 col-form-label">Website Description</label>
                <div class="col-md-8 col-lg-9">
                    <textarea name="description" placeholder="Website Description..." class="form-control" id="about" style="height: 100px" required><?= $rows[0]['webDescription'] ?></textarea>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" name="updateWebDetails" class="btn btn-primary">Save Changes</button>
            </div>
        </form><!-- End Profile Edit Form -->
        <?php
    }

    public function viewWebSettings(){
        $defaultCntr = new DefaultContr();
        $defaultView = new DefaultView();
        $rows = $defaultCntr->GetWebDetails();
        ?>
        <section class="section profile">
            <div class="row">

                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Website</button>
                                </li>

                            </ul>

                            <div class="tab-content pt-2">
                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <h5 class="card-title">Website Name</h5>
                                    <p class="small fst-italic"><?= $rows['0']['webNameFull'] ?></p>

                                    <h5 class="card-title">Other Details</h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Website Short Name</div>
                                        <div class="col-lg-9 col-md-8"><?= $rows['0']['webNameShort'] ?></div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Website Logo</div>
                                        <div class="col-lg-9 col-md-8">
                                            <?php
                                            if($rows[0]['webLogo'] == ''){
                                                ?>
                                                <span class="badge bg-danger">Not available</span>
                                                <?php
                                            }else{
                                                $width = 50;
                                                ?>
                                                <img class="img-profile rounded-circle" width="<?php echo $width ?>px" height="<?php echo $width ?>px" src="../<?php echo $rows[0]['webLogo'] ?>">
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Description</div>
                                        <div class="col-lg-9 col-md-8"><?= $rows[0]['webDescription'] ?></div>
                                    </div>

                                    <!-- <hr>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Developer Phone</div>
                                        <div class="col-lg-9 col-md-8"><a href="tel:<?/*= $rows[0]['phone'] */?>"><?/*= $rows[0]['phone'] */?></a></div>
                                    </div>-->

                                    <hr>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-9 col-md-8"><a href="mailto:<?= $rows[0]['email'] ?>"><?= $rows[0]['email'] ?></a></div>
                                    </div>

                                </div>


                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                    <!-- Profile Edit Form -->
                                    <?=  $this->viewUpateWebSettings(); ?>

                                </div>



                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>
            </div>
        </section>
        <?php
    }




    public function viewAddMostWanted(){
        ?>
        <div class="row">
            <div class="col-md-4">
                <div class="animated--grow-in text-dark fadeout -my-3 -p-3 --bg-white rounded shadow-sm alert alert-secondary">
                    <span class="animated--grow-in fadeout bx bx-info-circle"></span> <span class="text-xs">Select Image File</span>
                </div>

                <hr>
                <form method="POST" novalidate class="needs-validation" action="../includes/insert.inc.php" enctype="multipart/form-data">
                    <div>
                        <input type="file" name="avatar" id="preview" class="form-control text-xs" required>
                    </div><br>
                    <div class="row pb-4">
                        <div class="col-6">
                            <label for="yourLoginID" class="form-label">Name</label>
                            <div class="input-group has-validation">
                                <input type="text" name="name" class="form-control" id="yourLoginID" placeholder="Suspect name..." required>
                                <div class="invalid-feedback">Enter Suspect Name</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="yourLoginID" class="form-label">Surname</label>
                            <div class="input-group has-validation">
                                <input type="text" name="surname" class="form-control" id="yourLoginID" placeholder="Suspect Surname..." required>
                                <div class="invalid-feedback">Enter Suspect Surname</div>
                            </div>
                        </div>
                    </div>
            </div>


            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <br>

                        <div class="card shadow-sm">
                            <img class="shadow-sm" style="width: 100%" id="showpreview" src="#" alt=" Selected image preview will show here" />
                        </div>

                        <div>
                            <button name="btn_add_mostWanted" type="submit" class="btn btn-primary text-xs"><span class="fa fa-camera"></span> Add</button>
                        </div>
                        </form>
                        <div>
                        </div>
                        <script>
                            preview.onchange = evt => {
                                const [file] = preview.files
                                if (file) {
                                    showpreview.src = URL.createObjectURL(file)
                                }
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }


    public function viewUserOptionLoop($role){
        $rows = $this->GetAllIsUser($role);
        foreach ($rows as $row){
            ?>
            <option value="<?= $row['userID'] ?>"><?= $row['name'] .' '. $row['surname'] ?></option>
            <?php
        }
    }



    public function viewCDetails($id){
        $rows = $this->GetCByUserID($id);
        ?>
        <h5 class="card-title">Education Status</h5>
        <?php
        if(count($rows) > 0){
            $s=0;
            foreach ($rows as $row){
                ?>
                <span class="badge text-info"><?= $s+=1 ?></span <p><span class="badge text-success">Enrolled</span> : <span>Certificate towards <a href="certificate.php?cID=<?= $row['id'] ?>"> <?= $row['cName'] ?> <span class="ri-arrow-drop-right-line"></span></a></span></p>
                <?php
            }
        }
        else{
            ?>
            <p class="badge text-danger">Not Enrolled</p>
            <?php
        }
        echo '<hr>';
    }

    public function viewProfileOverview($id){
        $defaultCntr = new DefaultContr();
        $rows = $defaultCntr->GetUserByID($id);

        $isUser = $defaultCntr->isUser($rows[0]['id'], $rows[0]['role']);
        ?>
        <div class="tab-pane fade show active profile-overview" id="profile-overview">

            <?php
            if($_SESSION['role'] == 'student') {
                $this->viewCDetails($id);
            }
            ?>

            <h5 class="card-title">Profile Details</h5>

            <div class="row">
                <div class="col-lg-3 col-md-4 label ">Full Name</div>
                <div class="col-lg-9 col-md-8">
                    <?= $isUser[0]['name'] ?>
                    <?php
                    if($rows[0]['role'] == 'student'){
                        echo  $isUser[0]['secondName'];
                    }
                    ?>
                    <?=  $isUser[0]['surname']  ?>
                </div>
            </div>

            <?php
            if($rows[0]['role'] == 'student'){
                ?>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Student ID</div>
                    <div class="col-lg-9 col-md-8"><?= $isUser[0]['studentID'] ?></div>
                </div>

                <?php
            }
            ?>

            <div class="row">
                <div class="col-lg-3 col-md-4 label ">National ID</div>
                <div class="col-lg-9 col-md-8"><?= $isUser[0]['nationalID'] ?></div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-4 label ">Email</div>
                <div class="col-lg-9 col-md-8"><?= $_SESSION['email'] ?></div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-4 label ">Phone</div>
                <div class="col-lg-9 col-md-8"><?= $isUser[0]['phone'] ?></div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-4 label">Account Type</div>
                <div class="col-lg-9 col-md-8"><?= $rows[0]['role'] ?></div>
            </div>


        </div>

        <?php
    }

}
