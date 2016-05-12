        <div id="page-wrapper">
	    <br>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example"> 
                                    <thead>
                                        <tr>
                                            <th>Firma</th>
                                            <th>Firstname</th>
                                            <th>Lastname</th>
                                            <th>Actions</th>
                                         </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($this->customers as $datahtml) { ?>
                                            <tr class="odd gradeX">
                                                <td><?php if (isset($datahtml->firma)) echo htmlspecialchars($datahtml->firma); ?></td>
                                                <td><?php if (isset($datahtml->firstname)) echo htmlspecialchars($datahtml->firstname); ?></td>
                                                <td><?php if (isset($datahtml->lastname)) echo htmlspecialchars($datahtml->lastname); ?></td>
                                            <td>
                                                <a class="btn btn-default" href="<?php echo URL . 'CustomerController/addAction/' . htmlspecialchars($datahtml->id); ?>">
                                                    <em class="glyphicon glyphicon-plus"></em>
                                                </a>                        
                                                <a class="btn btn-default" href="<?php echo URL . 'CustomerController/editAction/' . htmlspecialchars($datahtml->id); ?>">
                                                    <em class="glyphicon glyphicon-edit"></em>
                                                </a>
                                                <a class="btn btn-default" href="<?php echo URL . 'CustomerController/deleteAction/' . htmlspecialchars($datahtml->id); ?>">
                                                    <em class="glyphicon glyphicon-trash"></em>
                                                </a>                           
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div><!-- /.dataTable_wrapper -->
                            <div class="well">
                                <h4>DataTables Usage Information</h4>
                                <p>DataTables is a very flexible, advanced tables plugin for jQuery. In SB Admin, we are using a specialized version of DataTables built for Bootstrap 3. We have also customized the table headings to use Font Awesome icons in place of images. For complete documentation on DataTables, visit their website at <a target="_blank" href="https://datatables.net/">https://datatables.net/</a>.</p>
                                <a class="btn btn-default btn-lg btn-block" target="_blank" href="https://datatables.net/">View DataTables Documentation</a>
                            </div>
                        </div><!-- /.panel-body -->
                    </div><!-- /.panel -->
                </div><!-- /.col-lg-12 -->
            </div><!-- /.row -->
        </div><!-- /#page-wrapper -->