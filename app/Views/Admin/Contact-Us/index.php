<div class="mb-3 row">
    <div class="col-md-8">
        <h3>Contact Us</h3>
    </div>
    <div class="col-md-4">
    </div>
</div>
<table id="example" class="table bg-light bg-gradient table-bordered bg-opacity-25 rounded-3" style="width:100%;">
    <thead>
        <tr>
            <th>Sl No</th>
            <th>Name</th>
            <th>E Mail</th>
            <th>Mobile</th>
            <th>Message</th>
            <th>Print</th>
            <th>Contacted Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 0;
        foreach ($contact_us as $data) {  ?>
            <tr> 
                <td class="text-center"><?php echo ++$i; ?></td>
                <td><?php echo $data['name']; ?></td>
                <td><?php echo $data['email']; ?></td>
                <td><?php echo $data['mobile']; ?></td>
                <td><?php echo $data['query']; ?></td>
                <td> <a class="text-decoration-none"  href="<?php echo base_url('/admin/contact-us/print/'.$data['id']) ?>"> <i class="fa fa-print" aria-hidden="true"></i> </a>  </td>
                <td><?php echo $data['created_date']; ?></td>
                <td>
                    <a class="text-decoration-none" href="<?php echo base_url('/admin/contact-us/delete/' . $data['id']) . '/'; ?>" onclick="return confirm('Are you sure! You want to delete this item?')">
                        <i class="fa fa-trash fa-lg" aria-hidden="true" style="color:#b83a2c;"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>