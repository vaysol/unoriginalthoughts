<div class="mb-3 row">
    <div class="col-md-8">
        <h3>Blog Categories</h3>
    </div>
    <div class="col-md-4">
        <a href="<?php echo base_url('/admin/blog-category/add'); ?>" class="btn btn-dark float-end"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Blog Categories</a>
    </div>
</div>
<table id="example" class="table bg-light bg-gradient table-bordered bg-opacity-25 rounded-3" style="width:100%;">
    <thead>
        <tr>
            <th>Sl No</th>
            <th>Blog Category</th>
            <th>Created Date</th>
            <th>Modified Date</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 0;
        foreach ($blog_categories as $data) {  ?>
            <tr> 
                <td class="text-center"><?php echo ++$i; ?></td>
                <td><?php echo $data['blog_category_title']; ?></td>
                <td><?php echo $data['created_date']; ?></td>
                <td><?php echo $data['last_modified_date']; ?></td>
                <td> <img src="<?php echo base_url('admin-assets/logo/status_' . ($data['active_status'] == 'Y'? 'green' : 'red') . '.gif') ?>" alt="status indicator"></td>
                <td>
                    <a class="text-decoration-none" href="<?php echo base_url('/admin/blog-category/edit/' . $data['blog_category_id']) . '/'; ?>">
                        <i class="fa fa-pencil fa-lg mx-3" aria-hidden="true" style="color:#3a9124;"></i>
                    </a>
                    <a class="text-decoration-none" href="<?php echo base_url('/admin/blog-category/delete/' . $data['blog_category_id']) . '/'; ?>" onclick="return confirm('Are you sure! You want to delete this item?')">
                        <i class="fa fa-trash fa-lg" aria-hidden="true" style="color:#b83a2c;"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>