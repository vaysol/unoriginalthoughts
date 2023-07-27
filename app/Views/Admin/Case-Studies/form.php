<div class="container-fluid row">
    <?php if ( isset( $case_study)) 
    {
        foreach ($case_study as  $data) {} ?>
        <h2>Edit Case-Study</h2> <?php 
    } 
    else 
    { ?>
        <h2> Add Case-Study</h2> <?php 
    } ?>

    <div class="row">
        <div class="col-md-9">
            <form action="<?php echo base_url('/admin/case-study/save') ?>/" class="was-validated1 row" method="POST" enctype="multipart/form-data">
                
                <div class="mb-3 col-md-4" hidden>
                    <label for="case_studies_id" class="form-label">Id:</label>
                    <input value="<?php if (!empty($data['case_studies_id'])) {
                                        echo $data['case_studies_id'];
                                    } ?>" type="text" class="form-control" id="case_studies_id" placeholder="Id" name="case_studies_id">
                    <p class="admin_case_study_error" id="admin_case_studies_id_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="title" class="form-label"> Title</label>
                    <input required value="<?php if (!empty($data['title'])) { echo $data['title'];  }?>" type="text" class="form-control" id="title" placeholder="Enter title" name="title">
                    <p class="admin_case_study_error" id="admin_case_studies_title_validate"></p>
                </div>
        
                <div class="mb-3 col-md-4">
                    <label for="case_studies_image" class="form-label">Case Study Inner Image</label>
                    <input  type="file" value=" <?php if (!empty($data['case_studies_image'])) {
                                                    echo $data['case_studies_image'];
                                                } ?>" class="form-control input_form_image" aria-label="file example" id="case_studies_image" placeholder="Case Study Inner Image" name="case_studies_image">
                    <p class="admin_case_study_error" id="admin_case_studies_image_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="alt_text" class="form-label"> Alt Text</label>
                    <input  value="<?php if (!empty($data['alt_text'])) { echo $data['alt_text'];  }?>" type="text" class="form-control" id="alt_text" placeholder="Enter Alt Text" name="alt_text">
                    <p class="admin_case_study_error" id="admin_case_studies_alt_text_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="title_text" class="form-label">Title Text</label>
                    <input  value="<?php if (!empty($data['title_text'])) { echo $data['title_text'];  }?>" type="text" class="form-control" id="title_text" placeholder="Enter title Text" name="title_text">
                    <p class="admin_case_study_error" id="admin_case_studies_title_text_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="banner_image" class="form-label">Case Study Banner Image</label>
                    <input  type="file" value=" <?php if (!empty($data['banner_image'])) {
                                                    echo $data['banner_image'];
                                                } ?>" class="form-control input_form_image" aria-label="file example" id="banner_image" placeholder="Case Study Banner Image" name="banner_image">
                    <p class="admin_case_study_error" id="admin_case_studies_banner_image_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="alt_text1" class="form-label"> Case Study Banner Image Alt Text </label>
                    <input  value="<?php if (!empty($data['alt_text1'])) { echo $data['alt_text1'];  }?>" type="text" class="form-control" id="alt_text1" placeholder="Enter Case Study Banner Image Alt Text " name="alt_text1">
                    <p class="admin_case_study_error" id="admin_case_studies_alt_text1_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="title_text1" class="form-label">Case Study Banner Image Title Text </label>
                    <input  value="<?php if (!empty($data['title_text1'])) { echo $data['title_text1'];  }?>" type="text" class="form-control" id="title_text1" placeholder="Enter Case Study Banner Image Title Text" name="title_text1">
                    <p class="admin_case_study_error" id="admin_case_studies_title_text1_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="published_date" class="form-label">Publish Date </label>
                    <input  value="<?php if (!empty($data['published_date'])) { echo $data['published_date'];  }?>" type="date" class="form-control" id="published_date" placeholder="Select Publish Date" name="published_date">
                    <p class="admin_case_study_error" id="admin_case_studies_published_date_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="slug" class="form-label">Slug</label>
                    <input  value="<?php if (!empty($data['slug'])) { echo $data['slug'];  }?>" type="text" class="form-control" id="slug" placeholder="Enter Slug" name="slug">
                    <p>Slug will be generated with hiphens and with no space using blog title if left empty</p>
                    <p class="admin_case_study_error" id="admin_case_studies_slug_validate"></p>
                </div>
                
                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label for="details" class="form-label">Details</label>
                        <textarea value="" class="form-control ckeditor" id="details"
                        placeholder="Enter Details" name="details"> <?php if( !empty($data['details']))   {echo html_entity_decode($data['details']); } ?></textarea>
                        <p class="admin_case_study_error" id="admin_case_studies_details_validate"></p>
                    </div>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="meta_title" class="form-label">SEO Title</label>
                    <input required  value="<?php if (!empty($data['meta_title'])) { echo $data['meta_title'];  }?>" type="text" class="form-control" id="meta_title" placeholder="Enter SEO Title" name="meta_title">
                    <p class="admin_case_study_error" id="admin_case_studies_meta_title_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="meta_description" class="form-label">SEO Description</label>
                    <input  required value="<?php if (!empty($data['meta_description'])) { echo $data['meta_description'];  }?>" type="text" class="form-control" id="meta_description" placeholder="Enter SEO Description" name="meta_description">
                    <p class="admin_case_study_error" id="admin_case_studies_meta_description_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="meta_keywords" class="form-label">SEO Keywords</label>
                    <input  value="<?php if (!empty($data['meta_keywords'])) { echo $data['meta_keywords'];  }?>" type="text" class="form-control" id="meta_keywords" placeholder="Enter SEO Keywords" name="meta_keywords">
                    <p class="admin_case_study_error" id="admin_case_studies_meta_keywords_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="other_meta_tags" class="form-label">Other SEO Tags</label>
                    <input  value="<?php if (!empty($data['other_meta_tags'])) { echo $data['other_meta_tags'];  }?>" type="text" class="form-control" id="other_meta_tags" placeholder="Enter Other Meta Tag" name="other_meta_tags">
                    <p class="admin_case_study_error" id="admin_case_studies_other_meta_tags_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="canonical_tag" class="form-label">Canonical Tag</label>
                    <input  value="<?php if (!empty($data['canonical_tag'])) { echo $data['canonical_tag'];  }?>" type="url" class="form-control" id="canonical_tag" placeholder="Enter Canonical" name="canonical_tag">
                    <p class="admin_case_study_error" id="admin_case_studies_canonical_tag_validate"></p>
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
                    <p class="admin_case_study_error" id="admin_case_studies_status_ind_validate"></p>
                </div>


                <div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>

        <!-- Image Div -->
        <div class="col-md-3">
            <?php if (isset($data)) { ?>
                <div class="col-md-6">
                    <p>Case Study Inner Image</p>
                    <img id="case_studies_image_preview" class="admin-img-div" src="<?php if (!empty($data['case_studies_image'])) {
                                                        echo base_url($data['case_studies_image']);
                                                    }  ?>.webp" alt="">
                </div>
                <div class="col-md-6">
                    <p>Case Study Banner Image</p>
                    <img id="banner_image_preview" class="admin-img-div" src="<?php if (!empty($data['banner_image'])) {
                                                        echo base_url($data['banner_image']);
                                                    }  ?>.webp" alt="">
                </div>
            <?php } else { ?>
                <div class="col-md-6" hidden="true">
                    <p>Case Study Inner Image</p>
                    <img id="case_studies_image_preview" class="admin-img-div" src="#" alt="">
                </div>
                <div class="col-md-6" hidden="true">
                    <p>Case Study Banner Image</p>
                    <img id="banner_image_preview" class="admin-img-div" src="#" alt="">
                </div>
            <?php } ?>
        </div>
    </div>
</div>
