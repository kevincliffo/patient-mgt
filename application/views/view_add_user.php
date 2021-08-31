        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Add User</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><?php echo anchor('dashboard', 'Home');?></li>
                                <li class="breadcrumb-item active">Add User</li>
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
                                <h3 class="card-title">Add User Form</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="add-user" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div class="form-group">
                                            <label for="firstName">First Name</label>
                                            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="lastName">Last Name</label>
                                            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name">
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="form-group">
                                            <label for="userType">User Type</label>
                                            <select class="form-control" id="userType" name="userType">
                                                <option selected="selected" disabled>Select User Type</option>
                                                <option value="Admin">Admin</option>
                                                <option value="User">User</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="userName">User Name</label>
                                            <input type="text" class="form-control" id="userName" name="userName" placeholder="Username">
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="form-group">
                                            <label for="idNumber">ID Number</label>
                                            <input type="number" class="form-control" id="idNumber" name="idNumber" placeholder="ID Number">
                                        </div>
                                        <div class="form-group">
                                            <label for="mobileNo">Mobile No</label>
                                            <input type="number" class="form-control" id="mobileNo" name="mobileNo" placeholder="Mobile No">
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="form-group">
                                            <label for="gender">Gender</label>
                                            <select class="form-control" id="gender" name="gender">
                                                <option selected="selected" disabled>Select Gender</option>
                                                <option value="FEMALE">FEMALE</option>
                                                <option value="MALE">MALE</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Date of Birth:</label>
                                            <div class="input-group date" id="dob" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" name="dob" data-target="#dob"/>
                                                <div class="input-group-append" data-target="#dob" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                    
                                    <div class="d-flex justify-content-between">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                                        </div>
                                        <div class="form-group">
                                            <label for="location">Location</label>
                                            <input type="text" class="form-control" id="location" name="location" placeholder="Location">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="underlyingCondition">Underlying Condition</label>
                                        <input type="text" class="form-control" id="underlyingCondition" name="underlyingCondition" placeholder="Underlying Condition">
                                    </div>
                                    <div class="form-group">
                                        <label for="profileImage">Profile Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="profileImage" name="profileImage">
                                                <label class="custom-file-label" for="exampleInputFile">Select Profile Image</label>
                                            </div>
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