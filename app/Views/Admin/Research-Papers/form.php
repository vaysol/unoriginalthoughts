<div class="container-fluid row">
    <?php if ( isset( $research_paper)) 
    {
        foreach ($research_paper as  $data) {} ?>
        <h2>Edit Research Paper</h2> <?php 
    } 
    else 
    { ?>
        <h2> Add Research Paper</h2> <?php 
    } ?>

    <div class="row">
        <div class="col-md-9">
            <form action="<?php echo base_url('/admin/research-paper/save') ?>/" class="was-validated1 row" method="POST" enctype="multipart/form-data">
                
                <div class="mb-3 col-md-4" hidden>
                    <label for="research_id" class="form-label">Id:</label>
                    <input value="<?php if (!empty($data['research_id'])) {
                                        echo $data['research_id'];
                                    } ?>" type="text" class="form-control" id="research_id" placeholder="Id" name="research_id">
                    <p class="admin_research_papers_error" id="admin_research_id_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="title" class="form-label"> Title</label>
                    <input required value="<?php if (!empty($data['title'])) { echo $data['title'];  }?>" type="text" class="form-control" id="title" placeholder="Enter Title" name="title">
                    <p class="admin_research_papers_error" id="admin_research_title_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="research_image" class="form-label">  Research Paper Inner Image</label>
                    <input  type="file" value=" <?php if (!empty($data['research_image'])) {
                                                    echo $data['research_image'];
                                                } ?>" class="form-control input_form_image" aria-label="file example" id="research_image" placeholder="Research Paper Inner Image" name="research_image">
                    <p class="admin_research_papers_error" id="admin_research_image_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="alt_text" class="form-label">Alt Text</label>
                    <input  value="<?php if (!empty($data['alt_text'])) { echo $data['alt_text'];  }?>" type="text" class="form-control" id="alt_text" placeholder="Enter Alt Text" name="alt_text">
                    <p class="admin_research_papers_error" id="admin_research_alt_text_validate"></p>
                </div>

                
                <div class="mb-3 col-md-4">
                    <label for="title_text" class="form-label">Title Text</label>
                    <input  value="<?php if (!empty($data['title_text'])) { echo $data['title_text'];  }?>" type="text" class="form-control" id="title_text" placeholder="Enter Title Text" name="title_text">
                    <p class="admin_research_papers_error" id="admin_research_title_text_validate"></p>
                </div>
                
                
                <div class="mb-3 col-md-4">
                    <label for="banner_image" class="form-label">Research Paper Banner Image</label>
                    <input  type="file" value=" <?php if (!empty($data['banner_image'])) {
                                                    echo $data['banner_image'];
                                                } ?>" class="form-control input_form_image" aria-label="file example" id="banner_image" placeholder="Research Banner Image" name="banner_image">
                    <p class="admin_research_papers_error" id="admin_research_banner_image_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="alt_text1" class="form-label"> Banner Image Alt Text</label>
                    <input  value="<?php if (!empty($data['alt_text1'])) { echo $data['alt_text1'];  }?>" type="text" class="form-control" id="alt_text1" placeholder="Enter  Banner Image Alt Text" name="alt_text1">
                    <p class="admin_research_papers_error" id="admin_research_alt_text1_validate"></p>
                </div>

                
                <div class="mb-3 col-md-4">
                    <label for="title_text1" class="form-label">Banner Image Title Text</label>
                    <input  value="<?php if (!empty($data['title_text1'])) { echo $data['title_text1'];  }?>" type="text" class="form-control" id="title_text1" placeholder="Enter Banner Image Title Text" name="title_text1">
                    <p class="admin_research_papers_error" id="admin_research_title_text1_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="published_date" class="form-label">Publish Date</label>
                    <input  value="<?php if (!empty($data['published_date'])) { echo $data['published_date'];  }?>" type="date" class="form-control" id="published_date" placeholder="Select Publish Date" name="published_date">
                    <p class="admin_research_papers_error" id="admin_research_published_date_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="slug" class="form-label">Slug</label>
                    <input  value="<?php if (!empty($data['slug'])) { echo $data['slug'];  }?>" type="text" class="form-control" id="slug" placeholder="Enter Slug" name="slug">
                    <p>Slug will be generated with hiphens and with no space using blog title if left empty</p>
                    <p class="admin_research_papers_error" id="admin_research_slug_validate"></p>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label for="details" class="form-label">Details</label>
                        <textarea value="" class="form-control ckeditor" id="details"
                        placeholder="Enter Details" name="details"> <?php if( !empty($data['details']))   {echo html_entity_decode($data['details']); } ?></textarea>
                        <p class="admin_research_papers_error" id="admin_research_details_validate"></p>
                    </div>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="meta_title" class="form-label">SEO Title</label>
                    <input required  value="<?php if (!empty($data['meta_title'])) { echo $data['meta_title'];  }?>" type="text" class="form-control" id="meta_title" placeholder="Enter SEO Title" name="meta_title">
                    <p class="admin_research_papers_error" id="admin_research_meta_title_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="meta_description" class="form-label">SEO Description</label>
                    <input  required value="<?php if (!empty($data['meta_description'])) { echo $data['meta_description'];  }?>" type="text" class="form-control" id="meta_description" placeholder="Enter SEO Description" name="meta_description">
                    <p class="admin_research_papers_error" id="admin_research_meta_description_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="meta_keywords" class="form-label">SEO Keywords</label>
                    <input  value="<?php if (!empty($data['meta_keywords'])) { echo $data['meta_keywords'];  }?>" type="text" class="form-control" id="meta_keywords" placeholder="Enter SEO Keywords" name="meta_keywords">
                    <p class="admin_research_papers_error" id="admin_research_meta_keywords_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="other_meta_tags" class="form-label">Other SEO Tags</label>
                    <input  value="<?php if (!empty($data['other_meta_tags'])) { echo $data['other_meta_tags'];  }?>" type="text" class="form-control" id="other_meta_tags" placeholder="Enter Other Meta Tag" name="other_meta_tags">
                    <p class="admin_research_papers_error" id="admin_research_other_meta_tags_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="canonical_tag" class="form-label">Canonical Tag</label>
                    <input  value="<?php if (!empty($data['canonical_tag'])) { echo $data['canonical_tag'];  }?>" type="url" class="form-control" id="canonical_tag" placeholder="Enter Canonical" name="canonical_tag">
                    <p class="admin_research_papers_error" id="admin_research_canonical_tag_validate"></p>
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
                    <p class="admin_research_papers_error" id="admin_research_status_ind_validate"></p>
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
                    <p>Banner Image</p>
                    <img id="banner_image_preview" class="admin-img-div" src="<?php if (!empty($data['banner_image'])) {
                                                        echo base_url($data['banner_image']);
                                                    }  ?>.webp" alt="">
                </div>
                <div class="col-md-6">
                    <p>Research Paper Inner Image</p>
                    <img id="research_image_preview" class="admin-img-div" src="<?php if (!empty($data['research_image'])) {
                                                        echo base_url($data['research_image']);
                                                    }  ?>.webp" alt="">
                </div>
            <?php } else { ?>
                <div class="col-md-6" hidden="true">
                    <p>Banner Image</p>
                    <img id="banner_image_preview" class="admin-img-div" src="#" alt="">
                </div>
                <div class="col-md-6" hidden="true">
                    <p>Research Paper Inner Image</p>
                    <img id="research_image_preview" class="admin-img-div" src="#" alt="">
                </div>
            <?php } ?>
        </div>
        
    </div>
</div>
