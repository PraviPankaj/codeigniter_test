<div class="pageheader">
    <h2>Profile edit</h2>
    <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>">Home</a></li>
          <li class="active">Profile edit</li>
        </ol>
    </div>
</div>
<div class="contentpanel">
    <div class="panel panel-default">
        <div class="panel-body">
            <form role="form" id="updateUserForm" action="<?php echo base_url();?>users/profile_edit" method="post">
                <?=display_form_message('updateUserForm')?>

                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="userFirstName">Name</label>
                            <input type="text" class="form-control"  name="userFirstName" id="userFirstName" value="<?=$users['userFirstName']?>" placeholder="Enter user" >
                        </div> 
                    </div>
                   <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="userPassword">Password</label>     
                            <input type="text" class="form-control"  name="userPassword" id="userPassword" value="<?=$users['userPassword']?>" placeholder="Enter code" >
                        </div>  
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="userEmail">Email</label>     
                            <input type="text" class="form-control"  name="userEmail" id="userEmail" value="<?=$users['userEmail']?>" readonly>
                        </div>  
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="userAddress">Address</label>     
                            <textarea class="form-control" name="userAddress" placeholder="Enter your address" ><?=$users['userAddress']?></textarea> 
                        </div>  
                    </div>                 
                </div>                                   
                                  
                <div class="panel-footer">
                    <button type="submit" class="btn btn-primary" name="add">Update</button>
                    <a href="<?=base_url()?>users" class="btn btn-sm btn-link">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>