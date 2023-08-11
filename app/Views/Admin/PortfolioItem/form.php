<div class="container-fluid row">
    <?php if ( isset($portfolio_item)) 
    {
        foreach ($portfolio_item as  $data) {} ?> 
        <h2>Edit Portfolio Item</h2> <?php 
    } 
    else 
    { ?>
        <h2> Add Portfolio Item</h2> <?php 
    } ?>

    <div class="row">
        <div class="col-md-9">
            <form action="<?php echo base_url('/admin/portfolio-item/save') ?>/" class="was-validated1 row" method="POST" enctype="multipart/form-data">
                
                <div class="mb-3 col-md-4" hidden>
                    <label for="id" class="form-label">Id:</label>
                    <input value="<?php if (!empty($data['id'])) {
                                        echo $data['id'];
                                    } ?>" type="text" class="form-control" id="id" placeholder="Id" name="id">
                    <p class="admin_portfolio_item_error" id="admin_portfolio_item_id_validate"></p>
                </div>
                
                <div class="mb-3 col-md-4">
                    <label for="title" class="form-label">Title</label>
                    <input required value="<?php if (!empty($data['title'])) { echo $data['title'];  }?>" type="text" class="form-control" id="title" placeholder="Enter Title" name="title">
                    <p class="admin_portfolio_item_error" id="admin_portfolio_item_title_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="priority" class="form-label">Priority</label>
                    <input required value="<?php if (!empty($data['priority'])) { echo $data['priority'];  }?>" type="number" class="form-control" id="priority" placeholder="Enter Priority" name="priority">
                    <p class="admin_portfolio_item_error" id="admin_portfolio_item_priority_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" value=" <?php if (!empty($data['image'])) {
                                                    echo $data['image'];
                                                } ?>" class="form-control input_form_image" aria-label="file example" id="image" placeholder="Image" name="image">
                    <p class="admin_portfolio_item_error" id="admin_portfolio_item_image_validate"></p>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label for="image_description" class="form-label">Image Description</label>
                        <textarea value="" class="form-control ckeditor" id="image_description"
                        placeholder="Enter Image Description" name="image_description"> <?php if( !empty($data['image_description']))   {echo html_entity_decode($data['image_description']); } ?></textarea>
                        <p class="admin_portfolio_item_error" id="admin_portfolio_item_image_description_validate"></p>
                    </div>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="portfolio_id" class="form-label">Portfolio</label>
                    <select required class="selectpicker col-12" aria-label="Select Portfolio" id="portfolio_id"
                        placeholder="Select Portfolio" name="portfolio_id[]">
                        <optgroup label="Select Portfolio ">
                        <?php if (isset($portfolios)){foreach($portfolios as $single_portfolio){ ?>
                        <option   value="<?php if(!empty($single_portfolio['id']) ) { echo $single_portfolio['id'] ;  }?>" 
                        <?php if(isset($selected_portfolio_id))
                            {
                                 if(find_tag($single_portfolio['id'],$selected_portfolio_id))
                                 {
                                    echo 'selected';
                                 };
                            }                       
                        ?>	
                        > <?php if(!empty($single_portfolio['title']) ) { echo $single_portfolio['title']  ;} ?> </option>
                        <?php } }?>
                    </select>
                    <p class="admin_portfolio_item_error" id="admin_portfolio_item_portfolio_id_validate" ></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="alt_text" class="form-label">Alt Text</label>
                    <input required value="<?php if (!empty($data['alt_text'])) { echo $data['alt_text'];  }?>" type="text" class="form-control" id="alt_text" placeholder="Enter Alt Text" name="alt_text">
                    <p class="admin_portfolio_item_error" id="admin_portfolio_item_alt_text_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="title_text" class="form-label">Title Text</label>
                    <input required value="<?php if (!empty($data['title_text'])) { echo $data['title_text'];  }?>" type="text" class="form-control" id="title_text" placeholder="Enter Title Text" name="title_text">
                    <p class="admin_portfolio_item_error" id="admin_portfolio_item_title_text_validate"></p>
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
                    <p class="admin_portfolio_item_error" id="admin_portfolio_item_status_error"></p>
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
                    <p>Image</p>
                    <img id="image_preview" class="admin-img-div" src="<?php if (!empty($data['image'])) {
                                                        echo base_url($data['image']);
                                                    }  ?>.webp" alt="">
                </div>
            <?php } else { ?>
                <div class="col-md-6" hidden="true">
                    <p>Image</p>
                    <img id="image_preview" class="admin-img-div" src="#" alt="">
                </div>
            <?php } ?>
        </div>
    </div>
</div>
