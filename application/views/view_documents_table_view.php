        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Documents</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                                <li class="breadcrumb-item active">Documents</li>
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
                                    <h3 class="card-title">Documents Table</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Document Id</th>
                                                <th>Document Name</th>
                                                <th>Document Type</th>
                                                <th>Document File</th>
                                                <th>Owner</th>
                                                <th>Description</th>
                                                <th>Uploaded By</th>
                                                <th>Uploaded Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($documents as $document){;?>
                                                <tr>
                                                    <td><?php echo $document['DocumentId'];?></td>
                                                    <td><?php echo $document['DocumentName'];?></td>
                                                    <td><?php echo $document['DocumentType'];?></td>
                                                    <td><?php echo $document['DocumentFileUrl'];?></td>
                                                    <td><?php echo $document['Owner'];?></td>
                                                    <td><?php echo $document['Description'];?></td>
                                                    <td><?php echo $document['UploadedBy'];?></td>
                                                    <td><?php echo $document['UploadedDate'];?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Document Id</th>
                                                <th>Document Name</th>
                                                <th>Document Type</th>
                                                <th>Document File</th>
                                                <th>Owner</th>
                                                <th>Description</th>
                                                <th>Uploaded By</th>
                                                <th>Uploaded Date</th>
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