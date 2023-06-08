
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="?logout=true">Logout</a>
            </div>
        </div>
    </div>
</div>





<!-- Add User Modal -->
<div class="modal fade" id="addAdminModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="post" action="../includesDefault/add.inc.php">
                <div class="modal-body">
                    <div class="-modal-header">
                        <h5>Add New Admin Account</h5>
                    </div>
                    <hr>
                    <div class="form-row row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4" class="col-form-label">LoginID</label>
                            <input name="loginID" type="text" class="form-control" placeholder="Loggin ID" pattern=".{5,20}" required title="5 to 12 characters">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4" class="col-form-label">National ID (xx-xxxxxxxx)</label>
                            <input name="nationalID" type="text" class="form-control" placeholder="NationalID" pattern=".{10,15}" minlength="10" maxlength="15" required title="should be between 10 to 15 characters">
                        </div>
                    </div>



                    <div class="form-row row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4" class="col-form-label">Name</label>
                            <input name="name" type="text" class="form-control" placeholder="User First Name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label  class="col-form-label">Surname</label>
                            <input name="surname" type="text" class="form-control" placeholder="User Surname" value="" -pattern=".{5,12}" required -title="5 to 12 characters" >
                        </div>
                    </div>

                    <input name="userType" value="admin" hidden>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4" class="col-form-label">Admin Access Level</label>
                            <select class="form-control" name="accessLevel" required>
                                <option value="">-- SELECT USER ROLE --</option>
                                <option value="1">Top Admin</option>
                                <option value="2">Basic Admin</option>
                                <?php
/*                                $n = new DefaultView();
                                $n->userRolesLoop();
                                */?>
                            </select>
                        </div>
                    </div>
                    <span>Note: Password will be set when the user wants to login</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button name="btn_addUser" type="submit"  class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

