<div class="container-fluid row">
    <?php if ( isset( $blog)) 
    {
        foreach ($blog as  $data) {} ?>
        <h2>Edit Blog</h2> <?php 
    } 
    else 
    { ?>
        <h2> Add Blog</h2> <?php 
    } ?>

    <div class="row">
        <div class="col-md-9">
            <form action="<?php echo base_url('/admin/blog/save') ?>/" class="was-validated1 row" method="POST" enctype="multipart/form-data">
                
                <div class="mb-3 col-md-4" hidden>
                    <label for="blog_id" class="form-label">Id:</label>
                    <input value="<?php if (!empty($data['blog_id'])) {
                                        echo $data['blog_id'];
                                    } ?>" type="text" class="form-control" id="blog_id" placeholder="Id" name="blog_id">
                    <p class="admin_blog_error" id="admin_blog_id_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="blog_title" class="form-label">Blog Title</label>
                    <input required value="<?php if (!empty($data['blog_title'])) { echo $data['blog_title'];  }?>" type="text" class="form-control" id="blog_title" placeholder="Enter Blog title" name="blog_title">
                    <p class="admin_blog_error" id="admin_blog_title_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="blog_category" class="form-label">Blog Category</label>
                    <select required class="selectpicker col-12"  aria-label="Select Blog Category" id="blog_category"
                        placeholder="Select Blog Category" name="blog_category[]">
                        <optgroup label="Select Blog Category">
                        <?php if (isset($blog_categories)){foreach($blog_categories as $single_blog_category){ ?>
                        <option   value="<?php if(!empty($single_blog_category['blog_category_id']) ) { echo $single_blog_category['blog_category_id'] ;  }?>" 
                        <?php if(isset($selected_blog_category_id))
                            {
                                 if(find_tag($single_blog_category['blog_category_id'],$selected_blog_category_id))
                                 {
                                    echo 'selected';
                                 };
                            }                       
                        ?>	
                        >  <?php if(!empty($single_blog_category['blog_category_title']) ) { echo $single_blog_category['blog_category_title']  ;} ?> </option>
                        <?php } }?>
                    </select>
                    <p class="admin_blog_error" id="admin_blog_category_validate" ></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="meta_title" class="form-label">SEO Title</label>
                    <input required value="<?php if (!empty($data['meta_title'])) { echo $data['meta_title'];  }?>" type="text" class="form-control" id="meta_title" placeholder="Enter SEO Title" name="meta_title">
                    <p class="admin_blog_error" id="admin_meta_title_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="meta_keywords" class="form-label">SEO Keywords</label>
                    <input  value="<?php if (!empty($data['meta_keywords'])) { echo $data['meta_keywords'];  }?>" type="text" class="form-control" id="meta_keywords" placeholder="Enter SEO Keywords" name="meta_keywords">
                    <p class="admin_blog_error" id="admin_meta_keywords_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="meta_description" class="form-label">SEO Description</label>
                    <input required value="<?php if (!empty($data['meta_description'])) { echo $data['meta_description'];  }?>" type="text" class="form-control" id="meta_description" placeholder="Enter SEO Description" name="meta_description">
                    <p class="admin_blog_error" id="admin_meta_description_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="blog_image" class="form-label">Blog Image</label>
                    <input  type="file" value=" <?php if (!empty($data['blog_image'])) {
                                                    echo $data['blog_image'];
                                                } ?>" class="form-control input_form_image" aria-label="file example" id="blog_image" placeholder="Blog Image" name="blog_image">
                    <p class="admin_blog_error" id="admin_blog_image_validate"></p>
                </div>

                
                <div class="mb-3 col-md-4">
                    <label for="alt_text" class="form-label">Alt Text</label>
                    <input required value="<?php if (!empty($data['alt_text'])) { echo $data['alt_text'];  }?>" type="text" class="form-control" id="alt_text" placeholder="Enter Alt Text" name="alt_text">
                    <p class="admin_blog_error" id="admin_alt_text_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="title_text" class="form-label">Title Text</label>
                    <input required value="<?php if (!empty($data['title_text'])) { echo $data['title_text'];  }?>" type="text" class="form-control" id="title_text" placeholder="Enter Title Text" name="title_text">
                    <p class="admin_blog_error" id="admin_title_text_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="published_date" class="form-label">Publish Date</label>
                    <input  value="<?php if (!empty($data['published_date'])) { echo $data['published_date'];  }?>" type="date" class="form-control" id="published_date" placeholder="Select Pulish Date" name="published_date">
                    <p class="admin_blog_error" id="admin_published_date_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="inner_image" class="form-label">Blog Inner Image</label>
                    <input  type="file" value=" <?php if (!empty($data['inner_image'])) {
                                                    echo $data['inner_image'];
                                                } ?>" class="form-control input_form_image" aria-label="file example" id="inner_image" placeholder="Blog Inner Image" name="inner_image">
                    <p class="admin_blog_error" id="admin_inner_image_validate"></p>
                </div>

                
                <div class="mb-3 col-md-4">
                    <label for="doctor_id" class="form-label">Doctor</label>
                    <select  class="selectpicker col-12" multiple  aria-label="Select Doctor" id="doctor_id"
                        placeholder="Select Doctor" name="doctor_id[]">
                        <optgroup label="Select Doctor">
                        <?php if (isset($doctors)){foreach($doctors as $doctor){ ?>
                        <option   value="<?php if(!empty($doctor['id']) ) { echo $doctor['id'] ;  }?>" 
                        <?php if(isset($selected_doctor_id))
                            {
                                 if(find_tag($doctor['id'],$selected_doctor_id))
                                 {
                                    echo 'selected';
                                 };
                            }                       
                        ?>	
                        >  <?php if(!empty($doctor['doctor_name']) ) { echo $doctor['doctor_name']  ;} ?> </option>
                        <?php } }?>
                    </select>
                    <p class="admin_blog_error" id="admin_doctor_id_validate" ></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="blog_slug" class="form-label">Blog Slug</label>
                    <input  value="<?php if (!empty($data['blog_slug'])) { echo $data['blog_slug'];  }?>" type="text" class="form-control" id="blog_slug" placeholder="Enter Blog Slug*" name="blog_slug">
                    <p>Slug will be generated with hiphens and with no space using blog title if left empty</p>
                    <p class="admin_blog_error" id="admin_blog_slug_validate"></p>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label for="details" class="form-label">Blog Content</label>
                        <textarea value="" class="form-control ckeditor" id="details"
                        placeholder="Enter Blog Content" name="details"> <?php if( !empty($data['details']))   {echo html_entity_decode($data['details']); } ?></textarea>
                        <p class="admin_blog_error" id="admin_details_validate"></p>
                    </div>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="canonical_tag" class="form-label">Canonical URL</label>
                    <input  value="<?php if (!empty($data['canonical_tag'])) { echo $data['canonical_tag'];  }?>" type="text" class="form-control" id="canonical_tag" placeholder="Enter Canonical URL" name="canonical_tag">
                    <p class="admin_blog_error" id="admin_canonical_tag_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="blog_h1_tag" class="form-label">H1 Tag</label>
                    <input  value="<?php if (!empty($data['blog_h1_tag'])) { echo $data['blog_h1_tag'];  }?>" type="text" class="form-control" id="blog_h1_tag" placeholder="Enter H1 Tag" name="blog_h1_tag">
                    <p class="admin_blog_error" id="admin_blog_blog_h1_tag_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="display_order" class="form-label">Display Order</label>
                    <input required value="<?php if (!empty($data['display_order'])) { echo $data['display_order'];  }?>" type="number" class="form-control" id="display_order" placeholder="Enter Display Order" name="display_order">
                    <p class="admin_blog_error" id="admin_display_order_validate"></p>
                </div>

                
                <div class="mb-3 col-md-4">
                    <label for="homepage_display_order" class="form-label">Home Page Display Order</label>
                    <input required value="<?php if (!empty($data['homepage_display_order'])) { echo $data['homepage_display_order'];  }?>" type="number" class="form-control" id="homepage_display_order" placeholder="Enter Home Page Display Order" name="homepage_display_order">
                    <p class="admin_blog_error" id="admin_homepage_display_order_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="status_ind" class="form-label">Status</label>
                    <select required class="form-select" aria-label="select status_ind" name="status_ind">
                        <option class="text-success" <?php if(!empty($data['status_ind'])) { if ( $data['status_ind'] == 1) {
                                                            echo "selected";
                                                        }  }?>  value=1>
                            Active</option>
                        <option class="text-danger" <?php if(!empty($data['status_ind'])) {  if ($data['status_ind'] == 0) {
                                                        echo "selected";
                                                    }  } ?> value=0>
                            Not Active</option>
                    </select>
                    <p class="admin_blog_error" id="admin_status_ind_validate"></p>
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
                    <p>Blog Image</p>
                    <img id="blog_image_preview" class="admin-img-div" src="<?php if (!empty($data['blog_image'])) {
                                                        echo base_url($data['blog_image']);
                                                    }  ?>.webp" alt="">
                </div>
                <div class="col-md-6">
                    <p>Blog Inner Image</p>
                    <img id="inner_image_preview" class="admin-img-div" src="<?php if (!empty($data['inner_image'])) {
                                                        echo base_url($data['inner_image']);
                                                    }  ?>.webp" alt="">
                </div>
            <?php } else { ?>
                <div class="col-md-6" hidden="true">
                    <p>Blog Image</p>
                    <img id="blog_image_preview" class="admin-img-div" src="#" alt="">
                </div>
                <div class="col-md-6" hidden="true">
                    <p>Blog Inner Image</p>
                    <img id="inner_image_preview" class="admin-img-div" src="#" alt="">
                </div>
            <?php } ?>
        </div>
    </div>
</div>
