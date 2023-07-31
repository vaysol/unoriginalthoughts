<section class="product-view">
    <div class="main-wrapper">
        <div class="container">
            <div class="product-div">
                <div class="product-div-left">
                    <div class="img-container">
                        <img src="<?php echo base_url() ?>assets/img/banners/banner.jpg" alt="Product Image">
                    </div>
                    <div class="hover-container">
                        <div><img src="<?php echo base_url() ?>assets/img/banners/banner.jpg"></div>
                        <!-- Add additional images here if available, remove PHP loop -->
                    </div>
                </div>
                <div class="product-div-right">
                    <span class="product-name">Product Name</span>
                    <span class="product-price">Price: <i class="fas fa-indian-rupee"></i> Price Here /-</span>
                    <!-- Add other static product details here -->
                    <div class="wrapper">
                        <span class="minus">-</span>
                        <span class="num">01</span>
                        <span class="plus">+</span>
                    </div>
                    <div class='btn-groups'>
                        <button type='button' class='add-cart-btn' data-type='addToCart' data-pid='" . $pid . "'
                            onclick='handelATC_WL(event, parseInt( num.innerText ) )'>
                            <i class='fas fa-shopping-cart'></i>add to cart
                        </button>
                        <button type='button' class='buy-now-btn' data-type='addToWishList' data-pid='" . $pid . "'
                            onclick='handelATC_WL(event, parseInt( num.innerText ) )'>
                            <i class='fas fa-heart'></i>Add to Wish list
                        </button>
                    </div> <!-- Add other static elements for dropdowns and buttons here -->

                    <div class="container-fluid">
                        <div class="accordion active">
                            <!-- <div class="accoridon-icon">>>></div> -->
                            <h5>Product Description</h5>
                        </div>
                        <div class="panel" id="productDesc">
                            <p>
                                Who wants to stare at an empty wall while regretting every life decisions ever made?
                                Glam up those boring walls with art that has your heart!
                                <br>
                                Giclee fine art print of the original illustration.
                                Paper thickness: 300 gsm art paper. ( A3 Poster printed on 180 gsm paper to prevent
                                cracks while rolling)
                                <br>
                                Dimensions:
                                • A3 - 12 x 18 Inches
                                • A4 - 9 x 12 Inches
                                • A5 - 6 x 8 Inches
                                Both framed and unframed options available. Frame provided is plain black of ½ inch
                                width.
                                <br>
                                Note: If you plan to purchase frame elsewhere, it is advisable to do so AFTER you
                                receive the art print to prevent size mismatch.
                                <br>
                                Colours might slightly vary due to monitor settings.
                                <br>
                                Ships within 5-7 days.
                                <br>
                                For custom sizes, please drop us a note at hello@unoriginalthoughts.in and we’ll try our
                                best to accommodate your requirement.
                                <br>
                                You may also like
                                <br>
                            </p>
                        </div>
                    </div> <!-- Add static content for accordion and other panels here -->
                </div>
            </div>
        </div>
    </div>
</section>
<section class="featured container" id="featured">
    <div class="cont">
        <h2 class="heading"><span>You may also like</span></h2>
    </div>
    <div class="swiper featured-slider">
        <div class="swiper-wrapper">
            <!-- Static Featured Product 1 -->
            <div class="swiper-slide seller-box">
                <div class="image">
                    <a href="productview.php?productId=1">
                        <img src="<?php echo base_url() ?>assets/img/banners/banner.jpg" alt="Product 1 image">
                    </a>
                    <i class="wishlist fas fa-heart" data-pid="1" data-type="addToWishList"
                        onclick="handelATC_WL(event)"></i>
                </div>
                <div class="content">
                    <a href="productview.php?productId=1">
                        <h3>Product 1 Name</h3>
                    </a>
                    <div class="price">
                        <i class="fas fa-indian-rupee"></i> Price Here /-
                    </div>
                    <div class="btn-grp">
                        <a href="javascript:void(0);" class="checkout-btn" data-pid="1" data-type="addToCart"
                            onclick="handelATC_WL(event)">Add to cart</a>
                    </div>
                </div>
            </div> <!-- Static Featured Product 2 -->
            <div class="swiper-slide seller-box">
                <div class="image">
                    <a href="productview.php?productId=2">
                        <img src="<?php echo base_url() ?>assets/img/banners/banner.jpg" alt="Product 2 image">
                    </a>
                    <i class="wishlist fas fa-heart" data-pid="2" data-type="addToWishList"
                        onclick="handelATC_WL(event)"></i>
                </div>
                <div class="content">
                    <a href="productview.php?productId=2">
                        <h3>Product 2 Name</h3>
                    </a>
                    <div class="price">
                        <i class="fas fa-indian-rupee"></i> Price of Product 2 /-
                    </div>
                    <div class="btn-grp">
                        <a href="javascript:void(0);" class="checkout-btn" data-pid="2" data-type="addToCart"
                            onclick="handelATC_WL(event)">Add to cart</a>
                    </div>
                </div>
            </div>
            <!-- Add more static featured products here if needed -->
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

</section>