<style type="text/css">
.opensans{
              font-family: 'Open Sans', sans-serif;}
</style>
<link href="<?=base_url()?>/assets/css/jquery.dataTables1.css" rel="stylesheet">
<div class="pageheader">
    <h2>User List</h2>
    <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>">Home</a></li>
          <li class="active">User List</li>
        </ol>
    </div>
</div>
<div class="contentpanel">
       <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped mb30" id="searchTable" cellspacing="0" width="100%" class="opensans">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Email</th> 
                                    <th>Address</th>   
                                    <th>Status</th>                                  
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach($user_list as $users)
                                {
                                    $status = "Not Authorized";
                                    if ($users['status'] == 0) {
                                        $status = "Not Authorized";
                                    }
                                    else if ($users['status'] == 1) {
                                        $status = "Active";
                                    }
                                    else{
                                        $status = "Deactivated";
                                    }
                            ?>
                            <tr>
                                <td></td>
                                <td><?php echo $users['userFirstName'];?></td>
                                <td><?php echo $users['userEmail'];?></td>
                                <td><?php echo $users['userAddress'];?></td>
                                <td><?php echo $status;?></td>
                                <td>                
                                    <?php
                                    if ($users['status'] == 0) {
                                    ?>
                                    <a href="<?php echo base_url().'users/authorize_users/'.$users['userID'].'/authorize'?>"class="btn btn-xs btn-danger">Authorize</a>
                                    <?php
                                    }
                                    else if ($users['status'] == 1) {
                                    ?>
                                    <a href="<?php echo base_url().'users/authorize_users/'.$users['userID'].'/deactivate'?>"class="btn btn-xs btn-primary">Deactivate</a>
                                    <?php
                                    }
                                    else if ($users['status'] == 2) {
                                    ?>
                                        <a href="<?php echo base_url().'users/authorize_users/'.$users['userID'].'/activate'?>"class="btn btn-xs btn-success">Activate</a>
                                    <?php
                                    }
                                    ?>                                     
                                    
                                    
                                    
            
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div><!-- table-responsive -->
                </div><!-- col-md-12 -->
            </div><!-- row -->
        </div><!-- panel body -->
    </div><!-- panel -->
</div><!-- contentpanel -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script src="<?=base_url()?>assets/js/jquery.js"></script>
<script src="<?=base_url()?>assets/js/jquery.dataTables.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
        var t = $('#searchTable').DataTable( {
            "columnDefs": [ {
                "searchable": false,
                "orderable": false,
                "targets": 0
            } ],
            "order": [[ 1, 'asc' ]]
        } );
     
        t.on( 'order.dt search.dt', function () {
            t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();
    } );
    
</script>

 
