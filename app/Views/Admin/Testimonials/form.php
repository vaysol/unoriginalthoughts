<div class="container-fluid row">
    <?php if ( isset( $testimonial)) 
    {
        foreach ($testimonial as  $data) {} ?>
        <h2>Edit Testimonial</h2> <?php 
    } 
    else 
    { ?>
        <h2> Add Testimonial</h2> <?php 
    } ?>

    <div class="row">
        <div class="col-md-9">
            <form action="<?php echo base_url('/admin/testimonial/save') ?>/" class="was-validated1 row" method="POST" enctype="multipart/form-data">
                
                <div class="mb-3 col-md-4" hidden>
                    <label for="testimonial_id" class="form-label">Id:</label>
                    <input value="<?php if (!empty($data['testimonial_id'])) {
                                        echo $data['testimonial_id'];
                                    } ?>" type="text" class="form-control" id="testimonial_id" placeholder="Id" name="testimonial_id">
                    <p class="admin_testimonial_error" id="admin_testimonial_id_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="testimonial_title" class="form-label"> Testimonial Title</label>
                    <input required value="<?php if (!empty($data['testimonial_title'])) { echo $data['testimonial_title'];  }?>" type="text" class="form-control" id="testimonial_title" placeholder="Enter Testimonial Title" name="testimonial_title">
                    <p class="admin_testimonial_error" id="admin_testimonial_title_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="youtube_url" class="form-label"> Youtube Url</label>
                    <input value="<?php if (!empty($data['youtube_url'])) { echo $data['youtube_url'];  }?>" type="url" class="form-control" id="youtube_url" placeholder="Enter Youtube Url" name="youtube_url">
                    <p class="admin_testimonial_error" id="admin_testimonial_youtube_url_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="testimonial_type" class="form-label">Testimonial Type</label>
                    <select required class="form-select" id="testimonial_type" aria-label="select Testimonial" name="testimonial_type">
                        <option   <?php if(!empty($data['testimonial_type'])) { if ( $data['testimonial_type'] == 'written') {
                                                            echo "selected";
                                                        }  }?>  value='written'>
                            Written</option>
                        <option   <?php if(!empty($data['testimonial_type'])) {  if ($data['testimonial_type'] == 'video') {
                                                        echo "selected";
                                                    }  } ?> value='video'>
                           Video</option>
                    </select>
                    <p class="admin_testimonial_error" id="admin_testimonial_type_validate"></p>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label for="testimonial_short_desc" class="form-label">Written Testimonial </label>
                        <textarea value="" class="form-control ckeditor" id="testimonial_short_desc"
                        placeholder="Enter Written Testimonial" name="testimonial_short_desc"> <?php if( !empty($data['testimonial_short_desc']))   {echo html_entity_decode($data['testimonial_short_desc']); } ?></textarea>
                        <p class="admin_testimonial_error" id="admin_testimonial_short_desc_validate"></p>
                    </div>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="age" class="form-label"> Age</label>
                    <input value="<?php if (!empty($data['age'])) { echo $data['age'];  }?>" type="number" class="form-control" id="age" placeholder="Enter Age" name="age">
                    <p class="admin_testimonial_error" id="admin_testimonial_age_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="display_order" class="form-label"> Display Order</label>
                    <input value="<?php if (!empty($data['display_order'])) { echo $data['display_order'];  }?>" type="number" class="form-control" id="display_order" placeholder="Enter Display Order" name="display_order">
                    <p class="admin_testimonial_error" id="admin_testimonial_display_order_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="home_display_order" class="form-label"> Home Page Display Order</label>
                    <input value="<?php if (!empty($data['home_display_order'])) { echo $data['home_display_order'];  }?>" type="number" class="form-control" id="home_display_order" placeholder="Enter Home Page Display Order" name="home_display_order">
                    <p class="admin_testimonial_error" id="admin_testimonial_home_display_order_validate"></p>
                </div>

                
                <div class="mb-3 col-md-4">
                    <label for="status_ind" class="form-label">Status</label>
                    <select required class="form-select" aria-label="select status ind" name="status_ind">
                        <option class="text-success" <?php if(!empty($data['status_ind'])) { if ( $data['status_ind'] == 1) {
                                                            echo "selected";
                                                        }  }?>  value=1>
                            Active</option>
                        <option class="text-danger" <?php if(!empty($data['status_ind'])) {  if ($data['status_ind'] == 0) {
                                                        echo "selected";
                                                    }  } ?> value=0>
                            Not Active</option>
                    </select>
                    <p class="admin_testimonial_error" id="admin_testimonial_status_ind_validate"></p>
                </div>

                <div>
                    <button type="submit"  class="btn btn-success">Submit</button>
                </div>

            </form>
        </div>
    </div>
</div>
