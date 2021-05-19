        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Add Client</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                                <li class="breadcrumb-item active">Add Client</li>
                            </ol>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="card card-secondary col-md-6">
                            <div class="card-header">
                                <h3 class="card-title">Add Client Form</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="add-client" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div class="form-group">
                                            <label for="companyEmail">Company Email</label>
                                            <input type="text" class="form-control" id="companyEmail" name="companyEmail" placeholder="Company Email">
                                        </div>
                                        <div class="form-group">
                                            <label for="companyTelephone">Company Telephone</label>
                                            <input type="text" class="form-control" id="companyTelephone" name="companyTelephone" placeholder="Company Telephone">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="companyName">Company Name</label>
                                        <input type="text" class="form-control" id="companyName" name="companyName" placeholder="Company Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="clientType">Client Type</label>
                                        <select class="form-control" id="clientType" name="clientType">
                                            <option selected="selected" disabled>Select Client Type</option>
                                            <option value="Company">Company</option>
                                            <option value="Individual">Individual</option>
                                        </select>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="form-group">
                                            <label for="contactPersonName">Contact Person Name</label>
                                            <input type="text" class="form-control" id="contactPersonName" name="contactPersonName" placeholder="Contact Person Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="contactPersonEmail">Contact Person Email</label>
                                            <input type="email" class="form-control" id="contactPersonEmail" name="contactPersonEmail" placeholder="Contact Person Email">
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="form-group">
                                            <label for="mobileNo">Mobile No</label>
                                            <input type="number" class="form-control" id="mobileNo" name="mobileNo" placeholde="Mobile No">
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <textarea name="address" class="form-control" id="address" cols="20" rows="3" placeholder="Address"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->