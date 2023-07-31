
<body>
    <section class="aboutUs">
        <div class="main">
            <img src="<?php echo base_url(); ?>assets/old/images/website/AboutUs.png" alt="About Us Logo">
            <div class="all-text">
                <!-- <h4>About Us</h4> -->
                <!-- <h1>Un-Original Thoughts</h1> -->
                <p>
                    <br>Hello from Team Unoriginal Thoughts!<br><br>

                    We are a half-human, half-pooch dream team based out of the lovely-weathered city of 
                    Bengaluru.Our brand name is inspired from the idea that no thought in itself is purely 
                    original, but is an amalgamation of various sources of inspiration. Our designs are 
                    inspired from all things around us.<br>
 
                    Our products are designed to kindle a sense of joy and nostalgia and are crafted to 
                    put a smile on your face. We are proud to say all our products are manufactured in 
                    India with lots of love and care and attention to detail.<br>

                    Who doesn't love to see a caricature version of themselves and their loved ones? 
                    Wedding card designs have to be our favourite custom projects. The level of detailing 
                    and love that goes into creating these custom works makes them all the more special! 
                    Do check out our <a href="portfolio.php">Portfolio</a> section to see some of our work.<br>

                    We are always on the lookout for unique collaboration projects with ethical brands. 
                    The kind of collaborations that challenge us to think outside the box. We aim to 
                    bring illustration into mainstream marketing with design-centric thinking. If this is 
                    something that interests you, then say hey at <?= ( isset( $dataJSON["contact_information"]["email"] ) )? "<a href='mailto:" . $dataJSON["contact_information"]["email"] . "'>" . $dataJSON["contact_information"]["email"] . "</a>" : ""  ?>.<br><br>

                    Love,<br>
                    Amsa and Leo.
                </p>
            </div>
        </div>
        
    </section>
</body>