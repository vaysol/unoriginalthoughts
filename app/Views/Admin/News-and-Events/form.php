<div class="container-fluid row">
    <?php if ( isset( $news_and_event)) 
    {
        foreach ($news_and_event as  $data) {} ?>
        <h2>Edit News and Event</h2> <?php 
    } 
    else 
    { ?>
        <h2> Add News and Event</h2> <?php 
    } ?>

    <div class="row">
        <div class="col-md-9">
            <form action="<?php echo base_url('/admin/news-event/save') ?>/" class="was-validated1 row" method="POST" enctype="multipart/form-data">
                
                <div class="mb-3 col-md-4" hidden>
                    <label for="release_id" class="form-label">Id:</label>
                    <input value="<?php if (!empty($data['release_id'])) {
                                        echo $data['release_id'];
                                    } ?>" type="text" class="form-control" id="release_id" placeholder="Id" name="release_id">
                    <p class="admin_news_event_error" id="admin_news_event_release_id_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="title" class="form-label"> Title</label>
                    <input required value="<?php if (!empty($data['title'])) { echo $data['title'];  }?>" type="text" class="form-control" id="title" placeholder="Enter Title" name="title">
                    <p class="admin_news_event_error" id="admin_news_event_title_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="meta_title" class="form-label">SEO Title</label>
                    <input required value="<?php if (!empty($data['meta_title'])) { echo $data['meta_title'];  }?>" type="text" class="form-control" id="meta_title" placeholder="Enter SEO Title" name="meta_title">
                    <p class="admin_news_event_error" id="admin_news_event_meta_title_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="meta_description" class="form-label">SEO Description</label>
                    <input required value="<?php if (!empty($data['meta_description'])) { echo $data['meta_description'];  }?>" type="text" class="form-control" id="meta_description" placeholder="Enter SEO Description" name="meta_description">
                    <p class="admin_news_event_error" id="admin_news_event_meta_description_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="meta_keywords" class="form-label">SEO Keywords</label>
                    <input  value="<?php if (!empty($data['meta_keywords'])) { echo $data['meta_keywords'];  }?>" type="text" class="form-control" id="meta_keywords" placeholder="Enter SEO Keywords" name="meta_keywords">
                    <p class="admin_news_event_error" id="admin_news_event_meta_keywords_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="media_type" class="form-label">Media Type</label>
                    <select required class="form-select" aria-label="select media_type" name="media_type">
                        <option  <?php if(!empty($data['media_type'])) { if ( $data['media_type'] == 'Events') {
                                                            echo "selected";
                                                        }  }?>  value='Events'>
                            Events</option>
                        <option <?php if(!empty($data['media_type'])) {  if ($data['media_type'] == 'News') {
                                                        echo "selected";
                                                    }  } ?> value='News'>
                           News</option>
                    </select>
                    <p class="admin_news_event_error" id="admin_news_event_media_type_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="banner_image" class="form-label">Banner Image</label>
                    <input  type="file" value=" <?php if (!empty($data['banner_image'])) {
                                                    echo $data['banner_image'];
                                                } ?>" class="form-control input_form_image" aria-label="file example" id="banner_image" placeholder="News and Event Banner Image" name="banner_image">
                    <p class="admin_news_event_error" id="admin_news_event_banner_image_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="inner_image" class="form-label">Inner Image</label>
                    <input  type="file" value=" <?php if (!empty($data['inner_image'])) {
                                                    echo $data['inner_image'];
                                                } ?>" class="form-control input_form_image" aria-label="file example" id="inner_image" placeholder="News and Events Inner Image" name="inner_image">
                    <p class="admin_news_event_error" id="admin_news_event_inner_image_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="alt_text" class="form-label">Alt Text</label>
                    <input  value="<?php if (!empty($data['alt_text'])) { echo $data['alt_text'];  }?>" type="text" class="form-control" id="alt_text" placeholder="Enter Alt Text" name="alt_text">
                    <p class="admin_news_event_error" id="admin_news_event_alt_text_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="title_text" class="form-label">Title Text</label>
                    <input  value="<?php if (!empty($data['title_text'])) { echo $data['title_text'];  }?>" type="text" class="form-control" id="title_text" placeholder="Enter Title Text" name="title_text">
                    <p class="admin_news_event_error" id="admin_news_event_title_text_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="published_date" class="form-label">Publish Date</label>
                    <input  value="<?php if (!empty($data['published_date'])) { echo $data['published_date'];  }?>" type="date" class="form-control" id="published_date" placeholder="Select Publish Date" name="published_date">
                    <p class="admin_news_event_error" id="admin_news_event_published_date_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="publication" class="form-label">Publication</label>
                    <input  value="<?php if (!empty($data['publication'])) { echo $data['publication'];  }?>" type="text" class="form-control" id="publication" placeholder="Enter Publication" name="publication">
                    <p class="admin_news_event_error" id="admin_news_event_publication_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="year" class="form-label">Year</label>
                    <input  value="<?php if (!empty($data['year'])) { echo $data['year'];  }?>" type="text" class="form-control" id="year" placeholder="Enter Year" name="year">
                    <p class="admin_news_event_error" id="admin_news_event_year_validate"></p>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label for="details" class="form-label">Details</label>
                        <textarea value="" class="form-control ckeditor" id="details"
                        placeholder="Enter Details" name="details"> <?php if( !empty($data['details']))   {echo html_entity_decode($data['details']); } ?></textarea>
                        <p class="admin_news_event_error" id="admin_news_event_details_validate"></p>
                    </div>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="slug" class="form-label">Slug</label>
                    <input  value="<?php if (!empty($data['slug'])) { echo $data['slug'];  }?>" type="text" class="form-control" id="slug" placeholder="Enter Slug" name="slug">
                    <p>Slug will be generated with hiphens and with no space using blog title if left empty</p>
                    <p class="admin_news_event_error" id="admin_news_slug_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="active_status" class="form-label">Status</label>
                    <select required class="form-select" id="active_status" aria-label="select Active Status" name="active_status">
                        <option  <?php if(!empty($data['active_status'])) { if ( $data['active_status'] == 'Y') {
                                                            echo "selected";
                                                        }  }?>  value='Y'>
                            Active</option>
                        <option <?php if(!empty($data['active_status'])) {  if ($data['active_status'] == 'N') {
                                                        echo "selected";
                                                    }  } ?> value='N'>
                           Not Active</option>
                    </select>
                    <p class="admin_news_event_error" id="admin_news_event_media_type_validate"></p>
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
                    <p>Inner Image</p>
                    <img id="inner_image_preview" class="admin-img-div" src="<?php if (!empty($data['inner_image'])) {
                                                        echo base_url($data['inner_image']);
                                                    }  ?>.webp" alt="">
                </div>
            <?php } else { ?>
                <div class="col-md-6" hidden="true">
                    <p>Banner Image</p>
                    <img id="banner_image_preview" class="admin-img-div" src="#" alt="">
                </div>
                <div class="col-md-6" hidden="true">
                    <p>Inner Image</p>
                    <img id="inner_image_preview" class="admin-img-div" src="#" alt="">
                </div>
            <?php } ?>
        </div>
    </div>
</div>
