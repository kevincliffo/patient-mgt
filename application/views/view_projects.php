        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Projects</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                                <li class="breadcrumb-item active">Projects</li>
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
                                    <h3 class="card-title">Projects Table</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Project Number</th>
                                                <th>Project Type</th>
                                                <th>Project File</th>
                                                <th>Client</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Assigned To</th>
                                                <th>Created Date</th>
                                                <th>Finished Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($projects as $project){;?>
                                                <tr>
                                                    <td><?php echo $project['ProjectId'];?></td>
                                                    <td><?php echo $project['ProjectNumber'];?></td>
                                                    <td><?php echo $project['ProjectType'];?></td>
                                                    <td><?php echo $project['ProjectFileUrl'];?></td>
                                                    <td><?php echo $project['Client'];?></td>
                                                    <td><?php echo $project['Description'];?></td>
                                                    <td><?php echo $project['Status'];?></td>
                                                    <td><?php echo $project['AssignedTo'];?></td>
                                                    <td><?php echo $project['CreatedDate'];?></td>
                                                    <td><?php echo $project['FinishedDate'];?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>id</th>
                                                <th>Project Number</th>
                                                <th>Project Type</th>
                                                <th>Project File</th>
                                                <th>Client</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Assigned To</th>
                                                <th>Created Date</th>
                                                <th>Finished Date</th>
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