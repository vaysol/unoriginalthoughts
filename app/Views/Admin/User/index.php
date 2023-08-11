<div class="mb-3 row">
    <div class="col-md-8">
        <h3> Users</h3>
    </div>
</div>
<table id="example" class="table bg-light bg-gradient table-bordered bg-opacity-25 rounded-3" style="width:100%;">
    <thead>
        <tr>
            <th>Sl No</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Mobile Number</th>
            <th>Email</th>
            <th>U Token</th>
            <th>Points</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 0;
        foreach ($users as $data) {  ?>
            <tr> 
                <td class="text-center"><?php echo ++$i; ?></td>
                <td><?php echo $data['first_name']; ?></td>
                <td><?php echo $data['last_name']; ?></td>
                <td><?php echo $data['mobile']; ?></td>
                <td><?php echo $data['email']; ?></td>
                <td><?php echo $data['u_token']; ?></td>
                <td><?php echo $data['points']; ?></td>
                <td> <img src="<?php echo base_url('admin-assets/logo/status_' . ($data['status'] ? 'green' : 'red') . '.gif') ?>" alt="status indicator"></td>
            </tr>
        <?php } ?>
    </tbody>
</table>