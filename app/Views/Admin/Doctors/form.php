<div class="container-fluid row">
    <?php if ( isset( $doctor)) 
    {
        foreach ($doctor as  $data) {} ?>
        <h2>Edit Doctor</h2> <?php 
    } 
    else 
    { ?>
        <h2> Add Doctor</h2> <?php 
    } ?>

    <div class="row">
        <div class="col-md-9">
            <form action="<?php echo base_url('/admin/doctor/save') ?>/" class="was-validated1 row" method="POST" enctype="multipart/form-data">
                
                <div class="mb-3 col-md-4" hidden>
                    <label for="id" class="form-label">Id:</label>
                    <input value="<?php if (!empty($data['id'])) {
                                        echo $data['id'];
                                    } ?>" type="text" class="form-control" id="id" placeholder="Id" name="id">
                    <p class="admin_doctor_error" id="admin_doctor_id_validate"></p>
                </div>
                
                <div class="mb-3 col-md-4">
                    <label for="doctor_name" class="form-label">Doctor Name</label>
                    <input required value="<?php if (!empty($data['doctor_name'])) { echo $data['doctor_name'];  }?>" type="text" class="form-control" id="doctor_name" placeholder="Enter Doctor Name" name="doctor_name">
                    <p class="admin_doctor_error" id="admin_doctor_name_validate"></p>
                </div>
        
                <div class="mb-3 col-md-4">
                    <label for="meta_title" class="form-label">SEO Title</label>
                    <input required value="<?php if (!empty($data['meta_title'])) { echo $data['meta_title'];  }?>" type="text" class="form-control" id="meta_title" placeholder="Enter SEO Title" name="meta_title">
                    <p class="admin_doctor_error" id="admin_doctor_meta_title_validate"></p>
                </div>
                
                <div class="mb-3 col-md-4">
                    <label for="meta_description" class="form-label">SEO Description</label>
                    <input required value="<?php if (!empty($data['meta_description'])) { echo $data['meta_description'];  }?>" type="text" class="form-control" id="meta_description" placeholder="Enter SEO Description" name="meta_description">
                    <p class="admin_doctor_error" id="admin_doctor_meta_description_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="location_id" class="form-label"> Locations </label>
                    <select required class="selectpicker col-12" multiple aria-label="Select Locations" id="location_id"
                        placeholder="Select Locations" name="location_id[]">
                        <optgroup label="Select Location ">
                        <?php if (isset($locations)){foreach($locations as $single_location){ ?>
                        <option   value="<?php if(!empty($single_location['id']) ) { echo $single_location['id'] ;  }?>" 
                        <?php if(isset($selected_location))
                            {
                                 if(find_tag($single_location['id'],$selected_location))
                                 {
                                    echo 'selected';
                                 };
                            }                       
                        ?>	
                        > <?php if(!empty($single_location['locationName']) ) { echo $single_location['locationName']  ;} ?> </option>
                        <?php } }?>
                    </select>
                    <p class="admin_doctor_error" id="admin_doctor_location_id_validate" ></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="h1_tag" class="form-label">H1 Tag</label>
                    <input value="<?php if (!empty($data['h1_tag'])) { echo $data['h1_tag'];  }?>" type="text" class="form-control" id="h1_tag" placeholder="Enter H1 Tag" name="h1_tag">
                    <p class="admin_doctor_error" id="admin_doctor_h1_tag_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="doctor_image" class="form-label">Doctor Image</label>
                    <input  type="file" value=" <?php if (!empty($data['doctor_image'])) {
                                                    echo $data['doctor_image'];
                                                } ?>" class="form-control input_form_image" aria-label="file example" id="doctor_image" placeholder="Doctor Image" name="doctor_image">
                    <p class="admin_doctor_error" id="admin_doctor_image_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="doctor_thumb_image" class="form-label">Doctor Inner Image /Thumbnail Image</label>
                    <input  type="file" value=" <?php if (!empty($data['doctor_thumb_image'])) {
                                                    echo $data['doctor_thumb_image'];
                                                } ?>" class="form-control input_form_image" aria-label="file example" id="doctor_thumb_image" placeholder="Doctor Inner Image" name="doctor_thumb_image">
                    <p class="admin_doctor_error" id="admin_doctor_thumb_image_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="alt_text" class="form-label">Alt Text</label>
                    <input value="<?php if (!empty($data['alt_text'])) { echo $data['alt_text'];  }?>" type="text" class="form-control" id="alt_text" placeholder="Enter Alt Text" name="alt_text">
                    <p class="admin_doctor_error" id="admin_doctor_alt_text_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="title_text" class="form-label">Title Text</label>
                    <input value="<?php if (!empty($data['title_text'])) { echo $data['title_text'];  }?>" type="text" class="form-control" id="title_text" placeholder="Enter Title Text" name="title_text">
                    <p class="admin_doctor_error" id="admin_doctor_title_text_validate"></p>
                </div>
                
                <div class="mb-3 col-md-4">
                    <label for="department" class="form-label">Department</label>
                    <input value="<?php if (!empty($data['department'])) { echo $data['department'];  }?>" type="text" class="form-control" id="department" placeholder="Enter Department" name="department">
                    <p class="admin_doctor_error" id="admin_doctor_department_validate"></p>
                </div>


                <div class="mb-3 col-md-4">
                    <label for="doctor_url" class="form-label">Doctor Slug</label>
                    <input value="<?php if (!empty($data['doctor_url'])) { echo $data['doctor_url'];  }?>" type="text" class="form-control" id="doctor_url" placeholder="Enter Doctor Slug" name="doctor_url">
                    <p>Slug will be generated with hiphens and with no space using blog title if left empty</p>
                    <p class="admin_doctor_error" id="admin_doctor_url_validate"></p>
                </div>
                
                <div class="mb-3 col-md-4">
                    <label for="designation" class="form-label">Doctor Designation</label>
                    <input value="<?php if (!empty($data['designation'])) { echo $data['designation'];  }?>" type="text" class="form-control" id="designation" placeholder="Enter Doctor Designation" name="designation">
                    <p class="admin_doctor_error" id="admin_doctor_designation_validate"></p>
                </div>
                
                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label for="about" class="form-label">About</label>
                        <textarea value="" class="form-control ckeditor" id="about"
                        placeholder="Enter About" name="about"> <?php if( !empty($data['about']))   {echo html_entity_decode($data['about']); } ?></textarea>
                        <p class="admin_doctor_error" id="admin_doctor_about_validate"></p>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label for="qualification" class="form-label">Qualification</label>
                        <textarea value="" class="form-control ckeditor" id="qualification"
                        placeholder="Enter Qualification" name="qualification"> <?php if( !empty($data['qualification']))   {echo html_entity_decode($data['qualification']); } ?></textarea>
                        <p class="admin_doctor_error" id="admin_doctor_qualification_validate"></p>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label for="work_experience" class="form-label">Fields of Experience</label>
                        <textarea value="" class="form-control ckeditor" id="work_experience"
                        placeholder="Enter Fields of Experience" name="work_experience"> <?php if( !empty($data['work_experience']))   {echo html_entity_decode($data['work_experience']); } ?></textarea>
                        <p class="admin_doctor_error" id="admin_doctor_work_experience_validate"></p>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label for="publications" class="form-label">Publications</label>
                        <textarea value="" class="form-control ckeditor" id="publications"
                        placeholder="Enter Publications" name="publications"> <?php if( !empty($data['publications']))   {echo html_entity_decode($data['publications']); } ?></textarea>
                        <p class="admin_doctor_error" id="admin_doctor_publications_validate"></p>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label for="past_positions" class="form-label">Past Positions</label>
                        <textarea value="" class="form-control ckeditor" id="past_positions"
                        placeholder="Enter Past Positions" name="past_positions"> <?php if( !empty($data['past_positions']))   {echo html_entity_decode($data['past_positions']); } ?></textarea>
                        <p class="admin_doctor_error" id="admin_doctor_past_positions_validate"></p>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label for="fellow_member_ship" class="form-label">Fellow Membership</label>
                        <textarea value="" class="form-control ckeditor" id="fellow_member_ship"
                        placeholder="Enter Fellow Membership" name="fellow_member_ship"> <?php if( !empty($data['fellow_member_ship']))   {echo html_entity_decode($data['fellow_member_ship']); } ?></textarea>
                        <p class="admin_doctor_error" id="admin_doctor_fellow_member_ship_validate"></p>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label for="awards_recognitions" class="form-label">Awards and Recognitions</label>
                        <textarea value="" class="form-control ckeditor" id="awards_recognitions"
                        placeholder="Enter Awards and Recognitions" name="awards_recognitions"> <?php if( !empty($data['awards_recognitions']))   {echo html_entity_decode($data['awards_recognitions']); } ?></textarea>
                        <p class="admin_doctor_error" id="admin_doctor_awards_recognitions_validate"></p>
                    </div>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="doc_address" class="form-label">Doctor address</label>
                    <input value="<?php if (!empty($data['doc_address'])) { echo $data['doc_address'];  }?>" type="text" class="form-control" id="doc_address" placeholder="Enter Doctor address" name="doc_address">
                    <p class="admin_doctor_error" id="admin_doc_address_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="priority" class="form-label">Display Order</label>
                    <input value="<?php if (!empty($data['priority'])) { echo $data['priority'];  }?>" type="number" class="form-control" id="priority" placeholder="Enter Display Order *" name="priority">
                    <p class="admin_doctor_error" id="admin_doctor_priority_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="canonical_tag" class="form-label"> Canonical Tag</label>   
                    <input value="<?php if (!empty($data['canonical_tag'])) { echo $data['canonical_tag'];  }?>" type="url" class="form-control" id="canonical_tag" placeholder="Enter Canonical Tag" name="canonical_tag">                            
                    <p class="admin_doctor_error" id="admin_doc_address_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="active_status" class="form-label">Status</label>
                    <select required class="form-select" id="active_status" aria-label="select Active Status" name="active_status">
                        <option  class="text-success"  <?php if(!empty($data['active_status'])) { if ( $data['active_status'] == 'Y') {
                                                            echo "selected";
                                                        }  }?>  value='Y'>
                            Active</option>
                        <option class="text-danger" <?php if(!empty($data['active_status'])) {  if ($data['active_status'] == 'N') {
                                                        echo "selected";
                                                    }  } ?> value='N'>
                           Not Active</option>
                    </select>
                    <p class="admin_doctor_error" id="admin_doctor_active_status_validate"></p>
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
                    <p>Doctor Image</p>
                    <img id="doctor_image_preview" class="admin-img-div" src="<?php if (!empty($data['doctor_image'])) {
                                                        echo base_url($data['doctor_image']);
                                                    }  ?>.webp" alt="">
                </div>
                <div class="col-md-6">
                    <p>Doctor Inner Image /Thumbnail Image</p>
                    <img id="doctor_thumb_image_preview" class="admin-img-div" src="<?php if (!empty($data['doctor_thumb_image'])) {
                                                        echo base_url($data['doctor_thumb_image']);
                                                    }  ?>.webp" alt="">
                </div>
            <?php } else { ?>
                <div class="col-md-6" hidden="true">
                    <p>Doctor Image</p>
                    <img id="doctor_image_preview" class="admin-img-div" src="#" alt="">
                </div>
                <div class="col-md-6" hidden="true">
                    <p>Doctor Inner Image /Thumbnail Image</p>
                    <img id="doctor_thumb_image_preview" class="admin-img-div" src="#" alt="">
                </div>
            <?php } ?>
        </div>
    </div>
</div>
