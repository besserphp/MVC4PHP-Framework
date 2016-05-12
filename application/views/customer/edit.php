        <div id="page-wrapper">
	<br>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="<?php if(isset($this->customers->id)) { echo URL . 'CustomerController/updateAction';} else { echo URL . 'CustomerController/addAction'; } ?>" method="POST">                                       
                                        <?php 
                                        //CustomerController wird autoatish erzeugz wie $this->customers->id
                                        $more=false;
                                        if(isset($this->customers->id)) {
                                        $more = 'CustomerController/moreAction/'. $this->customers->id;
                                        }
                                        if($_GET['url'] == $more) { 
                                            ?>
                                                <a class="btn btn-default" href="<?php echo URL . 'CustomerController/editAction/' . htmlspecialchars($this->customers->id); ?>">
                                                        <em class="glyphicon glyphicon-edit">Bearbeiten</em>
                                                </a>
                                                <a class="btn btn-default" href="<?php echo URL . 'CustomerController/deleteAction/' . htmlspecialchars($this->customers->id); ?>">
                                                        <em class="glyphicon glyphicon-trash">Entfernen</em>
                                                </a>												
                                            <?php 	
                                            $more = true; 
                                        }
                                        ?>
                                        <div class="form-group">								
                                                <label>Id:</label>	         
                                                <input type="text" class="form-control" name="id" placeholder="Enter Id" value="<?php if(isset($this->customers->id)) { echo htmlspecialchars($this->customers->id); } ?>" <?php if($_GET['url'] == $more) { echo 'disabled=""'; } ?> />
                                        </div>        

                                        <div class="form-group">								
                                                <label>Firma:</label>	         
                                                <input type="text" class="form-control" name="firma" placeholder="Enter Firma" value="<?php if(isset($this->customers->firma)) { echo htmlspecialchars($this->customers->firma); } ?>" <?php if($_GET['url'] == $more) { echo 'disabled=""'; } ?> />
                                        </div>        

                                        <div class="form-group">								
                                                <label>Firstname:</label>	         
                                                <input type="text" class="form-control" name="firstname" placeholder="Enter Firstname" value="<?php if(isset($this->customers->firstname)) { echo htmlspecialchars($this->customers->firstname); } ?>" <?php if($_GET['url'] == $more) { echo 'disabled=""'; } ?> />
                                        </div>        

                                        <div class="form-group">								
                                                <label>Lastname:</label>	         
                                                <input type="text" class="form-control" name="lastname" placeholder="Enter Lastname" value="<?php if(isset($this->customers->lastname)) { echo htmlspecialchars($this->customers->lastname); } ?>" <?php if($_GET['url'] == $more) { echo 'disabled=""'; } ?> />
                                        </div>        

                                        <div class="form-group">								
                                                <label>Status:</label>	         
                                                <input type="text" class="form-control" name="status" placeholder="Enter Status" value="<?php if(isset($this->customers->status)) { echo htmlspecialchars($this->customers->status); } ?>" <?php if($_GET['url'] == $more) { echo 'disabled=""'; } ?> />
                                        </div>        

                                        <div class="form-group">								
                                                <label>Contact:</label>	         
                                                <input type="text" class="form-control" name="contact" placeholder="Enter Contact" value="<?php if(isset($this->customers->contact)) { echo htmlspecialchars($this->customers->contact); } ?>" <?php if($_GET['url'] == $more) { echo 'disabled=""'; } ?> />
                                        </div>        
                                    
                                        <?php if(isset($this->customers->id) && !empty($this->customers->id)) { ?>
                                            <button type="submit" class="btn btn-default" name="submit_update_data" value="Update">
                                                <span class="glyphicon glyphicon-floppy-save" aria-hidden="true">Update</span>
                                            </button>   
                                        <?php } else { ?>
                                            <button type="submit" class="btn btn-default" name="submit_add_data" value="Add">
                                                <span class="glyphicon glyphicon-floppy-save" aria-hidden="true">Add</span>
                                            </button> 
                                        <?php } ?>				
                                    </form>
                                </div><!-- /.col-lg-12 -->
                            </div><!-- /.row (nested) -->                                   
                        </div><!-- /.panel-body -->
                    </div><!-- /.panel default-->
                </div><!-- /.col-lg-12 -->
            </div><!-- /.row -->
        </div><!-- /#page-wrapper -->