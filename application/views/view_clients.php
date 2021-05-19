        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Clients</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                                <li class="breadcrumb-item active">Clients</li>
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
                                    <h3 class="card-title">Clients Table</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Telephone</th>
                                                <th>Client Type</th>
                                                <th>Contact Person</th>
                                                <th>Contact Person Email</th>
                                                <th>Contact Person Telephone</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($clients as $client){;?>
                                                <tr>
                                                    <td><?php echo $client['ClientId'];?></td>
                                                    <td><?php echo $client['CompanyName'];?></td>
                                                    <td><?php echo $client['CompanyEmail'];?></td>
                                                    <td><?php echo $client['CompanyTelephone'];?></td>
                                                    <td><?php echo $client['ClientType'];?></td>
                                                    <td><?php echo $client['ContactPersonName'];?></td>
                                                    <td><?php echo $client['ContactPersonEmail'];?></td>
                                                    <td><?php echo $client['ContactPersonTelephone'];?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>id</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Telephone</th>
                                                <th>Client Type</th>
                                                <th>Contact Person</th>
                                                <th>Contact Person Email</th>
                                                <th>Contact Person Telephone</th>
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