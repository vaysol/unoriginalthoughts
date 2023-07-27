<div class="container-fluid row">
    <?php if ( isset($banner)) 
    {
        foreach ($banner as  $data) {} ?>
        <h2>Edit Banner</h2> <?php 
    } 
    else 
    { ?>
        <h2> Add Banner</h2> <?php 
    } ?>

    <div class="row">
        <div class="col-md-9">
            <form action="<?php echo base_url('/admin/banner/save') ?>/" class="was-validated1 row" method="POST" enctype="multipart/form-data">
                
                <div class="mb-3 col-md-4" hidden>
                    <label for="banner_id" class="form-label">Id:</label>
                    <input value="<?php if (!empty($data['banner_id'])) {
                                        echo $data['banner_id'];
                                    } ?>" type="text" class="form-control" id="banner_id" placeholder="Id" name="banner_id">
                    <p class="admin_banner_error" id="admin_banner_id_validate"></p>
                </div>
                
                <div class="mb-3 col-md-4">
                    <label for="name" class="form-label">Banner Name</label>
                    <input required value="<?php if (!empty($data['name'])) { echo $data['name'];  }?>" type="text" class="form-control" id="name" placeholder="Enter Banner Name" name="name">
                    <p class="admin_banner_error" id="admin_name_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="description" class="form-label">Banner Description</label>
                    <input required value="<?php if (!empty($data['description'])) { echo $data['description'];  }?>" type="text" class="form-control" id="description" placeholder="Enter Banner Description" name="description">
                    <p class="admin_banner_error" id="admin_description_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="desktop_banner" class="form-label">Desktop Banner</label>
                    <input type="file" value=" <?php if (!empty($data['desktop_banner'])) {
                                                    echo $data['desktop_banner'];
                                                } ?>" class="form-control input_form_image" aria-label="file example" id="desktop_banner" placeholder="Desktop Image" name="desktop_banner">
                    <p class="admin_banner_error" id="admin_desktop_banner_validate"></p>
                </div>

                
                <div class="mb-3 col-md-4">
                    <label for="mobile_banner" class="form-label">Mobile Banner</label>
                    <input type="file" value=" <?php if (!empty($data['mobile_banner'])) {
                                                    echo $data['mobile_banner'];
                                                } ?>" class="form-control input_form_image" aria-label="file example" id="mobile_banner" placeholder="Mobile Image" name="mobile_banner">
                    <p class="admin_banner_error" id="admin_mobile_banner_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="alt_text" class="form-label">Alt Text</label>
                    <input required value="<?php if (!empty($data['alt_text'])) { echo $data['alt_text'];  }?>" type="text" class="form-control" id="alt_text" placeholder="Enter Alt Text" name="alt_text">
                    <p class="admin_banner_error" id="admin_alt_text_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="title_text" class="form-label">Title Text</label>
                    <input required value="<?php if (!empty($data['title_text'])) { echo $data['title_text'];  }?>" type="text" class="form-control" id="title_text" placeholder="Enter Title Text" name="title_text">
                    <p class="admin_banner_error" id="admin_title_text_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="button_link" class="form-label">Button Link</label>
                    <input  value="<?php if (!empty($data['button_link'])) { echo $data['button_link'];  }?>" type="url" class="form-control" id="button_link" placeholder="Enter Button Link " name="button_link">
                    <p class="admin_banner_error" id="admin_button_link_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="display_order" class="form-label">Display Order</label>
                    <input required value="<?php if (!empty($data['display_order'])) { echo $data['display_order'];  }?>" type="number" class="form-control" id="display_order" placeholder="Enter Display Order " name="display_order">
                    <p class="admin_banner_error" id="admin_display_order_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="status_ind" class="form-label">Status</label>
                    <select required class="form-select" aria-label="select Status Ind" name="status_ind">
                        <option class="text-success" <?php if(!empty($data['status_ind'])) { if ( $data['status_ind'] == 1) {
                                                            echo "selected";
                                                        }  }?>  value=1>
                            Active</option>
                        <option class="text-danger" <?php if(!empty($data['status_ind'])) {  if ($data['status_ind'] == 0) {
                                                        echo "selected";
                                                    }  } ?> value=0>
                            Not Active</option>
                    </select>
                    <p class="admin_user_error" id="user_status_ind_error"></p>
                </div>


                <div>
                    <button type="submit"  class="btn btn-success">Submit</button>
                </div>


            </form>
        </div>
        <!-- Image Div -->
        <div class="col-md-3">
            <?php if (isset($data)) { ?>
                <div class="col-md-6">
                    <p>Desktop Banner</p>
                    <img id="desktop_banner_preview" class="admin-img-div" src="<?php if (!empty($data['desktop_banner'])) {
                                                        echo base_url($data['desktop_banner']);
                                                    }  ?>.webp" alt="">
                </div>
                <div class="col-md-6">
                    <p>Mobile Banner</p>
                    <img id="mobile_banner_preview" class="admin-img-div" src="<?php if (!empty($data['mobile_banner'])) {
                                                        echo base_url($data['mobile_banner']);
                                                    }  ?>.webp" alt="">
                </div>
            <?php } else { ?>
                <div class="col-md-6" hidden="true">
                    <p>Desktop Banner</p>
                    <img id="desktop_banner_preview" class="admin-img-div" src="#" alt="">
                </div>
                <div class="col-md-6" hidden="true">
                    <p>Mobile Banner</p>
                    <img id="mobile_banner_preview" class="admin-img-div" src="#" alt="">
                </div>
            <?php } ?>
        </div>
    </div>
</div>
