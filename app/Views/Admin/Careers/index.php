<div class="mb-3 row">
    <div class="col-md-8">
        <h3>Careers</h3>
    </div>
    <div class="col-md-4">
    </div>
</div>

<div class="mb-3 row">
    <div class="col-md-3">
        <a href="<?php echo base_url('/admin/download_excel') ?>" class="btn btn-success">Download Data in Excel </a>
    </div>
</div>

<table id="example" class="table bg-light bg-gradient table-bordered bg-opacity-25 rounded-3" style="width:100%;">
    <thead>
        <tr>
            <th>Sl No</th>
            <th>Name</th>
            <th>E Mail</th>
            <th>Mobile</th>
            <th>Subject Content</th>
            <th>Enquiry</th>
            <th>Resume/Cv</th>
            <th>Cover Letter</th>
            <th>Contacted Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 0;
        foreach ($careers as $data) {  ?>
            <tr> 
                <td class="text-center"><?php echo ++$i; ?></td>
                <td><?php echo $data['name']; ?></td>
                <td><?php echo $data['email']; ?></td>
                <td><?php echo $data['phone_number']; ?></td>
                <td><?php echo $data['subject_content']; ?></td>
                <td><?php echo $data['enquiry']; ?></td>
                <td><?= $data['resume'] ? '<a href="' . base_url($data['resume']) . '" download="' . str_replace(' ', '', $data['name']) . '_resume"><i class="fa fa-cloud-download" aria-hidden="true"></i></a>' : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>' ?></td>
                <td><?= $data['cover_letter'] ? '<a href="' . base_url($data['cover_letter']) . '" download="' . str_replace(' ', '', $data['name']) . '_cover_letter"><i class="fa fa-cloud-download" aria-hidden="true"></i></a>' : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>' ?></td>
                <td><?php echo $data['created_date']; ?></td>
                <td>
                    <a class="text-decoration-none" href="<?php echo base_url('/admin/careers/delete/' . $data['id']) . '/'; ?>" onclick="return confirm('Are you sure! You want to delete this item?')">
                        <i class="fa fa-trash fa-lg" aria-hidden="true" style="color:#b83a2c;"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>