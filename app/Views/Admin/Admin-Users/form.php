<div class="container-fluid row">
    <?php if ( isset( $admin_user)) 
    {
        foreach ($admin_user as  $data) {} ?>
        <h2>Edit Admin User</h2> <?php 
    } 
    else 
    { ?>
        <h2> Add Admin User</h2> <?php 
    } ?>

    <div class="row">
        <div class="col-md-9">
            <form action="<?php echo base_url('/admin/admin-user/save') ?>/" class="was-validated1 row" method="POST" enctype="multipart/form-data">
                
                <div class="mb-3 col-md-4" hidden>
                    <label for="user_id" class="form-label">Id:</label>
                    <input value="<?php if (!empty($data['user_id'])) {
                                        echo $data['user_id'];
                                    } ?>" type="text" class="form-control" id="user_id" placeholder="Id" name="user_id">
                    <p class="admin_user_error" id="admin_user_id_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="first_name" class="form-label">First Name:</label>
                    <input required value="<?php if (!empty($data['first_name'])) { echo $data['first_name'];  }?>" type="text" class="form-control" id="first_name" placeholder="Enter First Name" name="first_name">
                    <p class="admin_user_error" id="admin_first_name_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="last_name" class="form-label">Last Name:</label>
                    <input required value="<?php if (!empty($data['last_name'])) { echo $data['last_name']; } ?>" type="text" class="form-control" id="last_name" placeholder="Enter Last Name" name="last_name">
                    <p class="admin_user_error" id="admin_last_name_validate"></p>
                </div>

                
                <div class="mb-3 col-md-4">
                    <label for="email" class="form-label">Email:</label>
                    <input required value="<?php if(!empty($data['email'])) { echo $data['email']; } ?>" type="email" class="form-control" id="email" placeholder="Enter E-Mail" name="email">
                    <p class="admin_user_error" id="admin_user_email_validate"></p>
                </div>
                
                <div class="mb-3 col-md-4">
                    <label for="role_id" class="form-label">User Role</label>
                    <select required class="selectpicker col-12"  aria-label="Select User Role" id="role_id"
                        placeholder="Select User Role" name="role_id[]">
                        <optgroup label="Select User Role">
                        <?php if (isset($admin_roles)){foreach($admin_roles as $role){ ?>
                        <option   value="<?php if(!empty($role['role_id']) ) { echo $role['role_id'] ;  }?>" 
                        <?php if(isset($selected_role_name))
                            {
                                 if(find_tag($role['role_id'],$selected_role_name))
                                 {
                                    echo 'selected';
                                 };
                            }                       
                        ?>	
                        >  <?php if(!empty($role['role_name']) ) { echo $role['role_name']  ;} ?> </option>
                        <?php } }?>
                    </select>
                    <p class="admin_user_error" id="role_name_validate" ></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="admin_menu_item_id" class="form-label">Admin Menu items Access </label>
                    <select required class="selectpicker col-12" multiple aria-label="Select Admin Menu Item" id="admin_menu_item_id"
                        placeholder="Select Admin Menu Item" name="admin_menu_item_id[]">
                        <optgroup label="Select Menu Item ">
                        <?php if (isset($admin_menu_items)){foreach($admin_menu_items as $menu_items){ ?>
                        <option   value="<?php if(!empty($menu_items['menuitem_id']) ) { echo $menu_items['menuitem_id'] ;  }?>" 
                        <?php if(isset($selected_menu_items))
                            {
                                 if(find_tag($menu_items['menuitem_id'],$selected_menu_items))
                                 {
                                    echo 'selected';
                                 };
                            }                       
                        ?>	
                        > <?php if(!empty($menu_items['menuitem_text']) ) { echo $menu_items['menuitem_text']  ;} ?> </option>
                        <?php } }?>
                    </select>
                    <p class="admin_user_error" id="admin_menu_item_id_validate" ></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="username" class="form-label">User Name:</label>
                    <input  required value="<?php if(!empty($data['username'])) { echo $data['username']; } ?>" type="text" class="form-control" id="username" placeholder="Enter User Name" name="username">
                    <p class="admin_user_error" id="admin_username_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="password" class="form-label">Password :</label>
                    <input  <?php if(empty($data['password'])) { echo 'required'; } ?> value="" type="password" class="form-control" id="password" placeholder="Enter Password" name="password">
                    <p class="admin_user_error" id="admin_password_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="status_ind" class="form-label">Status</label>
                    <select required class="form-select" aria-label="select status_ind" name="status_ind">
                        <option class="text-success" <?php if(!empty($data['status_ind'])) { if ( $data['status_ind'] == 1) {
                                                            echo "selected";
                                                        }  }?>  value=1>
                            Active</option>
                        <option class="text-danger" <?php if(!empty($data['status_ind'])) {  if ($data['status_ind'] == 0) {
                                                        echo "selected";
                                                    }  } ?> value=0>
                            Not Active</option>
                    </select>
                    <p class="admin_user_error" id="user_status_ind_error"></p>
                </div>

                <div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>

            </form>
        </div>
    </div>
</div>
