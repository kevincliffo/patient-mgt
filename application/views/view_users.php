        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Users</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><?php echo anchor('dashboard', 'Home');?></li>
                                <li class="breadcrumb-item active">Users</li>
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
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Users Table</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>User Name</th>
                                                <th>Email</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>User Type</th>
                                                <th>ID Number</th>
                                                <th>Mobile</th>
                                                <th>Profile</th>                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($users as $user){;?>
                                                <tr>
                                                    <td><?php echo $user['UserId'];?></td>
                                                    <td><?php echo $user['UserName'];?></td>
                                                    <td><?php echo $user['Email'];?></td>
                                                    <td><?php echo $user['FirstName'];?></td>
                                                    <td><?php echo $user['LastName'];?></td>
                                                    <td><?php echo $user['UserType'];?></td>
                                                    <td><?php echo $user['IDNumber'];?></td>
                                                    <td><?php echo $user['MobileNo'];?></td>
                                                    <td><?php echo anchor('users/user-profile/'.$user['UserId'], 'View Profile');?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>id</th>
                                                <th>User Name</th>
                                                <th>Email</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>User Type</th>
                                                <th>ID Number</th>
                                                <th>Mobile</th>
                                                <th>Profile</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->