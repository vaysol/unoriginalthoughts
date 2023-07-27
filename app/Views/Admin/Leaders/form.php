<div class="container-fluid row">
    <?php if ( isset( $leader)) 
    {
        foreach ($leader as  $data) {} ?>
        <h2>Edit Leader</h2> <?php 
    } 
    else 
    { ?>
        <h2> Add Leader</h2> <?php 
    } ?>

    <div class="row">
        <div class="col-md-9">
            <form action="<?php echo base_url('/admin/leader/save') ?>/" class="was-validated1 row" method="POST" enctype="multipart/form-data">
                
                <div class="mb-3 col-md-4" hidden>
                    <label for="leader_id" class="form-label">Id:</label>
                    <input value="<?php if (!empty($data['leader_id'])) {
                                        echo $data['leader_id'];
                                    } ?>" type="text" class="form-control" id="leader_id" placeholder="Id" name="leader_id">
                    <p class="admin_leader_error" id="admin_leader_id_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="title" class="form-label">Name</label>
                    <input value="<?php if (!empty($data['title'])) { echo $data['title'];  }?>" type="text" class="form-control" id="title" placeholder="Enter Name" name="title">
                    <p class="admin_leader_error" id="admin_leader_title_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="designation" class="form-label">Designation</label>
                    <input value="<?php if (!empty($data['designation'])) { echo $data['designation'];  }?>" type="text" class="form-control" id="designation" placeholder="Enter Designation" name="designation">
                    <p class="admin_leader_error" id="admin_leader_designation_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="display_order" class="form-label">Display Order</label>
                    <input value="<?php if (!empty($data['display_order'])) { echo $data['display_order'];  }?>" type="number" class="form-control" id="display_order" placeholder="Enter Display Order" name="display_order">
                    <p class="admin_leader_error" id="admin_leader_display_order_validate"></p>
                </div>
                
                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea value="" class="form-control ckeditor" id="description"
                        placeholder="Enter Description" name="description"> <?php if( !empty($data['description']))   {echo html_entity_decode($data['description']); } ?></textarea>
                        <p class="admin_leader_error" id="admin_leader_description_validate"></p>
                    </div>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="photo" class="form-label">Leader Image</label>
                    <input  type="file" value=" <?php if (!empty($data['photo'])) {
                                                    echo $data['photo'];
                                                } ?>" class="form-control input_form_image" aria-label="file example" id="photo" placeholder="Leader Image" name="photo">
                    <p class="admin_leader_error" id="admin_leader_photo_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="alt_text" class="form-label">Alt Text</label>
                    <input value="<?php if (!empty($data['alt_text'])) { echo $data['alt_text'];  }?>" type="text" class="form-control" id="alt_text" placeholder="Enter Alt Text" name="alt_text">
                    <p class="admin_leader_error" id="admin_leader_alt_text_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="title_text" class="form-label">Title Text</label>
                    <input value="<?php if (!empty($data['title_text'])) { echo $data['title_text'];  }?>" type="text" class="form-control" id="title_text" placeholder="Enter Title Text" name="title_text">
                    <p class="admin_leader_error" id="admin_leader_title_text_validate"></p>
                </div>

                
                <div class="mb-3 col-md-4">
                    <label for="meta_title" class="form-label">SEO Title</label>
                    <input value="<?php if (!empty($data['meta_title'])) { echo $data['meta_title'];  }?>" type="text" class="form-control" id="meta_title" placeholder="Enter SEO Title" name="meta_title">
                    <p class="admin_leader_error" id="admin_leader_meta_title_validate"></p>
                </div>

                
                <div class="mb-3 col-md-4">
                    <label for="meta_description" class="form-label">SEO Description</label>
                    <input value="<?php if (!empty($data['meta_description'])) { echo $data['meta_description'];  }?>" type="text" class="form-control" id="meta_description" placeholder="Enter SEO Description" name="meta_description">
                    <p class="admin_leader_error" id="admin_leader_meta_description_validate"></p>
                </div>


                <div class="mb-3 col-md-4">
                    <label for="meta_keywords" class="form-label">SEO Keywords</label>
                    <input value="<?php if (!empty($data['meta_keywords'])) { echo $data['meta_keywords'];  }?>" type="text" class="form-control" id="meta_keywords" placeholder="Enter SEO Keywords" name="meta_keywords">
                    <p class="admin_leader_error" id="admin_leader_meta_keywords_validate"></p>
                </div>

                
                <div class="mb-3 col-md-4">
                    <label for="other_meta_tags" class="form-label">Other Meta Tags</label>
                    <input value="<?php if (!empty($data['other_meta_tags'])) { echo $data['other_meta_tags'];  }?>" type="text" class="form-control" id="other_meta_tags" placeholder="Enter Other Meta Tags" name="other_meta_tags">
                    <p class="admin_leader_error" id="admin_leader_other_meta_tags_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="slug" class="form-label">Slug</label>
                    <input value="<?php if (!empty($data['slug'])) { echo $data['slug'];  }?>" type="text" class="form-control" id="slug" placeholder="Enter Slug" name="slug">
                    <p>Slug will be generated with highens and no space using Leader Name if left empty</p>
                    <p class="admin_leader_error" id="admin_leader_slug_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="canonical_tag" class="form-label">Canonical</label>
                    <input value="<?php if (!empty($data['canonical_tag'])) { echo $data['canonical_tag'];  }?>" type="text" class="form-control" id="canonical_tag" placeholder="Enter Canonical" name="canonical_tag">
                    <p class="admin_leader_error" id="admin_leader_canonical_tag_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="qualification" class="form-label">Qualification</label>
                    <input value="<?php if (!empty($data['qualification'])) { echo $data['qualification'];  }?>" type="text" class="form-control" id="qualification" placeholder="Enter Qualification" name="qualification">   
                    <p class="admin_leader_error" id="admin_leader_canonical_tag_validate"></p>
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
                    <p class="admin_leader_error" id="admin_leader_status_ind_validate"></p>
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
                    <p>Leader Image</p>
                    <img id="photo_preview" class="admin-img-div" src="<?php if (!empty($data['photo'])) {
                                                        echo base_url($data['photo']);
                                                    }  ?>.webp" alt="">
                </div>
            <?php } else { ?>
                <div class="col-md-6" hidden="true">
                    <p>Leader Image</p>
                    <img id="photo_preview" class="admin-img-div" src="#" alt="">
                </div>
            <?php } ?>
        </div>


    </div>
</div>
