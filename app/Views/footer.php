   <!-- Footer Starts -->
   <section class="footer">
       <div class="box-container">
           <div class="footer-box">
               <h3>Quick links</h3>
               <a href="<?php echo base_url(); ?>">Home</a>
               <a href="products">Products</a>
               <a href="portfolio">Portfolio</a>
               <a href="about">About Us</a>
           </div>

           <div class="footer-box">
               <h3>Information</h3>
               <a href="faqs">FAQs</a>
               <a href="return-and-refund-policy">Return and Refund Policy</a>
               <a href="shipping-policy"> Shipping Policy </a>
               <a href="privacy-policy">Privacy Policies</a>
           </div>

           <div class="footer-box">
               <h3>Contact Us</h3>
               <div class="icons align-left">
                   <p> <a href="mailto:hello@unoriginalthoughts.com">
                           <i class="fa-brands fa-solid fa-envelope"></i>
                       </a>
                   </p>
                   <p> <a href="https://instagram.com/unoriginal__thoughts">
                           <i class="fa-brands fa-instagram"></i>
                       </a>
                   </p>
                   <p> <a href="https://www.pinterest.com/unoriginal__thoughts">
                           <i class="fa-brands fa-pinterest"></i>
                       </a>
                   </p>
               </div>
               <!-- <div class="icons">
                   <?php
                        if( isset( $contactInfo["phone"] ) && !empty( $contactInfo["phone"] ) ){
                            echo "
                                <a href='tel:" . $contactInfo["phone"] . "'>
                                    <i class='fa-brands fa-solid fa-phone'></i>
                                </a>
                            ";
                        }

                        if( isset( $contactInfo["email"] ) && !empty( $contactInfo["email"] ) ){
                            echo "
                                <a href='mailto:" . $contactInfo["email"] . "'>
                                    <i class='fa-brands fa-solid fa-envelope'></i>
                                </a>
                            ";
                        }

                        if( isset( $contactInfo["instagram"] ) && !empty( $contactInfo["instagram"] ) ){
                            echo "
                                <a href='https://instagram.com/" . $contactInfo["instagram"] . "'>
                                    <i class='fa-brands fa-instagram'></i>
                                </a>
                            ";
                        }

                        if( isset( $contactInfo["pinterest"] ) && !empty( $contactInfo["pinterest"] ) ){
                            echo "
                                <a href='" . $contactInfo["pinterest"] . "'>
                                    <i class='fa-brands fa-pinterest'></i>
                                </a>
                            ";
                        }

                        if( isset( $contactInfo["facebook"] ) && !empty( $contactInfo["facebook"] ) ){
                            echo "
                                <a href='https://facebook.com/" . $contactInfo["facebook"] . "'>
                                    <i class='fa-brands fa-facebook-f'></i>
                                </a>
                            ";
                        }
                    ?>
               </div> -->
           </div>
       </div>
   </section>
   <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
           class="bi bi-arrow-up-short"></i></a>

   <!-- Vendor JS Files -->
   <script src="<?php echo base_url(); ?>assets/vendor/purecounter/purecounter_vanilla.js"></script>
   <script src="<?php echo base_url(); ?>assets/vendor/aos/aos.js"></script>
   <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/vendor/swiper/swiper-bundle.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/vendor/php-email-form/validate.js"></script>


   <!-- Template Main JS File -->
   <script src="<?php echo base_url(); ?>assets/js/main.js"></script>

   <!-- Sweet ALert -->
   <script src="<?php echo base_url(); ?>assets/old/js/sweetalert2.js"></script>

   <!-- Custom JS file link -->
   <script src="<?php echo base_url(); ?>assets/old/js/navigationScript.js"></script>

   <!-- Swiper JS Script -->
   <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

   <script src="<?php echo base_url(); ?>assets/old/js/productHoverDisplay.js"></script>
   <script src="<?php echo base_url(); ?>assets/old/js/productview.js"></script>



   </body>

   </html>