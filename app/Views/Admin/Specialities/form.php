<div class="container-fluid row">
    <?php if ( isset( $speciality)) 
    {
        foreach ($speciality as  $data) {} ?>
        <h2>Edit Speciality</h2> <?php 
    } 
    else 
    { ?>
        <h2> Add Speciality</h2> <?php 
    } ?>

    <div class="row">
        <div class="col-md-9">
            <form action="<?php echo base_url('/admin/speciality/save') ?>/" class="was-validated1 row" method="POST" enctype="multipart/form-data">
                
                <div class="mb-3 col-md-4" hidden>
                    <label for="speciality_id" class="form-label">Id:</label>
                    <input value="<?php if (!empty($data['speciality_id'])) {
                                        echo $data['speciality_id'];
                                    } ?>" type="text" class="form-control" id="speciality_id" placeholder="Id" name="speciality_id">
                    <p class="admin_speciality_error" id="admin_speciality_id_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="name" class="form-label"> Name</label>
                    <input required value="<?php if (!empty($data['name'])) { echo $data['name'];  }?>" type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
                    <p class="admin_speciality_error" id="admin_speciality_name_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="title" class="form-label"> Banner Title</label>
                    <input  value="<?php if (!empty($data['title'])) { echo $data['title'];  }?>" type="text" class="form-control" id="title" placeholder="Enter Banner Title " name="title">
                    <p class="admin_speciality_error" id="admin_speciality_title_validate"></p>
                </div>


                <div class="mb-3 col-md-4">
                    <label for="banner_image" class="form-label">Banner Image</label>
                    <input  type="file" value=" <?php if (!empty($data['banner_image'])) {
                                                    echo $data['banner_image'];
                                                } ?>" class="form-control input_form_image" aria-label="file example" id="banner_image" placeholder="Banner Image" name="banner_image">
                    <p class="admin_speciality_error" id="admin_speciality_banner_image_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="banner_image_text" class="form-label"> Banner Alt Text</label>
                    <input  value="<?php if (!empty($data['banner_image_text'])) { echo $data['banner_image_text'];  }?>" type="text" class="form-control" id="banner_image_text" placeholder="Enter Banner Alt Text" name="banner_image_text">
                    <p class="admin_speciality_error" id="admin_speciality_banner_image_text_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="banner_image_title" class="form-label"> Banner Title Text</label>
                    <input  value="<?php if (!empty($data['banner_image_title'])) { echo $data['banner_image_title'];  }?>" type="text" class="form-control" id="banner_image_title" placeholder="Enter Banner Title Text" name="banner_image_title">
                    <p class="admin_speciality_error" id="admin_speciality_banner_image_title_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="speciality_icon" class="form-label">Speciality Icon</label>
                    <input  type="file" value=" <?php if (!empty($data['speciality_icon'])) {
                                                    echo $data['speciality_icon'];
                                                } ?>" class="form-control input_form_image" aria-label="file example" id="speciality_icon" placeholder="Speciality Icon" name="speciality_icon">
                    <p class="admin_speciality_error" id="admin_speciality_speciality_icon_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="speciality_color_icon" class="form-label">Speciality Image</label>
                    <input  type="file" value=" <?php if (!empty($data['speciality_color_icon'])) {
                                                    echo $data['speciality_color_icon'];
                                                } ?>" class="form-control input_form_image" aria-label="file example" id="speciality_color_icon" placeholder="Speciality Image" name="speciality_color_icon">
                    <p class="admin_speciality_error" id="admin_speciality_speciality_color_icon_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="alt_text" class="form-label">  Alt Text</label>
                    <input  value="<?php if (!empty($data['alt_text'])) { echo $data['alt_text'];  }?>" type="text" class="form-control" id="alt_text" placeholder="Enter Alt Text" name="alt_text">
                    <p class="admin_speciality_error" id="admin_speciality_alt_text_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="title_text" class="form-label">  Title Text</label>
                    <input  value="<?php if (!empty($data['title_text'])) { echo $data['title_text'];  }?>" type="text" class="form-control" id="title_text" placeholder="Enter  Title Text" name="title_text">
                    <p class="admin_speciality_error" id="admin_speciality_title_text_validate"></p>
                </div>
                
                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea value="" class="form-control ckeditor" id="description"
                        placeholder="Enter Description" name="description"> <?php if( !empty($data['description']))   {echo html_entity_decode($data['description']); } ?></textarea>
                        <p class="admin_speciality_error" id="admin_speciality_description_validate"></p>
                    </div>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="what_do_we_offer_image" class="form-label">What do we offer at AMI?(Image)</label>
                    <input  type="file" value=" <?php if (!empty($data['what_do_we_offer_image'])) {
                                                    echo $data['what_do_we_offer_image'];
                                                } ?>" class="form-control input_form_image" aria-label="file example" id="what_do_we_offer_image" placeholder="What do we offer at AMI?(Image)" name="what_do_we_offer_image">
                    <p class="admin_speciality_error" id="admin_speciality_what_do_we_offer_image_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="wwo_image_text" class="form-label">WWO Image Alt Text</label>
                    <input  value="<?php if (!empty($data['wwo_image_text'])) { echo $data['wwo_image_text'];  }?>" type="text" class="form-control" id="wwo_image_text" placeholder="Enter WWO Image Alt Text" name="wwo_image_text">
                    <p class="admin_speciality_error" id="admin_speciality_wwo_image_text_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="wwo_image_title" class="form-label">  WWO Image Title Text</label>
                    <input  value="<?php if (!empty($data['wwo_image_title'])) { echo $data['wwo_image_title'];  }?>" type="text" class="form-control" id="wwo_image_title" placeholder="Enter WWO Image Title Text" name="wwo_image_title">
                    <p class="admin_speciality_error" id="admin_speciality_wwo_image_title_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="wwo_title1" class="form-label">  What do we offer at AMI?(Title 1)</label>
                    <input  value="<?php if (!empty($data['wwo_title1'])) { echo $data['wwo_title1'];  }?>" type="text" class="form-control" id="wwo_title1" placeholder="Enter What do we offer at AMI?(Title 1)" name="wwo_title1">
                    <p class="admin_speciality_error" id="admin_speciality_wwo_title1_validate"></p>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label for="wwo_text1" class="form-label">What do we offer at AMI?(Text 1)</label>
                        <textarea value="" class="form-control ckeditor" id="wwo_text1"
                        placeholder="Enter What do we offer at AMI?(Text 1)" name="wwo_text1"> <?php if( !empty($data['wwo_text1']))   {echo html_entity_decode($data['wwo_text1']); } ?></textarea>
                        <p class="admin_speciality_error" id="admin_speciality_wwo_text1_validate"></p>
                    </div>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="wwo_title2" class="form-label">  What do we offer at AMI?(Title 2)</label>
                    <input  value="<?php if (!empty($data['wwo_title2'])) { echo $data['wwo_title2'];  }?>" type="text" class="form-control" id="wwo_title2" placeholder="Enter What do we offer at AMI?(Title 2)" name="wwo_title2">
                    <p class="admin_speciality_error" id="admin_speciality_wwo_title2_validate"></p>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label for="wwo_text2" class="form-label">What do we offer at AMI?(Text 2)</label>
                        <textarea value="" class="form-control ckeditor" id="wwo_text2"
                        placeholder="Enter What do we offer at AMI?(Text 2)" name="wwo_text2"> <?php if( !empty($data['wwo_text2']))   {echo html_entity_decode($data['wwo_text2']); } ?></textarea>
                        <p class="admin_speciality_error" id="admin_speciality_wwo_text2_validate"></p>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label for="offer_desc" class="form-label">Description</label>
                        <textarea value="" class="form-control ckeditor" id="offer_desc"
                        placeholder="Enter Description" name="offer_desc"> <?php if( !empty($data['offer_desc']))   {echo html_entity_decode($data['offer_desc']); } ?></textarea>
                        <p class="admin_speciality_error" id="admin_speciality_offer_desc_validate"></p>
                    </div>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="meta_title" class="form-label">  SEO Title</label>
                    <input  value="<?php if (!empty($data['meta_title'])) { echo $data['meta_title'];  }?>" type="text" class="form-control" id="meta_title" placeholder="Enter SEO Title" name="meta_title">
                    <p class="admin_speciality_error" id="admin_speciality_meta_title_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="meta_keywords" class="form-label">  SEO Keywords</label>
                    <input  value="<?php if (!empty($data['meta_keywords'])) { echo $data['meta_keywords'];  }?>" type="text" class="form-control" id="meta_keywords" placeholder="Enter SEO Keywords" name="meta_keywords">
                    <p class="admin_speciality_error" id="admin_speciality_meta_keywords_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="meta_description" class="form-label">  SEO Description</label>
                    <input  value="<?php if (!empty($data['meta_description'])) { echo $data['meta_description'];  }?>" type="text" class="form-control" id="meta_description" placeholder="Enter SEO Description" name="meta_description">
                    <p class="admin_speciality_error" id="admin_speciality_meta_description_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="h1_tag" class="form-label">  H1 Tag</label>
                    <input  value="<?php if (!empty($data['h1_tag'])) { echo $data['h1_tag'];  }?>" type="text" class="form-control" id="h1_tag" placeholder="Enter H1 Tag" name="h1_tag">
                    <p class="admin_speciality_error" id="admin_speciality_h1_tag_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="faq_script" class="form-label">  Speciality FAQ Script</label>
                    <input  value="<?php if (!empty($data['faq_script'])) { echo $data['faq_script'];  }?>" type="text" class="form-control" id="faq_script" placeholder="Enter Speciality FAQ Script" name="faq_script">
                    <p class="admin_speciality_error" id="admin_speciality_faq_script_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="speciality_url" class="form-label">  Slug</label>
                    <input  value="<?php if (!empty($data['speciality_url'])) { echo $data['speciality_url'];  }?>" type="text" class="form-control" id="speciality_url" placeholder="Enter Slug" name="speciality_url">
                    <p class="admin_speciality_error" id="admin_speciality_speciality_url_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="display_order" class="form-label"> Display Order</label>
                    <input  value="<?php if (!empty($data['display_order'])) { echo $data['display_order'];  }?>" type="number" class="form-control" id="display_order" placeholder="Enter Display Order" name="display_order">
                    <p class="admin_speciality_error" id="admin_speciality_display_order_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="doctor_id" class="form-label">Doctors</label>
                    <select  class="selectpicker col-12" multiple  aria-label="Select Doctor" id="doctor_id"
                        placeholder="Select Doctor" name="doctor_id[]">
                        <optgroup label="Select Doctor">
                        <?php if (isset($doctors)){foreach($doctors as $doctor){ ?>
                        <option   value="<?php if(!empty($doctor['id']) ) { echo $doctor['id'] ;  }?>" 
                        <?php if(isset($selected_doctors_id))
                            {
                                 if(find_tag($doctor['id'],$selected_doctors_id))
                                 {
                                    echo 'selected';
                                 };
                            }                       
                        ?>	
                        >  <?php if(!empty($doctor['doctor_name']) ) { echo $doctor['doctor_name']  ;} ?> </option>
                        <?php } }?>
                    </select>
                    <p class="admin_speciality_error" id="admin_speciality_doctor_id_validate" ></p>
                </div>



                <div class="mb-3 col-md-4">
                    <label for="speciality_type" class="form-label">Speciality Type</label>
                    <select  class="selectpicker col-12"   aria-label="Select speciality Type" id="speciality_type"
                        placeholder="Select Speciality Type" name="speciality_type[]">
                        <optgroup label="Select Speciality Type">
                        <?php if (isset($speciality_types)){foreach($speciality_types as $speciality_type){ ?>
                        <option   value="<?php if(!empty($speciality_type['speciality_type_id']) ) { echo $speciality_type['speciality_type_id'] ;  }?>" 
                        <?php if(isset($selected_speciality_types))
                            {
                                 if(find_tag($speciality_type['speciality_type_id'],$selected_speciality_types))
                                 {
                                    echo 'selected';
                                 };
                            }                       
                        ?>	
                        >  <?php if(!empty($speciality_type['name']) ) { echo $speciality_type['name']  ;} ?> </option>
                        <?php } }?>
                    </select>
                    <p class="admin_speciality_error" id="admin_speciality_speciality_type_validate" ></p>
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
                    <p class="admin_speciality_error" id="admin_speciality_active_status_validate"></p>
                </div>


                <div>
                    <button type="submit"  class="btn btn-success">Submit</button>
                </div>


            </form>
        </div>

        <div class="col-md-3">
            <?php if (isset($data)) { ?>
                <div class="col-md-6">
                    <p>Banner Image</p>
                    <img id="banner_image_preview" class="admin-img-div" src="<?php if (!empty($data['banner_image'])) {
                                                        echo base_url($data['banner_image']);
                                                    }  ?>.webp" alt="">
                </div>
                <div class="col-md-6">
                    <p>Speciality Icon</p>
                    <img id="speciality_icon_preview" class="admin-img-div" src="<?php if (!empty($data['speciality_icon'])) {
                                                        echo base_url($data['speciality_icon']);
                                                    }  ?>.webp" alt="">
                </div>
                <div class="col-md-6">
                    <p>Speciality Image</p>
                    <img id="speciality_color_icon_preview" class="admin-img-div" src="<?php if (!empty($data['speciality_color_icon'])) {
                                                        echo base_url($data['speciality_color_icon']);
                                                    }  ?>.webp" alt="">
                </div>
                <div class="col-md-6">
                    <p>What do we offer at AMI?(Image)</p>
                    <img id="what_do_we_offer_image_preview" class="admin-img-div" src="<?php if (!empty($data['what_do_we_offer_image'])) {
                                                        echo base_url($data['what_do_we_offer_image']);
                                                    }  ?>.webp" alt="">
                </div>
            <?php } else { ?>
                <div class="col-md-6" hidden="true">
                    <p>Banner Image</p>
                    <img id="banner_image_preview" class="admin-img-div" src="#" alt="">
                </div>
                <div class="col-md-6" hidden="true">
                    <p>Speciality Icon</p>
                    <img id="speciality_icon_preview" class="admin-img-div" src="#" alt="">
                </div>
                <div class="col-md-6" hidden="true">
                    <p>Speciality Icon</p>
                    <img id="speciality_color_icon_preview" class="admin-img-div" src="#" alt="">
                </div>
                <div class="col-md-6" hidden="true">
                    <p>What do we offer at AMI?(Image)</p>
                    <img id="what_do_we_offer_image_preview" class="admin-img-div" src="#" alt="">
                </div>
            <?php } ?>
        </div>

    </div>
</div>
