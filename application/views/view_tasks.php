        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Tasks</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><?php echo anchor('dashboard', 'Home');?></li>
                                <li class="breadcrumb-item active">Tasks</li>
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
                                    <h3 class="card-title">Tasks Table</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Task Number</th>
                                                <th>Task Type</th>
                                                <th>Task File</th>
                                                <th>Client</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Assigned To</th>
                                                <th>Created Date</th>
                                                <th>Finished Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($tasks as $task){;?>
                                                <tr>
                                                    <td><?php echo $task['TaskId'];?></td>
                                                    <td><?php echo $task['TaskNumber'];?></td>
                                                    <td><?php echo $task['TaskType'];?></td>
                                                    <td><?php echo $task['TaskFileUrl'];?></td>
                                                    <td><?php echo $task['Client'];?></td>
                                                    <td><?php echo $task['Description'];?></td>
                                                    <td><?php echo $task['Status'];?></td>
                                                    <td><?php echo $task['AssignedTo'];?></td>
                                                    <td><?php echo $task['CreatedDate'];?></td>
                                                    <td><?php echo $task['FinishedDate'];?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>id</th>
                                                <th>Task Number</th>
                                                <th>Task Type</th>
                                                <th>Task File</th>
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