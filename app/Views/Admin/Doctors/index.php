<div class="mb-3 row">
    <div class="col-md-8">
        <h3>Doctors List</h3>
    </div>
    <div class="col-md-4">
        <a href="<?php echo base_url('/admin/doctor/add'); ?>" class="btn btn-dark float-end"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Doctor</a>
    </div>
</div>
<table id="example" class="table bg-light bg-gradient table-bordered bg-opacity-25 rounded-3" style="width:100%;">
    <thead>
        <tr>
            <th>Sl No</th>
            <th>Doctor Name</th>
            <th>Designation</th>
            <th>Display Order</th>
            <th>Last Modified Date</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 0;
        foreach ($doctors as $data) {  ?>
            <tr> 
                <td class="text-center"><?php echo ++$i; ?></td>
                <td><?php echo $data['doctor_name']; ?></td>
                <td><?php echo $data['designation']; ?></td>
                <td><?php echo $data['priority']; ?></td>
                <td><?php echo $data['last_modified_date']; ?></td>
                <td> <img src="<?php echo base_url('admin-assets/logo/status_' . ($data['active_status']  == 'Y' ? 'green' : 'red') . '.gif') ?>" alt="status indicator"></td>
                <td>
                    <a class="text-decoration-none" href="<?php echo base_url('/admin/doctor/edit/' . $data['id']) . '/'; ?>">
                        <i class="fa fa-pencil fa-lg mx-3" aria-hidden="true" style="color:#3a9124;"></i>
                    </a>
                    <a class="text-decoration-none" href="<?php echo base_url('/admin/doctor/delete/' . $data['id']) . '/'; ?>" onclick="return confirm('Are you sure! You want to delete this item?')">
                        <i class="fa fa-trash fa-lg" aria-hidden="true" style="color:#b83a2c;"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>