<div class="container-fluid row">
    <?php if ( isset($product)) 
    {
        foreach ($product as  $data) {} ?>
        <h2>Edit Product</h2> <?php 
    } 
    else 
    { ?>
        <h2> Add product</h2> <?php 
    } ?>

    <div class="row">
        <div class="col-md-9">
            <form action="<?php echo base_url('/admin/product/save') ?>/" class="was-validated1 row" method="POST" enctype="multipart/form-data">
                
                <div class="mb-3 col-md-4" hidden>
                    <label for="id" class="form-label">Id:</label>
                    <input value="<?php if (!empty($data['id'])) {
                                        echo $data['id'];
                                    } ?>" type="text" class="form-control" id="id" placeholder="Id" name="id">
                    <p class="admin_product_error" id="admin_product_id_validate"></p>
                </div>
                
                <div class="mb-3 col-md-4">
                    <label for="title" class="form-label">Title</label>
                    <input required value="<?php if (!empty($data['title'])) { echo $data['title'];  }?>" type="text" class="form-control" id="title" placeholder="Enter Title" name="title">
                    <p class="admin_product_error" id="admin_product_title_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="priority" class="form-label">Priority</label>
                    <input required value="<?php if (!empty($data['priority'])) { echo $data['priority'];  }?>" type="number" class="form-control" id="priority" placeholder="Enter Priority" name="priority">
                    <p class="admin_product_error" id="admin_product_priority_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" value=" <?php if (!empty($data['image'])) {
                                                    echo $data['image'];
                                                } ?>" class="form-control input_form_image" aria-label="file example" id="image" placeholder="Image" name="image">
                    <p class="admin_product_error" id="admin_product_image_validate"></p>
                </div>

                
                <div class="mb-3 col-md-4">
                    <label for="image_1" class="form-label">Image 1</label>
                    <input type="file" value=" <?php if (!empty($data['image_1'])) {
                                                    echo $data['image_1'];
                                                } ?>" class="form-control input_form_image" aria-label="file example" id="image_1" placeholder="Image 1" name="image_1">
                    <p class="admin_product_error" id="admin_product_image_1_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="image_2" class="form-label"> Image 2</label>
                    <input type="file" value=" <?php if (!empty($data['image_2'])) {
                                                    echo $data['image_2'];
                                                } ?>" class="form-control input_form_image" aria-label="file example" id="image_2" placeholder="Image 2" name="image_2">
                    <p class="admin_product_error" id="admin_product_image_2_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="image_3" class="form-label"> Image 3</label>
                    <input type="file" value=" <?php if (!empty($data['image_3'])) {
                                                    echo $data['image_3'];
                                                } ?>" class="form-control input_form_image" aria-label="file example" id="image_3" placeholder="Image 3" name="image_3">
                    <p class="admin_product_error" id="admin_product_image_3_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="image_4" class="form-label">Image 4</label>
                    <input type="file" value=" <?php if (!empty($data['image_4'])) {
                                                    echo $data['image_4'];
                                                } ?>" class="form-control input_form_image" aria-label="file example" id="image_4" placeholder="Image 4" name="image_4">
                    <p class="admin_product_error" id="admin_product_image_4_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="image_5" class="form-label">Image 5 </label>
                    <input type="file" value=" <?php if (!empty($data['image_5'])) {
                                                    echo $data['image_5'];
                                                } ?>" class="form-control input_form_image" aria-label="file example" id="image_5" placeholder="Image 5" name="image_5">
                    <p class="admin_product_error" id="admin_product_image_5_validate"></p>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label for="image_description" class="form-label">Image Description</label>
                        <textarea value="" class="form-control ckeditor" id="image_description"
                        placeholder="Enter Image Description" name="image_description"> <?php if( !empty($data['image_description']))   {echo html_entity_decode($data['image_description']); } ?></textarea>
                        <p class="admin_product_error" id="admin_product_image_description_validate"></p>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label for="image_description_1" class="form-label">Image Description 1</label>
                        <textarea value="" class="form-control ckeditor" id="image_description_1"
                        placeholder="Enter Image Description 1" name="image_description_1"> <?php if( !empty($data['image_description_1']))   {echo html_entity_decode($data['image_description_1']); } ?></textarea>
                        <p class="admin_product_error" id="admin_product_image_description_1_validate"></p>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label for="image_description_2" class="form-label">Image Description 2</label>
                        <textarea value="" class="form-control ckeditor" id="image_description_2"
                        placeholder="Enter Image Description 2" name="image_description_2"> <?php if( !empty($data['image_description_2']))   {echo html_entity_decode($data['image_description_2']); } ?></textarea>
                        <p class="admin_product_error" id="admin_product_image_description_2_validate"></p>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label for="image_description_3" class="form-label">Image Description 3</label>
                        <textarea value="" class="form-control ckeditor" id="image_description_3"
                        placeholder="Enter Image Description 3" name="image_description_3"> <?php if( !empty($data['image_description_3']))   {echo html_entity_decode($data['image_description_3']); } ?></textarea>
                        <p class="admin_product_error" id="admin_product_image_description_3_validate"></p>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label for="image_description_4" class="form-label">Image Description 4</label>
                        <textarea value="" class="form-control ckeditor" id="image_description_4"
                        placeholder="Enter Image Description 4" name="image_description_4"> <?php if( !empty($data['image_description_4']))   {echo html_entity_decode($data['image_description_4']); } ?></textarea>
                        <p class="admin_product_error" id="admin_product_image_description_4_validate"></p>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label for="image_description_5" class="form-label">Image Description 5</label>
                        <textarea value="" class="form-control ckeditor" id="image_description_5"
                        placeholder="Enter Image Description" name="image_description_5"> <?php if( !empty($data['image_description_5']))   {echo html_entity_decode($data['image_description_5']); } ?></textarea>
                        <p class="admin_product_error" id="admin_product_image_description_5_validate"></p>
                    </div>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="price" class="form-label">Price</label>
                    <input required value="<?php if (!empty($data['price'])) { echo $data['price'];  }?>" type="number" class="form-control" id="price" placeholder="Enter Price" name="price">
                    <p class="admin_product_error" id="admin_product_price_validate"></p>
                </div>
                
                <div class="mb-3 col-md-4">
                    <label for="price_1" class="form-label">Price 1</label>
                    <input  value="<?php if (!empty($data['price_1'])) { echo $data['price_1'];  }?>" type="number" class="form-control" id="price_1" placeholder="Enter Price 1" name="price_1">
                    <p class="admin_product_error" id="admin_product_price_1_validate"></p>
                </div>
                
                <div class="mb-3 col-md-4">
                    <label for="price_2" class="form-label">Price 2 </label>
                    <input  value="<?php if (!empty($data['price_2'])) { echo $data['price_2'];  }?>" type="number" class="form-control" id="price_2" placeholder="Enter Price 2" name="price_2">
                    <p class="admin_product_error" id="admin_product_price_2_validate"></p>
                </div>
                
                <div class="mb-3 col-md-4">
                    <label for="price_3" class="form-label">Price 3</label>
                    <input  value="<?php if (!empty($data['price_3'])) { echo $data['price_3'];  }?>" type="number" class="form-control" id="price_3" placeholder="Enter Price 3" name="price_3">
                    <p class="admin_product_error" id="admin_product_price_3_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="price_4" class="form-label">Price 4</label>
                    <input  value="<?php if (!empty($data['price_4'])) { echo $data['price_4'];  }?>" type="number" class="form-control" id="price_4" placeholder="Enter Price 4" name="price_4">
                    <p class="admin_product_error" id="admin_product_price_4_validate"></p>
                </div>
                
                <div class="mb-3 col-md-4">
                    <label for="price_5" class="form-label">Price 5</label>
                    <input  value="<?php if (!empty($data['price_5'])) { echo $data['price_5'];  }?>" type="number" class="form-control" id="price_5" placeholder="Enter Price 5" name="price_5">
                    <p class="admin_product_error" id="admin_product_price_5_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="category_id" class="form-label">Product Category </label>
                    <select required class="selectpicker col-12" multiple aria-label="Select Category" id="category_id"
                        placeholder="Select Category" name="category_id[]">
                        <optgroup label="Select Category ">
                        <?php if (isset($product_categories)){foreach($product_categories as $single_product_category){ ?>
                        <option   value="<?php if(!empty($single_product_category['id']) ) { echo $single_product_category['id'] ;  }?>" 
                        <?php if(isset($selected_category_id))
                            {
                                 if(find_tag($single_product_category['id'],$selected_category_id))
                                 {
                                    echo 'selected';
                                 };
                            }                       
                        ?>	
                        > <?php if(!empty($single_product_category['title']) ) { echo $single_product_category['title']  ;} ?> </option>
                        <?php } }?>
                    </select>
                    <p class="admin_doctor_error" id="admin_doctor_location_id_validate" ></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="alt_text" class="form-label">Alt Text</label>
                    <input required value="<?php if (!empty($data['alt_text'])) { echo $data['alt_text'];  }?>" type="text" class="form-control" id="alt_text" placeholder="Enter Alt Text" name="alt_text">
                    <p class="admin_product_error" id="admin_product_alt_text_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="title_text" class="form-label">Title Text</label>
                    <input required value="<?php if (!empty($data['title_text'])) { echo $data['title_text'];  }?>" type="text" class="form-control" id="title_text" placeholder="Enter Title Text" name="title_text">
                    <p class="admin_product_error" id="admin_product_title_text_validate"></p>
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
                    <p class="admin_product_error" id="admin_product_status_error"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="on_sale" class="form-label">On Sale</label>
                    <select required class="form-select" aria-label="select On Sale" name="on_sale">
                        <option class="text-success" <?php if(!empty($data['on_sale'])) { if ( $data['on_sale'] == 1) {
                                                            echo "selected";
                                                        }  }?>  value=1>
                            On Sale</option>
                        <option class="text-danger" <?php if(!empty($data['on_sale'])) {  if ($data['on_sale'] == 0) {
                                                        echo "selected";
                                                    }  } ?> value=0>
                            No</option>
                    </select>
                    <p class="admin_product_error" id="admin_product_on_sale_error"></p>
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
                    <p>Mobile </p>
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
                    <p>Mobile </p>
                    <img id="mobile_image_preview" class="admin-img-div" src="#" alt="">
                </div>
            <?php } ?>
        </div>
    </div>
</div>
