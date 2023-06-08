<?php

class DefaultView extends DefaultModel{

    public function viewUpdateStudentProfile($userID){
        $userRows = $this->GetUserByID($userID);
        if(count($userRows) > 0){
            $isUser = $this->isUser($userRows[0]['id'], $userRows[0]['role']);
            ?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Student Account Creation Form</h5>

                    <!-- Multi Columns Form -->
                    <form class="g-3" method="POST" action="../includesDefault/update.inc.php">

                        <input name="userID" value="<?= $userID ?>" hidden>

                        <div class="pb-4 row">

                            <div class="col-md-4">
                                <label for="inputName5" class="form-label">Surname</label>
                                <input name="surname" value="<?= $isUser[0]['surname'] ?>" type="text" class="form-control" id="inputName5" placeholder="Surname..." required>
                            </div>
                            <div class="col-md-4">
                                <label for="inputName5" class="form-label">First Name <span class="sta"></span></label>
                                <input name="name" value="<?= $isUser[0]['name'] ?>" type="text" class="form-control" id="inputName5" placeholder="First Name..." required>
                            </div>
                            <div class="col-md-4">
                                <label for="inputName5" class="form-label">Second Name</label>
                                <input name="secondName" value="<?= $isUser[0]['secondName'] ?>" type="text" class="form-control" id="inputName5" placeholder="Second Name...">
                            </div>
                        </div>



                        <label for="inputName5" class="form-label">Student ID</label>
                        <div class="input-group pb-4">
                            <span class="input-group-text bx bx-id-card"></span>
                            <input name="studentID" value="<?= $isUser[0]['studentID'] ?>" type="text" placeholder="e.g: 2023/000" class="form-control" required>
                        </div>


                        <?php
                        $Date = date("Y-m-d");
                        //60 YEARS MAXIMUM AGE
                        $DOBMin =  date('Y-m-d', strtotime($Date. ' - 21360 days'));
                        //18 YEARS OLD MINIMUM AGE
                        $DOBMax =  date('Y-m-d', strtotime($Date. ' - 6574 days'));
                        //ACCOUNT IS NOW CREATED
                        ?>

                        <div class="row pb-4">

                            <div class="col-md-4">
                                <label for="inputName5" class="form-label">Date Of Birth | <span><?= $this->dateToMonth($isUser[0]['dob']) ?></span></label>
                                <input value="<?= $isUser[0]['dob'] ?>" min="<?=  $DOBMin ?>" max="<?= $DOBMax ?>" name="dob" type="date"  class="form-control" id="inputName5" placeholder="Date Of Birth...">
                            </div>

                            <div class="col-md-4">
                                <label for="inputName5" class="form-label">Gender</label>
                                <select name="sex" class="form-control form-select">
                                    <option value="<?= $isUser[0]['sex'] ?>"><?= $isUser[0]['sex'] ?></option>
                                    <?php
                                    if($isUser[0]['sex'] == 'MALE'){
                                        ?>
                                        <option value="FEMALE">FEMALE</option>
                                        <?php
                                    }elseif ($isUser[0]['sex'] == 'FEMALE'){
                                        ?>
                                        <option value="MALE">MALE</option>
                                        <?php
                                    }else{
                                        ?>
                                        <option value="MALE">MALE</option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>

                        </div>



                        <div class="row pb-4">

                            <div class="col-md-4">
                                <label for="inputName5" class="form-label">Country</label>
                                <select class="form-control form-select" id="country" name="country" required>

                                    <option value="<?= $isUser[0]['nationality'] ?>"> <?= $isUser[0]['nationality'] ?> </option>

                                    <option value="Afghanistan">Afghanistan</option>

                                    <option value="Albania">Albania</option>

                                    <option value="Algeria">Algeria</option>

                                    <option value="American Samoa">American Samoa</option>

                                    <option value="Andorra">Andorra</option>

                                    <option value="Angola">Angola</option>

                                    <option value="Anguilla">Anguilla</option>

                                    <option value="Antigua & Barbuda">Antigua & Barbuda</option>

                                    <option value="Argentina">Argentina</option>

                                    <option value="Armenia">Armenia</option>

                                    <option value="Aruba">Aruba</option>

                                    <option value="Australia">Australia</option>

                                    <option value="Austria">Austria</option>

                                    <option value="Azerbaijan">Azerbaijan</option>

                                    <option value="Bahamas">Bahamas</option>

                                    <option value="Bahrain">Bahrain</option>

                                    <option value="Bangladesh">Bangladesh</option>

                                    <option value="Barbados">Barbados</option>

                                    <option value="Belarus">Belarus</option>

                                    <option value="Belgium">Belgium</option>

                                    <option value="Belize">Belize</option>

                                    <option value="Benin">Benin</option>

                                    <option value="Bermuda">Bermuda</option>

                                    <option value="Bhutan">Bhutan</option>

                                    <option value="Bolivia">Bolivia</option>

                                    <option value="Bonaire">Bonaire</option>

                                    <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>

                                    <option value="Botswana">Botswana</option>

                                    <option value="Brazil">Brazil</option>

                                    <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>

                                    <option value="Brunei">Brunei</option>

                                    <option value="Bulgaria">Bulgaria</option>

                                    <option value="Burkina Faso">Burkina Faso</option>

                                    <option value="Burundi">Burundi</option>

                                    <option value="Cambodia">Cambodia</option>

                                    <option value="Cameroon">Cameroon</option>

                                    <option value="Canada">Canada</option>

                                    <option value="Canary Islands">Canary Islands</option>

                                    <option value="Cape Verde">Cape Verde</option>

                                    <option value="Cayman Islands">Cayman Islands</option>

                                    <option value="Central African Republic">Central African Republic</option>

                                    <option value="Chad">Chad</option>

                                    <option value="Channel Islands">Channel Islands</option>

                                    <option value="Chile">Chile</option>

                                    <option value="China">China</option>

                                    <option value="Christmas Island">Christmas Island</option>

                                    <option value="Cocos Island">Cocos Island</option>

                                    <option value="Colombia">Colombia</option>

                                    <option value="Comoros">Comoros</option>

                                    <option value="Congo">Congo</option>

                                    <option value="Cook Islands">Cook Islands</option>

                                    <option value="Costa Rica">Costa Rica</option>

                                    <option value="Cote DIvoire">Cote DIvoire</option>

                                    <option value="Croatia">Croatia</option>

                                    <option value="Cuba">Cuba</option>

                                    <option value="Curaco">Curacao</option>

                                    <option value="Cyprus">Cyprus</option>

                                    <option value="Czech Republic">Czech Republic</option>

                                    <option value="Denmark">Denmark</option>

                                    <option value="Djibouti">Djibouti</option>

                                    <option value="Dominica">Dominica</option>

                                    <option value="Dominican Republic">Dominican Republic</option>

                                    <option value="East Timor">East Timor</option>

                                    <option value="Ecuador">Ecuador</option>

                                    <option value="Egypt">Egypt</option>

                                    <option value="El Salvador">El Salvador</option>

                                    <option value="Equatorial Guinea">Equatorial Guinea</option>

                                    <option value="Eritrea">Eritrea</option>

                                    <option value="Estonia">Estonia</option>

                                    <option value="Ethiopia">Ethiopia</option>

                                    <option value="Falkland Islands">Falkland Islands</option>

                                    <option value="Faroe Islands">Faroe Islands</option>

                                    <option value="Fiji">Fiji</option>

                                    <option value="Finland">Finland</option>

                                    <option value="France">France</option>

                                    <option value="French Guiana">French Guiana</option>

                                    <option value="French Polynesia">French Polynesia</option>

                                    <option value="French Southern Ter">French Southern Ter</option>

                                    <option value="Gabon">Gabon</option>

                                    <option value="Gambia">Gambia</option>

                                    <option value="Georgia">Georgia</option>

                                    <option value="Germany">Germany</option>

                                    <option value="Ghana">Ghana</option>

                                    <option value="Gibraltar">Gibraltar</option>

                                    <option value="Great Britain">Great Britain</option>

                                    <option value="Greece">Greece</option>

                                    <option value="Greenland">Greenland</option>

                                    <option value="Grenada">Grenada</option>

                                    <option value="Guadeloupe">Guadeloupe</option>

                                    <option value="Guam">Guam</option>

                                    <option value="Guatemala">Guatemala</option>

                                    <option value="Guinea">Guinea</option>

                                    <option value="Guyana">Guyana</option>

                                    <option value="Haiti">Haiti</option>

                                    <option value="Hawaii">Hawaii</option>

                                    <option value="Honduras">Honduras</option>

                                    <option value="Hong Kong">Hong Kong</option>

                                    <option value="Hungary">Hungary</option>

                                    <option value="Iceland">Iceland</option>

                                    <option value="Indonesia">Indonesia</option>

                                    <option value="India">India</option>

                                    <option value="Iran">Iran</option>

                                    <option value="Iraq">Iraq</option>

                                    <option value="Ireland">Ireland</option>

                                    <option value="Isle of Man">Isle of Man</option>

                                    <option value="Israel">Israel</option>

                                    <option value="Italy">Italy</option>

                                    <option value="Jamaica">Jamaica</option>

                                    <option value="Japan">Japan</option>

                                    <option value="Jordan">Jordan</option>

                                    <option value="Kazakhstan">Kazakhstan</option>

                                    <option value="Kenya">Kenya</option>

                                    <option value="Kiribati">Kiribati</option>

                                    <option value="Korea North">Korea North</option>

                                    <option value="Korea Sout">Korea South</option>

                                    <option value="Kuwait">Kuwait</option>

                                    <option value="Kyrgyzstan">Kyrgyzstan</option>

                                    <option value="Laos">Laos</option>

                                    <option value="Latvia">Latvia</option>

                                    <option value="Lebanon">Lebanon</option>

                                    <option value="Lesotho">Lesotho</option>

                                    <option value="Liberia">Liberia</option>

                                    <option value="Libya">Libya</option>

                                    <option value="Liechtenstein">Liechtenstein</option>

                                    <option value="Lithuania">Lithuania</option>

                                    <option value="Luxembourg">Luxembourg</option>

                                    <option value="Macau">Macau</option>

                                    <option value="Macedonia">Macedonia</option>

                                    <option value="Madagascar">Madagascar</option>

                                    <option value="Malaysia">Malaysia</option>

                                    <option value="Malawi">Malawi</option>

                                    <option value="Maldives">Maldives</option>

                                    <option value="Mali">Mali</option>

                                    <option value="Malta">Malta</option>

                                    <option value="Marshall Islands">Marshall Islands</option>

                                    <option value="Martinique">Martinique</option>

                                    <option value="Mauritania">Mauritania</option>

                                    <option value="Mauritius">Mauritius</option>

                                    <option value="Mayotte">Mayotte</option>

                                    <option value="Mexico">Mexico</option>

                                    <option value="Midway Islands">Midway Islands</option>

                                    <option value="Moldova">Moldova</option>

                                    <option value="Monaco">Monaco</option>

                                    <option value="Mongolia">Mongolia</option>

                                    <option value="Montserrat">Montserrat</option>

                                    <option value="Morocco">Morocco</option>

                                    <option value="Mozambique">Mozambique</option>

                                    <option value="Myanmar">Myanmar</option>

                                    <option value="Nambia">Nambia</option>

                                    <option value="Nauru">Nauru</option>

                                    <option value="Nepal">Nepal</option>

                                    <option value="Netherland Antilles">Netherland Antilles</option>

                                    <option value="Netherlands">Netherlands (Holland, Europe)</option>

                                    <option value="Nevis">Nevis</option>

                                    <option value="New Caledonia">New Caledonia</option>

                                    <option value="New Zealand">New Zealand</option>

                                    <option value="Nicaragua">Nicaragua</option>

                                    <option value="Niger">Niger</option>

                                    <option value="Nigeria">Nigeria</option>

                                    <option value="Niue">Niue</option>

                                    <option value="Norfolk Island">Norfolk Island</option>

                                    <option value="Norway">Norway</option>

                                    <option value="Oman">Oman</option>

                                    <option value="Pakistan">Pakistan</option>

                                    <option value="Palau Island">Palau Island</option>

                                    <option value="Palestine">Palestine</option>

                                    <option value="Panama">Panama</option>

                                    <option value="Papua New Guinea">Papua New Guinea</option>

                                    <option value="Paraguay">Paraguay</option>

                                    <option value="Peru">Peru</option>

                                    <option value="Phillipines">Philippines</option>

                                    <option value="Pitcairn Island">Pitcairn Island</option>

                                    <option value="Poland">Poland</option>

                                    <option value="Portugal">Portugal</option>

                                    <option value="Puerto Rico">Puerto Rico</option>

                                    <option value="Qatar">Qatar</option>

                                    <option value="Republic of Montenegro">Republic of Montenegro</option>

                                    <option value="Republic of Serbia">Republic of Serbia</option>

                                    <option value="Reunion">Reunion</option>

                                    <option value="Romania">Romania</option>

                                    <option value="Russia">Russia</option>

                                    <option value="Rwanda">Rwanda</option>

                                    <option value="St Barthelemy">St Barthelemy</option>

                                    <option value="St Eustatius">St Eustatius</option>

                                    <option value="St Helena">St Helena</option>

                                    <option value="St Kitts-Nevis">St Kitts-Nevis</option>

                                    <option value="St Lucia">St Lucia</option>

                                    <option value="St Maarten">St Maarten</option>

                                    <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>

                                    <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>

                                    <option value="Saipan">Saipan</option>

                                    <option value="Samoa">Samoa</option>

                                    <option value="Samoa American">Samoa American</option>

                                    <option value="San Marino">San Marino</option>

                                    <option value="Sao Tome & Principe">Sao Tome & Principe</option>

                                    <option value="Saudi Arabia">Saudi Arabia</option>

                                    <option value="Senegal">Senegal</option>

                                    <option value="Seychelles">Seychelles</option>

                                    <option value="Sierra Leone">Sierra Leone</option>

                                    <option value="Singapore">Singapore</option>

                                    <option value="Slovakia">Slovakia</option>

                                    <option value="Slovenia">Slovenia</option>

                                    <option value="Solomon Islands">Solomon Islands</option>

                                    <option value="Somalia">Somalia</option>

                                    <option value="South Africa">South Africa</option>

                                    <option value="Spain">Spain</option>

                                    <option value="Sri Lanka">Sri Lanka</option>

                                    <option value="Sudan">Sudan</option>

                                    <option value="Suriname">Suriname</option>

                                    <option value="Swaziland">Swaziland</option>

                                    <option value="Sweden">Sweden</option>

                                    <option value="Switzerland">Switzerland</option>

                                    <option value="Syria">Syria</option>

                                    <option value="Tahiti">Tahiti</option>

                                    <option value="Taiwan">Taiwan</option>

                                    <option value="Tajikistan">Tajikistan</option>

                                    <option value="Tanzania">Tanzania</option>

                                    <option value="Thailand">Thailand</option>

                                    <option value="Togo">Togo</option>

                                    <option value="Tokelau">Tokelau</option>

                                    <option value="Tonga">Tonga</option>

                                    <option value="Trinidad & Tobago">Trinidad & Tobago</option>

                                    <option value="Tunisia">Tunisia</option>

                                    <option value="Turkey">Turkey</option>

                                    <option value="Turkmenistan">Turkmenistan</option>

                                    <option value="Turks & Caicos Is">Turks & Caicos Is</option>

                                    <option value="Tuvalu">Tuvalu</option>

                                    <option value="Uganda">Uganda</option>

                                    <option value="United Kingdom">United Kingdom</option>

                                    <option value="Ukraine">Ukraine</option>

                                    <option value="United Arab Erimates">United Arab Emirates</option>

                                    <option value="United States of America">United States of America</option>

                                    <option value="Uraguay">Uruguay</option>

                                    <option value="Uzbekistan">Uzbekistan</option>

                                    <option value="Vanuatu">Vanuatu</option>

                                    <option value="Vatican City State">Vatican City State</option>

                                    <option value="Venezuela">Venezuela</option>

                                    <option value="Vietnam">Vietnam</option>

                                    <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>

                                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>

                                    <option value="Wake Island">Wake Island</option>

                                    <option value="Wallis & Futana Is">Wallis & Futana Is</option>

                                    <option value="Yemen">Yemen</option>

                                    <option value="Zaire">Zaire</option>

                                    <option value="Zambia">Zambia</option>

                                    <option value="Zimbabwe">Zimbabwe</option>

                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="inputName5" class="form-label">National ID (12-345678A90)</label>
                                <input name="nationalID" value="<?= $isUser[0]['nationalID'] ?>" pattern=".{10,15}" minlength="10" maxlength="15" title="should be between 10 to 15 characters" type="text" class="form-control" id="inputEmail5" placeholder="National ID..." required>
                            </div>

                        </div>



                        <div class="row pb-4">
                            <div class="col-md-4">
                                <label for="inputName5" class="form-label">Phone</label>
                                <input name="phone" value="<?= $isUser[0]['phone'] ?>" type="number" class="form-control" id="inputName5" placeholder="Phone Number ..">
                            </div>

                            <div class="col-md-4">
                                <label for="inputName5" class="form-label">Email</label>
                                <input name="email" type="email" value="<?= $isUser[0]['email'] ?>" class="form-control" id="inputName5" placeholder="Email Address ..">
                            </div>

                            <div class="col-md-4">
                                <label for="inputName5" class="form-label">Physical Address</label>
                                <input name="address" type="text" value="<?= $isUser[0]['address'] ?>" class="form-control" id="inputName5" placeholder="Physical Address ..">
                            </div>

                        </div>



                        <div class="text-center">
                            <button type="submit" name="btn_updateUser" class="btn btn-primary">Save</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form><!-- End Multi Columns Form -->

                </div>
            </div>
            <?php
        }else{
            echo 'Student Account Not Found';
        }
    }



    public function accountStatsLoop(){
        $rows = $this->GetAllUserRoles();
        $s=0;
        foreach ($rows as $row){
            $s+=1;
            if($s == 1){
                $color = 'darkPurple';}
            if($s == 2){
                $color = 'purple';}
            if($s == 3){
                $color = 'red';}
            if($s == 4){
                $color = 'blue';}
            if($s == 5){
                $color = 'lime';}

            ?>
                <a href="all<?= $row['valueName'] ?>Acc.php">
                    <div class="card-box bg-<?php echo $color ?>">
                        <div class="inner">
                            <h3> <?php
                                $query = "SELECT * FROM  ".$row['valueName']." ";
                                $o = new DefaultView();
                                $o->CountView($query);
                                ?> </h3>
                            <p> All <?php echo $row['valueName'] ?> Accounts </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </div>

                    </div>
                </a>
            <?php
        }
    }

    public function viewChangePassword(){
        ?>
        <div class="container card-body col-md-12 --card grid-margin stretch-card rounded bg-white">
            <div class="row">
                <div class="col-md-12 border-right">
                    <div class="">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="text-right">Password <span class="ri-lock-password-fill"></span></h5>

                        </div>
                        <form method="post" action="../includesDefault/update.inc.php" >
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <label class="labels">Current Password</label>
                                    <input name="op" type="password" class="form-control" placeholder="Current Password" required>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <label class="labels">New Password</label>
                                    <input id="password" name="np" type="password" class="form-control" placeholder="New Password" onkeyup='check();' minlength="8" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="labels">Confirm New Password</label>
                                    <input id="confirmPassword" name="cp" type="password" class="form-control" placeholder="Confirm New Password" onkeyup='check();' minlength="8" required>
                                </div>
                            </div>

                            <script>
                                var check = function() {
                                    if (document.getElementById('password').value ==
                                        document.getElementById('confirmPassword').value) {
                                        document.getElementById('message').style.color = 'green';
                                        document.getElementById("save-btn").disabled = false;
                                        document.getElementById('message').innerHTML = '<div id="divDis" class="animated--grow-in fadeout my-3 p-3 bg-white rounded shadow-sm alert alert-success"><span class="fa fa-check-circle"></span>Password matched</div>';
                                    }
                                    else {
                                        document.getElementById('message').style.color = 'red';
                                        document.getElementById("save-btn").disabled = true;
                                        document.getElementById('message').innerHTML = '<div class="animated--grow-in fadeout my-3 p-3 bg-white rounded shadow-sm alert alert-danger"><span class="fa fa-exclamation-circle"></span>New Password not matching Confirm Password</div>';
                                    }


                                }
                            </script>

                            <div>

                                <span id='message'></span>

                            </div>


                            <div class="mt-5 text-center">
                                <button id="save-btn" name="btn_updatePassword" class="btn btn-primary" type="submit">Update Password</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <?php
    }



    public function viewAvatar($id, $width){
        $UserT = $this->GetUserByID($id);
        $userRows = $this->isUser($id, $UserT[0]['role']);
        if($userRows[0]['avatar'] == ''){
            if($userRows[0]['sex'] == 'MALE'){
                ?>
                <img class="img-profile --rounded-circle" width="<?php echo $width ?>px" src="../assets/img/male.png">
                <?php
            }
            elseif ($userRows[0]['sex'] == 'FEMALE'){
                ?>
                <img class="img-profile --rounded-circle" width="<?php echo $width ?>px" src="../assets/img/female.png">
                <?php
            }
            else{
                ?>
                <img class="img-profile --rounded-circle" width="<?php echo $width ?>px" src="../assets/img/user.png">
                <?php
            }
        }
        else{
            ?>
            <img class="img-profile --rounded-circle" width="<?php echo $width ?>px" height="<?php echo $width ?>px" src="<?php echo $userRows[0]['avatar'] ?>">
            <?php
        }
    }


    public function viewUpdateAvatar($id){
        if(!isset($_GET['setProfileImage'])){
            $width = '150';
            $this->viewAvatar($id, $width);
            ?>
            <div class="shadow-sm myhover">
                <a class="p-2" data-toggle="tooltip" data-placement="right" title="Update Profile Picture" href="?setProfileImage"><span class="ri-camera-switch-fill"></span></a>
                <a class="p-2 text-danger"onclick="return confirm('Are you sure you want to remove this picture?')"  data-toggle="tooltip" data-placement="right" title="Delete Profile Picture" href="../includesDefault/delete.inc.php?delAvatar"><span class="ri-delete-bin-2-fill"></span></a>
            </div>
            <?php
        }
        else{
            ?>
            <div class="animated--grow-in text-dark fadeout -my-3 -p-3 bg-white rounded shadow-sm alert alert-success">
                <span class="animated--grow-in fadeout fa fa-info-circle"></span> <span class="text-xs">Update Image Below</span>
            </div>
            <form method="POST" action="../includesDefault/update.inc.php" enctype="multipart/form-data">
                <div>
                    <input type="file" name="avatar" id="preview" class="form-control text-xs" required>
                </div>
                <br>
                <div>
                    <img style="width: 100%" id="showpreview" src="#" />
                </div>
                <hR>
                <div>
                    <a onclick="history.back(-1)" class="btn btn-sm btn-outline-warning">Cancel <span class="fa fa-times"></span></a>
                    <button name="btn_update_avatar" type="submit" class="btn btn-outline-primary text-xs"><span class="fa fa-camera"></span> Updload</button>
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
            <hr>
            <?php
        }
    }

    public function viewProfileExtended($userID){
        $userView = new Userview();
        ?>

        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">

                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                            <?php
                            $this->viewUpdateAvatar($userID);
                            ?>
                            <h2><?= $_SESSION['name'] .' '. $_SESSION['surname'] ?></h2>
                            <h3><?= $_SESSION['email'] ?></h3>
                            <!--<div class="social-links mt-2">
                                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                            </div>-->
                        </div>
                    </div>

                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                                </li>

                                <!--
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
                                </li>
                                -->

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <?php
                                    $userView->viewProfileOverview($userID);
                                    ?>
                                </div>


                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                    <?php
                                    $this->viewProfile($userID);
                                    ?>
                                </div>


                                <div class="tab-pane fade pt-3" id="profile-change-password">
                                    <!-- Change Password Form -->
                                    <?php
                                    $this->viewChangePassword($userID);
                                    ?>
                                </div>

                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>
            </div>
        </section>
        <?php
    }


    public function viewProfile($id){
        $userRows = $this->isUser($id, $_SESSION['role']);
        $rows = $this->GetUserByID($id);
        ?>
        <div class="--container card-body --card --grid-margin --stretch-card rounded bg-white ">
                <div class="row">
                    <!--<div class="col-md-3">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                            <div class="p-2">
                                <?php
/*                                $this->viewUpdateAvatar($id);
                                */?>
                            </div>
                            <span class="font-weight-bold"><?php /*echo $userRows[0]['name'] .' '. $userRows[0]['surname']   */?></span>
                            <span class="text-black-50"><?php /*echo $userRows[0]['email'] */?></span>
                            <span> </span>
                        </div>
                    </div>-->

                    <div class="col-md-12">
                        <div class="">
                            <div class="d-flex justify-content-between align-items-center experience">
                                <h5>Profile Update <span class="ri-edit-line"></span></h5>
                            </div>
                            <hr>
                            <form class="form" method="post" action="../includesDefault/update.inc.php">
                                <div class="form-row pb-2">
                                    <div class="col-md-10">
                                        <label class="labels">Login-ID</label>
                                        <input name="loginID" type="text" class="form-control" placeholder="New Login-ID..." value="<?php echo $rows[0]['loginID']  ?>" >
                                    </div>
                                </div>

                                <div class="row g-3">
                                    <div class="col-md-5">
                                        <label class="labels">Name</label>
                                        <input name="name" type="text" class="form-control" placeholder="first name" value="<?php echo $userRows[0]['name'] ?>" required>
                                    </div>
                                    <div class="col-md-5">
                                        <label class="labels">Surname</label>
                                        <input name="surname" type="text" class="form-control" value="<?php echo $userRows[0]['surname'] ?>" placeholder="your surname" required>
                                    </div>
                                </div>

                                <div class="form-row">


                                    <div class="col-md-5 pt-2">
                                        <label class="labels">Gender</label>
                                        <select class="form-control form-select" name="sex">
                                            <option value="<?php echo $userRows[0]['sex'] ?>"><?php echo $userRows[0]['sex'] ?></option>
                                            <?php
                                            if($userRows[0]['sex'] == 'MALE'){
                                                ?>
                                                <option value="FEMALE">FEMALE</option>
                                                <option value="PRIVATE">PRIVATE</option>
                                                <?php
                                            }
                                            elseif ($userRows[0]['sex'] == 'FEMALE'){
                                                ?>
                                                <option value="MALE">MALE</option>
                                                <option value="PRIVATE">PRIVATE</option>
                                                <?php
                                            }
                                            else{
                                                ?>
                                                <option value="MALE">MALE</option>
                                                <option value="FEMALE">FEMALE</option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- Fileds here -->
                                <br>
                                <div class="form-row pt-3">
                                    <div class="col-md-10">
                                        <label class="labels">Email</label>
                                        <input name="email" type="email" class="form-control" placeholder="enter your/company email..." value="<?php echo $userRows[0]['email'] ?>">
                                    </div>
                                    <div class="col-md-10">
                                        <label class="labels">Mobile Number</label>
                                        <input name="phone" type="text" class="form-control" placeholder="enter phone number..." value="<?php echo $userRows[0]['phone'] ?>">
                                    </div>
                                    <div class="col-md-10">
                                        <label class="labels">Address</label>
                                        <input name="address" type="text" class="form-control" placeholder="enter your address..." value="<?php echo $userRows[0]['address'] ?>">
                                    </div>
                                </div>
                                <div>
                                    <div class="pt-5 text-center">
                                        <button name="btn_updateProfile" class="btn btn-primary" type="submit">Update Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
        <?php
    }



    public function viewWebPhone(){
        $rows = $this->GetWebDetails();
        echo $rows[0]['phone'];
    }

    public function viewWebFullName(){
        $rows = $this->GetWebDetails();
        echo $rows[0]['webNameFull'];
    }

    public function viewWebShortName(){
        $rows = $this->GetWebDetails();
        echo $rows[0]['webNameShort'];
    }

    public function viewWebLogo(){
        $rows = $this->GetWebDetails();
        echo $rows[0]['webLogo'];
    }





    public function userProfile($id){
        $rows = $this->GetUserByID($id);
        if(count($rows) > 0){
            $userRows = $this->isUser($id, $rows[0]['role']);
            if($rows[0]['status'] == 1){
                $status = 'Active';
                $statusBadge = 'success';
            }
            else{
                $status = 'Not Active';
                $statusBadge = 'danger';
            }
            ?>
            <div class="container card grid-margin stretch-card rounded bg-white mt-4 mb-4">
                <br>
                <div class="card-body">
                <div class="row">
                    <div class="col-md-3 -border-right">
                        <?php
                        $width = '150';
                        $n = new DefaultView();
                        $n->viewAvatar($id, $width);
                        ?>
                        <div class="pt-2" style="font-size: 13px"><strong>Sex: </strong><span><?php echo $userRows[0]['sex'] ?></span></div>
                        <?php
                        if($rows[0]['role'] == 'student'){
                            ?>
                            <hr>
                            <a href="certificates.php?userID=<?= $id ?>" class="btn btn-outline-primary btn-sm"> <span class="ri-article-line"></span> Certificate <span class="bi-arrow-right"></span></a>
                            <br>
                            <br>
                            <a href="studentPayments.php?userID=<?= $_GET['userID'] ?>" class="btn btn-outline-primary btn-sm"> <span class="bx bx-money"></span> Payments <span class="bi-arrow-right"></span></a>
                            <br>
                            <br>
                            <a href="enroll.php?userID=<?= $_GET['userID'] ?>" class="btn btn-outline-success btn-buy btn-sm">Enroll New Certificate <span class="bx bx-user-plus"></span></a>
                            <br>
                            <br>
                            <a href="studentResults.php?userID=<?= $_GET['userID'] ?>" class="btn btn-outline-primary btn-buy btn-sm">Results <span class="bx bx-paper-plane"></span></a>
                            <?php
                        }
                        ?>
                        <hr>

                        <div>
                            <a href="messages.php?userID=<?= $id ?>&activeID=<?= $_SESSION['id'] ?>"><span class="fa fa-comment"> MESSAGE</span></a>
                        </div>

                    </div>
                    <div class="col-md-5 border-start">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                            <div class="pb-3" style="font-size: 13px"><strong>Full Name: </strong><span><?php echo $userRows[0]['name'];  if($rows == 'student'){ echo ' '. $userRows[0]['secondName'];  } echo ' '. $userRows[0]['surname'] ?></span></div>
                            <?php if($rows[0]['role'] == 'student'){ ?><div class="pb-3" style="font-size: 13px"><strong>Date Of Birth: </strong><span><?php echo $this->dateToMonth($userRows[0]['dob']) ?></span></div> <?php } ?>
                            <div class="pb-3" style="font-size: 13px"><strong>National ID: </strong><span><?php echo $userRows[0]['nationalID'] ?></span></div>
                            <?php if($rows[0]['role'] == 'student'){ ?> <div class="pb-3" style="font-size: 13px"><strong>Nationality: </strong><span><?php echo $userRows[0]['nationality'] ?></span></div> <?php } ?>
                            <div class="pb-3" style="font-size: 13px"><strong>LoginID: </strong><span><?php echo $rows[0]['loginID'] ?></span></div>
                            <?php if($rows[0]['role'] == 'student'){ ?> <div class="pb-3" style="font-size: 13px"><strong>Student ID: </strong><span><?php echo $userRows[0]['studentID'] ?></span></div> <?php } ?>
                            <div class="pb-3" style="font-size: 13px"><strong>Account Type: </strong><span><?php echo $rows[0]['role'] ?> Account</span></div>
                            <div class="pb-3" style="font-size: 13px"><strong>Email Address: </strong><span><a href="mailto: <?php echo $userRows[0]['email'] ?>"><?php echo $userRows[0]['email'] ?></a></span></div>
                            <div class="pb-3" style="font-size: 13px"><strong>Phone Number: </strong><span><?php echo $userRows[0]['phone'] ?></span></div>
                            <div class="pb-3" style="font-size: 13px"><strong>Address: </strong><span><?php echo $userRows[0]['address'] ?></span></div>
                            <?php if($rows[0]['role'] == 'student'){ ?>
                            <div class="pb-3" style="font-size: 13px"><strong>Is Current Student: </strong>
                                <span><?php
                                    if($userRows[0]['stillStudent'] == 1 ){
                                        $isStudent = 'Yes';
                                        echo 'Yes';
                                    }else{
                                        $isStudent = 'No';
                                        echo 'No';
                                    }
                                    ?></span>
                            </div>
                            <?php } ?>
                            <div class="pb-3" style="font-size: 13px"><strong>Last Login: </strong>
                                <span>
                                    <?php
                                    if($rows[0]['lastLogin'] == ''){
                                        echo 'Never Logged In';
                                    }else{
                                        echo $this->dateTimeToDay($rows[0]['lastLogin']) .' ('. $this->timeAgo($rows[0]['lastLogin']) .')';
                                    }
                                    ?>
                                </span>
                            </div>
                            <div class="pb-3" style="font-size: 13px"><strong>Date Joined: </strong><span><?php echo $this->dateToDay($rows[0]['joined']) ?> (<?php echo $this->timeAgo($rows[0]['joined']) ?>)</span></div>
                            <div class="pb-3" style="font-size: 13px"><strong>Account Status: </strong><span class="text text-<?php echo $statusBadge ?>"><?php echo $status ?></span></div>
                            <div class="pb-3" style="font-size: 13px"><strong>Password: </strong><span><?php
                                    if($rows[0]['password'] == ''){
                                        ?>
                                        <span class="fa fa-times-circle text-danger"> Not Set</span>
                                        <?php
                                    }
                                    else{
                                        ?>
                                        <span class="fa fa-check-circle text-success"> Set</span>
                                        <?php
                                    }
                                    ?></span></div>
                        </div>
                        <?php if($rows[0]['role'] == 'student'){ ?>
                            <div class="text-center">
                                <a href="updateStudentProfile.php?userID=<?= $id ?>" class="btn btn-sm btn-outline-dark">Update User Profile</a>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="col-md-4 border-start">
                        <?php
                        //IF FETCHED ACCOUNT IS THE CURRENT LOGGED-IN ACCOUNT, HIDE THE STATUS AND DELETE ACCOUNT OPTIONS
                        if($_SESSION['id'] != $id){
                            ?>
                            <div>
                                <form method="POST" action="../includesDefault/update.inc.php">
                                    <span style="font-size: 13px">Account Status </span> : <span class="badge badge-<?php echo $statusBadge ?>"><?php echo $status ?></span>
                                    <div class="pb-1">
                                        <input name="userID" value="<?php echo $id ?>" hidden>
                                        <select name="status" class="form-control form-select">
                                            <option value="<?php echo $rows[0]['status']  ?>"><?php echo $status ?> (current)</option>
                                            <?php
                                            if($rows[0]['status'] == 1){
                                                ?>
                                                <option value="0">DeActivate</option>
                                                <?php
                                            }
                                            else{
                                                ?>
                                                <option value="1">Activate</option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <button type="submit" name="btn_update_user_status" class="btn btn-primary btn-sm">Update</button>
                                </form>
                            </div>

                            <?php if($rows[0]['role'] == 'student'){ ?>
                                    <hr>
                            <div>
                                <form method="POST" action="../includesDefault/update.inc.php">
                                    <span style="font-size: 13px">Is Current Student </span> : <span class="badge badge-<?php echo $statusBadge ?>"><?php echo $status ?></span>
                                    <div class="pb-1">

                                        <input name="userID" value="<?php echo $id ?>" hidden>
                                        <select name="isStillStudent" class="form-control form-select">
                                            <option value="<?php echo $userRows[0]['stillStudent']  ?>"><?php echo $isStudent ?> (current)</option>
                                            <?php
                                            if($userRows[0]['stillStudent'] == 1){
                                                ?>
                                                <option value="0">No</option>
                                                <?php
                                            }
                                            else{
                                                ?>
                                                <option value="1">Yes</option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <button type="submit" name="btn_update_isStillStudent" class="btn btn-primary btn-sm">Update</button>
                                </form>
                            </div>
                                <?php } ?>

                            <hr>
                            <div>
                                <label>Reset User Password</label><br>
                                <a onclick="return confirm('Are you sure you want to reset user password?')" href="../includesDefault/update.inc.php?resetPass&userID=<?php echo $id ?>" class="btn btn-outline-primary"> Reset User Password</a>
                            </div>


                            <hr>
                            <div>
                                <label>Delete User Account</label><br>
                                <a style="font-size: 18px" class="nav-link" onclick="return confirm('This Account and all data related to this account will be permanently deleted. Continue?')" id="profile-tab" -data-bs-toggle="tab" href="../includesDefault/delete.inc.php?delUser&userID=<?php echo $_GET['userID'] ?>" role="tab" aria-selected="false"><span class="btn btn-outline-danger fa fa-trash">PERMANENTLY DELETE <span class="fa fa-trash"></span> </span></a>
                            </div>
                            <?php
                        }
                        ?>

                    </div>
                </div>
                </div>
            </div>
            <?php
        }
        else{
            ?>
            <div class="container card-body card grid-margin stretch-card rounded bg-white mt-4 mb-4">
                <div class="row">

                    <div class="col-md-12 -border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                            <span class="fa fa-exclamation-triangle"></span> Account Not Found
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }

    public function CountView($query){
        $rows = $this->GetCountView($query);
        echo count($rows);
    }

    public function ViewAllUsers($limit, $query){
        $pegging = new PignationView();
        $pegging->allUsers($limit, $query);
    }

}