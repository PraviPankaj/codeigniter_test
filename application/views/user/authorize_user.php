<div class="pageheader">
    <h2>User Status Change</h2>
    <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>">Home</a></li>
          <li class="active">User Status Change</li>
        </ol>
    </div>
</div>
<div class="contentpanel">
    <div class="panel panel-default">
        <div class="panel-body">
            <form role="form" id="deleteUsersForm" action="<?php echo base_url();?>users/authorize_users/<?php echo $users['userID'];?>/<?php echo $change_status;?>" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" name="userID" value="<?php echo $users['userID'];?>" />
                        <input type="hidden" name="confirmAuthorize" value="1">  
                        <?php
                        if ($change_status == 'authorize') {
                        ?>
                            <p>Authorize user</p>
                        <?php
                        }
                        else if ($change_status == 'deactivate') {
                        ?>
                            <p>Deactivate user</p>
                        <?php
                        }
                        else if ($change_status == 'activate') {
                        ?>
                            <p>Activate user</p>
                        <?php
                        }
                        ?>     
                        
                    </div>
                </div>
                <div class="mt10">
                    <button type="submit" class="btn btn-primary" name="authorize">Update</button>
                    <a href="<?=base_url()?>users" class="btn btn-sm btn-link">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>