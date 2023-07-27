<div class="mb-3 row">
    <div class="col-md-8">
        <h3>Partner With Us</h3>
    </div>
    <div class="col-md-4">
    </div>
</div>
<table id="example" class="table bg-light bg-gradient table-bordered bg-opacity-25 rounded-3" style="width:100%;">
    <thead>
        <tr>
            <th>Sl No</th>
            <th>Name</th>
            <th>Phone Number</th>
            <th>E-Mail</th>
            <th>Services</th>
            <th>Speciality</th>
            <th>Location</th>
            <th>Partner With Us</th>
            <th>About</th>
            <th>Contacted Date</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 0;
        foreach ($partner_with_us as $data) {  ?>
            <tr> 
                <td class="text-center"><?php echo ++$i; ?></td>
                <td><?php echo $data['name']; ?></td>
                <td><?php echo $data['phone_number']; ?></td>
                <td><?php echo $data['email']; ?></td>
                <td><?php echo $data['services']; ?></td>
                <td><?php echo $data['speciality']; ?></td>
                <td><?php echo $data['location']; ?></td>
                <td><?php echo $data['partner_with_us']; ?></td>
                <td><?php echo $data['about']; ?></td>
                <td><?php echo $data['created_date']; ?></td>
                <td> <img src="<?php echo base_url('admin-assets/logo/status_' . ($data['del_flag']  == 'N' ? 'green' : 'red') . '.gif') ?>" alt="status indicator"></td>
                <td>
                    <a class="text-decoration-none" href="<?php echo base_url('/admin/partner-with-us/delete/' . $data['id']) . '/'; ?>" onclick="return confirm('Are you sure! You want to delete this item?')">
                        <i class="fa fa-trash fa-lg" aria-hidden="true" style="color:#b83a2c;"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>