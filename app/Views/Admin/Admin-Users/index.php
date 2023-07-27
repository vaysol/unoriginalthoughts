<div class="mb-3 row">
    <div class="col-md-8">
        <h3>Admin Users</h3>
    </div>
    <div class="col-md-4">
        <a href="<?php echo base_url('/admin/admin-user/add'); ?>" class="btn btn-dark float-end"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New Admin User</a>
    </div>
</div>
<table id="example" class="table bg-light bg-gradient table-bordered bg-opacity-25 rounded-3" style="width:100%;">
    <thead>
        <tr>
            <th>Sl No</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>E-Mail</th>
            <th>User Role</th>
            <th>UserName</th>
            <th>Created Date</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 0;
        foreach ($admin_users as $data) { ?>
            <tr> 
                <td class="text-center"><?php echo ++$i; ?></td>
                <td><?php echo $data['first_name']; ?></td>
                <td><?php echo $data['last_name']; ?></td>
                <td><?php echo $data['email']; ?></td>
                <td><?php echo $data['role_name']; ?></td>
                <td><?php echo $data['username']; ?></td>
                <td><?php echo $data['created_date']; ?></td>
                <td> <img src="<?php echo base_url('admin-assets/logo/status_' . ($data['status_ind'] ? 'green' : 'red') . '.gif') ?>" alt="status indicator"></td>
                <td>
                    <a class="text-decoration-none" href="<?php echo base_url('/admin/admin-user/edit/' . $data['user_id']) . '/'; ?>">
                        <i class="fa fa-pencil fa-lg mx-3" aria-hidden="true" style="color:#3a9124;"></i>
                    </a>
                    <a class="text-decoration-none" href="<?php echo base_url('/admin/admin-user/delete/' . $data['user_id']) . '/'; ?>" onclick="return confirm('Are you sure! You want to delete this item?')">
                        <i class="fa fa-trash fa-lg" aria-hidden="true" style="color:#b83a2c;"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>