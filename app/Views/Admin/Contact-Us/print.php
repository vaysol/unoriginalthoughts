<div class="mb-3 row">
    <div class="col-md-2">
        <a  class="btn btn-success"  href="<?php echo base_url('/admin/contact-us/')?>">Go Back</a>
    </div>
    <div class="col-md-2">
        <button class="btn btn-primary" onclick="return contact_us_print()" > Print </button>
    </div>
</div>

<div class="vertical-table-container">
  <table id="table-to-print" class="table bg-light bg-gradient table-bordered bg-opacity-25 rounded-3">
    <tbody>
      <?php foreach ($print_contact_us as $data) { ?>
        <tr>
          <th>Name</th>
          <td><?php echo $data['name']; ?></td>
        </tr>
        <tr>
          <th>E Mail</th>
          <td><?php echo $data['email']; ?></td>
        </tr>
        <tr>
          <th>Mobile</th>
          <td><?php echo $data['mobile']; ?></td>
        </tr>
        <tr>
          <th>Subject</th>
          <td><?php echo $data['subject']; ?></td>
        </tr>
        <tr>
          <th>Message</th>
          <td><?php echo $data['query']; ?></td>
        </tr>
        <tr>
          <th>Contacted Date</th>
          <td><?php echo $data['created_date']; ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
