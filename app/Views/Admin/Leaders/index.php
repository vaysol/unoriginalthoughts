<div class="mb-3 row">
    <div class="col-md-8">
        <h3>Leaders</h3>
    </div>
    <div class="col-md-4">
        <a href="<?php echo base_url('/admin/leader/add'); ?>" class="btn btn-dark float-end"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Leader</a>
    </div>
</div>
<table id="example" class="table bg-light bg-gradient table-bordered bg-opacity-25 rounded-3" style="width:100%;">
    <thead>
        <tr>
            <th>Sl No</th>
            <th>Name</th>
            <th>Description</th>
            <th>Display Order</th>
            <th>Last Modified Date</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 0;
        foreach ($leaders as $data) {  ?>
            <tr> 
                <td class="text-center"><?php echo ++$i; ?></td>
                <td><?php echo $data['title']; ?></td>
                <td><?php echo $data['description']; ?></td>
                <td><?php echo $data['display_order']; ?></td>
                <td><?php echo $data['last_modified_date']; ?></td>
                <td> <img src="<?php echo base_url('admin-assets/logo/status_' . ($data['status_ind'] ? 'green' : 'red') . '.gif') ?>" alt="status indicator"></td>
                <td>
                    <a class="text-decoration-none" href="<?php echo base_url('/admin/leader/edit/' . $data['leader_id']) . '/'; ?>">
                        <i class="fa fa-pencil fa-lg mx-3" aria-hidden="true" style="color:#3a9124;"></i>
                    </a>
                    <a class="text-decoration-none" href="<?php echo base_url('/admin/leader/delete/' . $data['leader_id']) . '/'; ?>" onclick="return confirm('Are you sure! You want to delete this item?')">
                        <i class="fa fa-trash fa-lg" aria-hidden="true" style="color:#b83a2c;"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>