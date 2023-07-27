<div class="container-fluid row">
    <?php if ( isset( $blog_category)) 
    {
        foreach ($blog_category as  $data) {} ?>
        <h2>Edit Blog Category</h2> <?php 
    } 
    else 
    { ?>
        <h2> Add Blog Category</h2> <?php 
    } ?>

    <div class="row">
        <div class="col-md-9">
            <form action="<?php echo base_url('/admin/blog-category/save') ?>/" class="was-validated1 row" method="POST" enctype="multipart/form-data">
                
                <div class="mb-3 col-md-4" hidden>
                    <label for="blog_category_id" class="form-label">Id:</label>
                    <input value="<?php if (!empty($data['blog_category_id'])) {
                                        echo $data['blog_category_id'];
                                    } ?>" type="text" class="form-control" id="blog_category_id" placeholder="Id" name="blog_category_id">
                    <p class="admin_blog_category_error" id="admin_blog_category_id_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="blog_category_title" class="form-label">Blog Category Title</label>
                    <input required value="<?php if (!empty($data['blog_category_title'])) { echo $data['blog_category_title'];  }?>" type="text" class="form-control" id="blog_category_title" placeholder="Enter Blog Category Title" name="blog_category_title">
                    <p class="admin_blog_category_error" id="admin_blog_category_title_validate"></p>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="blog_category_slug" class="form-label">Slug</label>
                    <input  value="<?php if (!empty($data['blog_category_slug'])) { echo $data['blog_category_slug'];  }?>" type="text" class="form-control" id="blog_category_slug" placeholder="Slug" name="blog_category_slug">
                    <p>Slug will be generated with hiphens and with no space using blog title if left empty</p>
                    <p class="admin_blog_category_error" id="admin_blog_category_slug_validate"></p>
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
                    <p class="admin_blog_category_error" id="admin_blog_active_status_validate"></p>
                </div>
                

                <div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>


            </form>
        </div>
    </div>
</div>
