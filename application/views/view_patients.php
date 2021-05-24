        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Patients</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                                <li class="breadcrumb-item active">Patients</li>
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
                                    <h3 class="card-title">Patients Table</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>ID Number</th>
                                                <th>Gender</th>
                                                <th>Patient Type</th>
                                                <th>Date of Birth</th>
                                                <th>Mobile</th>
                                                <th>Image</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($patients as $patient){;?>
                                                <tr>
                                                    <td><?php echo $patient['PatientId'];?></td>
                                                    <td><?php echo $patient['FirstName'];?></td>
                                                    <td><?php echo $patient['LastName'];?></td>
                                                    <td><?php echo $patient['Email'];?></td>
                                                    <td><?php echo $patient['IDNumber'];?></td>
                                                    <td><?php echo $patient['Gender'];?></td>
                                                    <td><?php echo $patient['PatientType'];?></td>
                                                    <td><?php echo $patient['DOB'];?></td>
                                                    <td><?php echo $patient['MobileNo'];?></td>
                                                    <td><?php echo $patient['PatientImage'];?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>id</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>ID Number</th>
                                                <th>Gender</th>
                                                <th>Patient Type</th>
                                                <th>Date of Birth</th>
                                                <th>Mobile</th>
                                                <th>Image</th>
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