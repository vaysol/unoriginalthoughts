<div class="container-fluid row">
    <?php if ( isset($portfolio)) 
    {
        foreach ($portfolio as  $data) {} ?>
        <h2>Edit Portfolio</h2> <?php 
    } 
    else 
    { ?>
        <h2> Add Portfolio</h2> <?php 
    } ?>

    <div class="row">
        <div class="col-md-9">
            <form action="<?php echo base_url('/admin/portfolio/save') ?>/" class="was-validated1 row" method="POST" enctype="multipart/form-data">
                
                <div class="mb-3 col-md-4" hidden>
                    <label for="id" class="form-label">Id:</label>
                    <input value="<?php if (!empty($data['id'])) {
                                        echo $data['id'];
                                    } ?>" type="text" class="form-control" id="id" placeholder="Id" name="id">
                    <p class="admin_portfolio_error" id="admin_portfolio_id_validate"></p>
                </div>
                
                <div class="mb-3 col-md-4">
                    <label for="title" class="form-label">Title</label>
                    <input required value="<?php if (!empty($data['title'])) { echo $data['title'];  }?>" type="text" class="form-control" id="title" placeholder="Enter Title" name="title">
                    <p class="admin_portfolio_error" id="admin_portfolio_title_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="priority" class="form-label">Priority</label>
                    <input value="<?php if (!empty($data['priority'])) { echo $data['priority'];  }?>" type="number" class="form-control" id="priority" placeholder="Enter Priority" name="priority">
                    <p class="admin_portfolio_error" id="admin_portfolio_priority_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="desktop_image" class="form-label">Desktop Image</label>
                    <input type="file" value=" <?php if (!empty($data['desktop_image'])) {
                                                    echo $data['desktop_image'];
                                                } ?>" class="form-control input_form_image" aria-label="file example" id="desktop_image" placeholder="Desktop Image" name="desktop_image">
                    <p class="admin_portfolio_error" id="admin_portfolio_desktop_image_validate"></p>
                </div>

                
                <div class="mb-3 col-md-4">
                    <label for="mobile_image" class="form-label">Mobile Image</label>
                    <input type="file" value=" <?php if (!empty($data['mobile_image'])) {
                                                    echo $data['mobile_image'];
                                                } ?>" class="form-control input_form_image" aria-label="file example" id="mobile_image" placeholder="Mobile Image" name="mobile_image">
                    <p class="admin_portfolio_error" id="admin_portfolio_mobile_image_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="alt_text" class="form-label">Alt Text</label>
                    <input required value="<?php if (!empty($data['alt_text'])) { echo $data['alt_text'];  }?>" type="text" class="form-control" id="alt_text" placeholder="Enter Alt Text" name="alt_text">
                    <p class="admin_portfolio_error" id="admin_portfolio_alt_text_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="title_text" class="form-label">Title Text</label>
                    <input required value="<?php if (!empty($data['title_text'])) { echo $data['title_text'];  }?>" type="text" class="form-control" id="title_text" placeholder="Enter Title Text" name="title_text">
                    <p class="admin_portfolio_error" id="admin_portfolio_title_text_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="status" class="form-label">Status</label>
                    <select required class="form-select" aria-label="select Status" name="status">
                        <option class="text-success" <?php if(!empty($data['status'])) { if ( $data['status'] == 1) {
                                                            echo "selected";
                                                        }  }?>  value=1>
                            Active</option>
                        <option class="text-danger" <?php if(!empty($data['status'])) {  if ($data['status'] == 0) {
                                                        echo "selected";
                                                    }  } ?> value=0>
                            Not Active</option>
                    </select>
                    <p class="admin_portfolio_error" id="admin_portfolio_status_error"></p>
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
                    <p>Desktop Image</p>
                    <img id="desktop_image_preview" class="admin-img-div" src="<?php if (!empty($data['desktop_image'])) {
                                                        echo base_url($data['desktop_image']);
                                                    }  ?>.webp" alt="">
                </div>
                <div class="col-md-6">
                    <p>Mobile Image</p>
                    <img id="mobile_image_preview" class="admin-img-div" src="<?php if (!empty($data['mobile_image'])) {
                                                        echo base_url($data['mobile_image']);
                                                    }  ?>.webp" alt="">
                </div>
            <?php } else { ?>
                <div class="col-md-6" hidden="true">
                    <p>Desktop Image</p>
                    <img id="desktop_image_preview" class="admin-img-div" src="#" alt="">
                </div>
                <div class="col-md-6" hidden="true">
                    <p>Mobile  Image</p>
                    <img id="mobile_image_preview" class="admin-img-div" src="#" alt="">
                </div>
            <?php } ?>
        </div>
    </div>
</div>
