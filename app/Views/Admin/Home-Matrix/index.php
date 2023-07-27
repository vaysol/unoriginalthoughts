<div class="mb-3 row">
    <div class="col-md-8">
        <h3>Home Matrix</h3>
    </div>
    <div class="col-md-4">
    </div>
</div>
<table id="example" class="table bg-light bg-gradient table-bordered bg-opacity-25 rounded-3" style="width:100%;">
    <thead>
        <tr>
            <th>Sl No</th>
            <th>Years of Credibility</th>
            <th>Investigations/Year</th>
            <th>Countries</th>
            <th>Medical Imaging Units</th>
            <th>Reporting Accuracy</th>
            <th>Radiologists Across Sub-specialities</th>
            <th>SLA Compliance</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 0;
        foreach ($home_matrix as $data) {  ?>
            <tr> 
                <td class="text-center"><?php echo ++$i; ?></td>
                <td><?php echo $data['years']; ?></td>
                <td><?php echo $data['investigations_per_year']; ?></td>
                <td><?php echo $data['countries']; ?></td>
                <td><?php echo $data['units']; ?></td>
                <td><?php echo $data['reporting_accuracy']; ?></td>
                <td><?php echo $data['radiologist']; ?></td>
                <td><?php echo $data['sla_compliance']; ?></td>
                <td>
                    <a class="text-decoration-none" href="<?php echo base_url('/admin/home-matrix/edit/' . $data['id']) . '/'; ?>">
                        <i class="fa fa-pencil fa-lg mx-3" aria-hidden="true" style="color:#3a9124;"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>