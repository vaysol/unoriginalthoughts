<!-- Home Section starts here -->
<section class="home" id="home">
    <div class="swiper home-slider">
        <div class="swiper-wrapper">

            <!-- TODO: Slider buttons below the explore btn -->
            <div class='swiper-slide'>
                <div class='box' style="background: url('<?php echo base_url() ?>assets/img/banners/banner.jpg') no-repeat">
                    <a href='placeholder_url' class='btn slider-btn'>Explore</a>
                </div>
            </div>

            <!-- Add more slider items with placeholders -->

        </div>

        <div class="swiper-button-next carosal"></div>
        <div class="swiper-button-prev carosal"></div>

    </div>
</section>


<section class="featured" id="featured">

    <div class="cont">
        <h2 class="heading"><span>Best Sellers</span></h2>
    </div>

    <div class="swiper featured-slider container">
        <div class="swiper-wrapper">

            <!-- Placeholder for best seller products -->
            <div class='swiper-slide seller-box'>
                <div class='image'>
                    <a href='productview.php?productId=1'>
                        <img src='<?php echo base_url() ?>assets/img/banners/banner.jpg' alt='Product image'>
                    </a>
                    <i class='wishlist fas fa-heart' data-pid='1' data-type='addToWishList' onclick='handelATC_WL(event)'></i>
                </div>
                <div class='content'>
                    <a href='productview.php?productId=1'>
                        <h3>Product Name</h3>
                    </a>
                    <div class='price'>
                        <i class='fas fa-indian-rupee'></i>99/- 
                        <span><i class='fas fa-indian-rupee'></i> 120/- </span>
                    </div>
                    <div class='btn-grp'>
                        <a href='javascript:void(0);' class='checkout-btn' data-pid='1' data-type='addToCart' onclick='handelATC_WL(event)'>Add to cart</a>
                    </div> 
                </div>
            </div>

            <!-- Add more best seller products with placeholders -->

        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

    </div>

</section>
<!-- Best Seller Section ends -->


<!-- Souvenir Store starts here -->
<section class="Souvenir-store">
    <div class="cont">
        <h2 class="heading"><span>Souveniers</span></h2>
    </div>

    <div class="s_container">

        <!-- Placeholder for souvenir store subcategories -->
        <div class='s_item'>
            <a href='productlist.php?subid=1&supid=1'>
                <img src='<?php echo base_url() ?>assets/img/banners/banner.jpg' alt='Subcategory image' height='150rem'> 
            </a>
            <a href='productlist.php?subid=1&supid=1'>
                <h4 class='City-Name'>Subcategory Name</h4> 
            </a>
        </div>

        <!-- Add more souvenir store subcategories with placeholders -->

    </div>

    <a href="categorydisplay.php" class="Souvenir-store-btn">Find Your City</a>

</section>
<!-- Souvenir Store ends here -->

<!-- Shop and Portfolio starts -->
<section class="Portfolio" id="Portfolio">
    <div class="cont">
        <h2 class="heading"><span>Portfolio</span></h2>
    </div>

    <div class="swiper mySwiper container">
        <div class="swiper-wrapper">

            <!-- Placeholder for portfolio images -->
            <div class='card swiper-slide'>
                <a href='testimonial.php?pfid=1&pfn=Portfolio1'>
                    <img src='<?php echo base_url() ?>assets/img/banners/banner.jpg' alt='Portfolio Image'>
                </a>
                <div class='info'>
                    <a href='testimonial.php?pfid=1&pfn=Portfolio1' class='ViewMore'>View More Images</a>
                </div>
            </div>

            <!-- Add more portfolio images with placeholders -->

        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

    </div>

</section>
<!-- Shop and Portfolio ends -->


<!-- Service Section starts here -->
<section id="whyUs">
    <div class="cont">
        <h2 class="heading"><span>Why Us</span></h2>
    </div>

    <div class="service_container">
        <div class="service_item">
            <span class="illustration_img"><img src="<?php echo base_url(); ?>assets/old/images/website/whyUs1.png" alt="Illustration Image" height="200rem"></span>
            <div class="illustration_info">
                <h4>Hand-drawn with love</h4>
                <p>All our illustrations are straight from our heart to yours.
                    We hope you feel all the love that is poured into making these!
                </p>
            </div>
        </div>

        <div class="service_item">
            <span class="illustration_img"><img src="<?php echo base_url(); ?>assets/old/images/website/whyUs2.png" alt="Illustration Image" height="200rem"></span>
            <div class="illustration_info">
                <h4>Environmental friendly</h4>
                <p>The entire supply chain is designed to leave as little carbon prints as possible.
                    Packaging makes up for 30% of waste production in the world.
                    We have gone out of the way to reuse and recycle as much as possible
                </p>
            </div>
        </div>

        <div class="service_item">
            <span class="illustration_img"><img src="<?php echo base_url(); ?>assets/old/images/website/whyUs3.png" alt="Illustration Image" height="200rem"></span>
            <div class="illustration_info">
                <h4>Crafted to guarantee smiles</h4>
                <p>We have over 1000 happy customers and we cannot wait for you to join the community!
                </p>
            </div>
        </div>
    </div>
</section>
<!-- Service Section ends here -->
