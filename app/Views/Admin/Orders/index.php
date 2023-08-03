<div class="mb-3 row">
    <div class="col-md-8">
        <h3>Orders</h3>
    </div>
</div>
<table id="example" class="table bg-light bg-gradient table-bordered bg-opacity-25 rounded-3" style="width:100%;">
    <thead>
        <tr>
            <th>Sl No</th>
            <th>User</th>
            <th>Product</th>
            <th>Address</th>
            <th>Ordered Date</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 0;
        foreach ($orders as $data) {  ?>
            <tr> 
                <td class="text-center"><?php echo ++$i; ?></td>
                <td><?php echo $data['first_name'].','.$data['last_name'].','.$data['email'] ; ?></td>
                <td><?php echo $data['product_title'].','.$data['product_price'] ?></td>
                <td><?php echo $data['full_name'].','.$data['mobile'].','.$data['address_line_1'].$data['address_line_2'].','.$data['landmark'].','.$data['pincode'].','.$data['town_city'].','.$data['state']  ; ?></td>
                <td><?php echo $data['ordered_date']; ?></td>
                <td><?php echo $data['status']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>