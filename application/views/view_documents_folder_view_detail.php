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
                    <div class="row list-display">
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Date Modified</th>
                                        <th>Type</th>
                                        <th>Size</th>
                                    </tr>
                                </thead>
                                <tbody>                    
                                    <?php foreach($files as $file){;?>
                                        <div class="col-md-2">
                                            <div class="">
                                                <div class="">
                                                    <?php if($file->getIsFile()){?>
                                                        <tr>
                                                            <td>
                                                                <i style="font-size:12px;<?php echo $file->getIconColour();?>" class="<?php echo $file->getIconClass();?>"></i>
                                                                <a href="javascript:void(0)" target="_new" onclick="location.href='<?php echo $file->getUrl();?>'"><span class="sm" style="font-family:segoe ui"><?php echo $file->getName();?></span></a>
                                                            </td>
                                                            <td><?php echo $file->getLastModifiedTime();?></td>
                                                            <td><?php echo $file->getExtension();?></td>
                                                            <td><?php echo $file->getSize();?></td>
                                                        </tr>
                                                    <?php } else {?>
                                                        <?php
                                                            $this->session->set_userdata('folder_path', dirname($file->getUrl()));
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <i style="font-size:12px;<?php echo $file->getIconColour();?>" class="<?php echo $file->getIconClass();?>"></i>
                                                                <a href="javascript:void(0)" onclick="location.href='folder-structure'"><span class="sm"><?php echo $file->getName();?></span></a>
                                                            </td>
                                                            <td></td>
                                                            <td>Folder</td>
                                                            <td><?php echo $file->getSize();?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Date Modified</th>
                                        <th>Type</th>
                                        <th>Size</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>                        
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->