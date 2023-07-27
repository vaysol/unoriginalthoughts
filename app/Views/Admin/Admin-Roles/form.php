<div class="container-fluid row">
    <?php if ( isset($admin_role)) 
    {
        foreach ($admin_role as  $data) {} ?>
        <h2>Edit Admin role</h2> <?php 
    } 
    else 
    { ?>
        <h2> Add Admin Role</h2> <?php 
    } ?>

    <div class="row">
        <div class="col-md-9">
            <form action="<?php echo base_url('/admin/admin-role/save') ?>/" class="was-validated1 row" method="POST" enctype="multipart/form-data">
                
                <div class="mb-3 col-md-4" hidden>
                    <label for="role_id" class="form-label">Id:</label>
                    <input value="<?php if (!empty($data['role_id'])) {
                                        echo $data['role_id'];
                                    } ?>" type="text" class="form-control" id="role_id" placeholder="Id" name="role_id">
                    <p class="admin_role_error" id="admin_role_id_validate"></p>
                </div>
                
                <div class="mb-3 col-md-4">
                    <label for="role_name" class="form-label">Role Name</label>
                    <input required value="<?php if (!empty($data['role_name'])) { echo $data['role_name'];  }?>" type="text" class="form-control" id="role_name" placeholder="Enter Role Name" name="role_name">
                    <p class="admin_user_error" id="admin_role_name_validate"></p>
                </div>

                <div>
                    <button type="submit"  class="btn btn-success">Submit</button>
                </div>


            </form>
        </div>
    </div>
</div>
