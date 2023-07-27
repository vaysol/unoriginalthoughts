<div class="container-fluid row">
    <?php if ( isset( $single_home_matrix)) 
    {
        foreach ($single_home_matrix as  $data) {} ?>
        <h2>Edit Home Matrix</h2> <?php 
    } 
    else 
    { ?>
        <h2> Add Home Matrix</h2> <?php 
    } ?>

    <div class="row">
        <div class="col-md-9">
            <form action="<?php echo base_url('/admin/home-matrix/save') ?>/" class="was-validated1 row" method="POST" enctype="multipart/form-data">
                
                <div class="mb-3 col-md-4" hidden>
                    <label for="id" class="form-label">Id:</label>
                    <input value="<?php if (!empty($data['id'])) {
                                        echo $data['id'];
                                    } ?>" type="text" class="form-control" id="id" placeholder="Id" name="id">
                    <p class="admin_home_matrix_error" id="admin_home_matrix_id_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="years" class="form-label">Years of Credibility</label>
                    <input required value="<?php if (!empty($data['years'])) { echo $data['years'];  }?>" type="text" class="form-control" id="years" placeholder="Enter Years of Credibility" name="years">
                    <p class="admin_home_matrix_error" id="admin_home_matrix_years_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="investigations_per_year" class="form-label">Investigations/Year</label>
                    <input required value="<?php if (!empty($data['investigations_per_year'])) { echo $data['investigations_per_year'];  }?>" type="text" class="form-control" id="investigations_per_year" placeholder="Enter Investigations/Year" name="investigations_per_year">
                    <p class="admin_home_matrix_error" id="admin_home_matrix_investigations_per_year_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="countries" class="form-label">Countries</label>
                    <input required value="<?php if (!empty($data['countries'])) { echo $data['countries'];  }?>" type="text" class="form-control" id="countries" placeholder="Enter Countries" name="countries">
                    <p class="admin_home_matrix_error" id="admin_home_matrix_countries_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="units" class="form-label">Medical Imaging Units</label>
                    <input required value="<?php if (!empty($data['units'])) { echo $data['units'];  }?>" type="text" class="form-control" id="units" placeholder="Enter Medical Imaging Units" name="units">
                    <p class="admin_home_matrix_error" id="admin_home_matrix_units_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="reporting_accuracy" class="form-label">Reporting Accuracy</label>
                    <input required value="<?php if (!empty($data['reporting_accuracy'])) { echo $data['reporting_accuracy'];  }?>" type="text" class="form-control" id="reporting_accuracy" placeholder="Enter Reporting Accuracy" name="reporting_accuracy">
                    <p class="admin_home_matrix_error" id="admin_home_matrix_reporting_accuracy_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="radiologist" class="form-label">SLA Compliance</label>
                    <input required value="<?php if (!empty($data['radiologist'])) { echo $data['radiologist'];  }?>" type="text" class="form-control" id="radiologist" placeholder="Enter SLA Compliance" name="radiologist">
                    <p class="admin_home_matrix_error" id="admin_home_matrix_radiologist_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="sla_compliance" class="form-label">Years of Credibility</label>
                    <input required value="<?php if (!empty($data['sla_compliance'])) { echo $data['sla_compliance'];  }?>" type="text" class="form-control" id="sla_compliance" placeholder="Enter Years of Credibility" name="sla_compliance">
                    <p class="admin_home_matrix_error" id="admin_home_matrix_sla_compliance_validate"></p>
                </div>

                <div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>


            </form>
        </div>
    </div>
</div>
