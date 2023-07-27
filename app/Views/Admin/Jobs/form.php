<div class="container-fluid row">
    <?php if ( isset( $job)) 
    {
        foreach ($job as  $data) {} ?>
        <h2>Edit Job</h2> <?php 
    } 
    else 
    { ?>
        <h2> Add Job</h2> <?php 
    } ?>

    <div class="row">
        <div class="col-md-9">
            <form action="<?php echo base_url('/admin/job/save') ?>/" class="was-validated1 row" method="POST" enctype="multipart/form-data">
                
                <div class="mb-3 col-md-4" hidden>
                    <label for="id" class="form-label">Id:</label>
                    <input value="<?php if (!empty($data['id'])) {
                                        echo $data['id'];
                                    } ?>" type="text" class="form-control" id="id" placeholder="Id" name="id">
                    <p class="admin_job_error" id="admin_job_id_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="role" class="form-label">Job Title</label>
                    <input required value="<?php if (!empty($data['role'])) { echo $data['role'];  }?>" type="text" class="form-control" id="role" placeholder="Enter Doctor Name" name="role">
                    <p class="admin_job_error" id="admin_job_role_validate"></p>
                </div>
                
                <div class="mb-3 col-md-4">
                    <label for="country_location" class="form-label">Contry</label>
                    <select required class="form-select" id="country_location" aria-label="select Contry" name="country_location">
                        <option   <?php if(!empty($data['country_location'])) { if ( $data['country_location'] == 'India') {
                                                            echo "selected";
                                                        }  }?>  value='India'>
                            India</option>
                        <option  <?php if(!empty($data['country_location'])) {  if ($data['country_location'] == 'GCC') {
                                                        echo "selected";
                                                    }  } ?> value='GCC'>
                           GCC</option>
                    </select>
                    <p class="admin_job_error" id="admin_job_country_location_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="category" class="form-label">Category</label>
                    <select required class="form-select" id="category" aria-label="select Category" name="category">
                        <option   <?php if(!empty($data['category'])) { if ( $data['category'] == 'Radiologist') {
                                                            echo "selected";
                                                        }  }?>  value='Radiologist'>
                            Radiologist</option>
                        <option  <?php if(!empty($data['category'])) {  if ($data['category'] == 'Technologist') {
                                                        echo "selected";
                                                    }  } ?> value='Technologist'>
                           Technologist</option>
                        <option  <?php if(!empty($data['category'])) {  if ($data['category'] == 'Adminstration') {
                                                        echo "selected";
                                                    }  } ?> value='Adminstration'>
                           Adminstration</option>
                    </select>
                    <p class="admin_job_error" id="admin_job_category_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="experience" class="form-label">Experience</label>
                    <input required value="<?php if (!empty($data['experience'])) { echo $data['experience'];  }?>" type="text" class="form-control" id="experience" placeholder="Enter Experience" name="experience">
                    <p class="admin_job_error" id="admin_job_experience_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="qualification" class="form-label">Qualification</label>
                    <input required value="<?php if (!empty($data['qualification'])) { echo $data['qualification'];  }?>" type="text" class="form-control" id="qualification" placeholder="Enter Qualification" name="qualification">
                    <p class="admin_job_error" id="admin_job_qualification_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="objective" class="form-label">Objective</label>
                    <input required value="<?php if (!empty($data['objective'])) { echo $data['objective'];  }?>" type="text" class="form-control" id="objective" placeholder="Enter Objective" name="objective">
                    <p class="admin_job_error" id="admin_job_objective_validate"></p>
                </div>
                
                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea value="" class="form-control ckeditor" id="description"
                        placeholder="Enter Description" name="description"> <?php if( !empty($data['description']))   {echo html_entity_decode($data['description']); } ?></textarea>
                        <p class="admin_job_error" id="admin_job_description_validate"></p>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label for="meta_description" class="form-label">Meta Description</label>
                        <textarea value="" class="form-control ckeditor" id="meta_description"
                        placeholder="Enter Meta Description" name="meta_description"> <?php if( !empty($data['meta_description']))   {echo html_entity_decode($data['meta_description']); } ?></textarea>
                        <p class="admin_job_error" id="admin_job_meta_description_validate"></p>
                    </div>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="address" class="form-label">Address</label>
                    <input required value="<?php if (!empty($data['address'])) { echo $data['address'];  }?>" type="text" class="form-control" id="address" placeholder="Enter Address" name="address">
                    <p class="admin_job_error" id="admin_job_address_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="location" class="form-label">Location</label>
                    <input required value="<?php if (!empty($data['location'])) { echo $data['location'];  }?>" type="text" class="form-control" id="location" placeholder="Enter Location" name="location">
                    <p class="admin_job_error" id="admin_job_location_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="postal_code" class="form-label">Postal Code</label>
                    <input required value="<?php if (!empty($data['postal_code'])) { echo $data['postal_code'];  }?>" type="text" class="form-control" id="postal_code" placeholder="Enter Postal Code" name="postal_code">
                    <p class="admin_job_error" id="admin_job_postal_code_validate"></p>
                </div>


                <div class="mb-3 col-md-4">
                    <label for="status" class="form-label">Status</label>
                    <select required class="form-select" aria-label="select status" name="status">
                        <option class="text-success" <?php if(!empty($data['status'])) { if ( $data['status'] == 1) {
                                                            echo "selected";
                                                        }  }?>  value=1>
                            Active</option>
                        <option class="text-danger" <?php if(!empty($data['status'])) {  if ($data['status'] == 0) {
                                                        echo "selected";
                                                    }  } ?> value=0>
                            Not Active</option>
                    </select>
                    <p class="admin_job_error" id="admin_job_status_validate"></p>
                </div>

                <div>
                    <button type="submit"  class="btn btn-success">Submit</button>
                </div>


            </form>
        </div>
    </div>
</div>
