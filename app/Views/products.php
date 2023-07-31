<section class="product-grid">
    <div class="illustration-heading" style="background: linear-gradient( to right, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.8) ), url('<?php echo base_url() ?>assets/img/banners/banner.jpg') no-repeat;">
        <h1>Your Title Here</h1>
    </div>

    <div class="product-container">
        <!-- Static Product Card 1 -->
        <div class="product-card swiper-slide seller-box">
            <div class="image">
                <a href="productview.php?productId=1">
                    <img src="<?php echo base_url() ?>assets/img/banners/banner.jpg" alt="Product 1 image">
                </a>
                <i class="wishlist fas fa-heart" data-pid="1" data-type="addToWishList" onclick="handelATC_WL(event)"></i>
            </div>
            <div class="content">
                <a href="productview.php?productId=1">
                    <h3>Product 1 Name</h3>
                </a>
                <div class="price">
                    <i class="fas fa-indian-rupee"></i>  Price Here /-
                </div>
                <div class="btn-grp">
                    <a href="javascript:void(0);" class="checkout-btn" data-pid="1" data-type="addToCart" onclick="handelATC_WL(event)">Add to cart</a>
                </div> 
            </div>
        </div>

        <!-- Static Product Card 2 -->
        <div class="product-card swiper-slide seller-box">
            <div class="image">
                <a href="productview.php?productId=2">
                    <img src="<?php echo base_url() ?>assets/img/banners/banner.jpg" alt="Product 2 image">
                </a>
                <i class="wishlist fas fa-heart" data-pid="2" data-type="addToWishList" onclick="handelATC_WL(event)"></i>
            </div>
            <div class="content">
                <a href="productview.php?productId=2">
                    <h3>Product 2 Name</h3>
                </a>
                <div class="price">
                    <i class="fas fa-indian-rupee"></i> Price of Product 2 /-
                </div>
                <div class="btn-grp">
                    <a href="javascript:void(0);" class="checkout-btn" data-pid="2" data-type="addToCart" onclick="handelATC_WL(event)">Add to cart</a>
                </div> 
            </div>
        </div>

        <!-- Add more static product cards for other products if needed -->
    </div>
</section>
