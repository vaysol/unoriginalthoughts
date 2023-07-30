<div class="mb-3 row">
    <div class="col-md-8">
        <h3>Enquiries</h3>
    </div>
</div>
<table id="example" class="table bg-light bg-gradient table-bordered bg-opacity-25 rounded-3" style="width:100%;">
    <thead>
        <tr>
            <th>Sl No</th>
            <th>Name</th>
            <th>Mobile Number</th>
            <th>Email</th>
            <th>Message</th>
            <th>Contacted Date</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 0;
        foreach ($enquiries as $data) {  ?>
            <tr> 
                <td class="text-center"><?php echo ++$i; ?></td>
                <td><?php echo $data['name']; ?></td>
                <td><?php echo $data['mobile']; ?></td>
                <td><?php echo $data['email']; ?></td>
                <td><?php echo $data['message']; ?></td>
                <td><?php echo $data['create_date']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>