        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Clinics</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                                <li class="breadcrumb-item active">Clinics</li>
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
                                    <h3 class="card-title">Clinics Table</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Name</th>
                                                <th>Manager</th>
                                                <th>Location</th>
                                                <th>Telephone</th>
                                                <th>Created Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($clinics as $clinic){;?>
                                                <tr>
                                                    <td><?php echo $clinic['ClinicId'];?></td>
                                                    <td><?php echo $clinic['Name'];?></td>
                                                    <td><?php echo $clinic['Manager'];?></td>
                                                    <td><?php echo $clinic['Location'];?></td>
                                                    <td><?php echo $clinic['PhoneNumber'];?></td>
                                                    <td><?php echo $clinic['CreatedDate'];?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>id</th>
                                                <th>Name</th>
                                                <th>Manager</th>
                                                <th>Location</th>
                                                <th>Telephone</th>
                                                <th>Created Date</th>
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