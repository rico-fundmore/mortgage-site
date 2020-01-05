<?php 
$title = "Mortgage Software Demo | FundMore.ai";
$metades = '<meta name="description" content="We can improve the way you assess and approve mortgages throughout the underwriting process.">';
include "default/header.php";
?>

<!-- Header Section Start -->
<!-- ===================================================================================================== -->
        <header class="sub_banners demop">

        
            <div class="container">
            <div class="row ">
                    <div class="col-lg-6">
                        <h1>Automated Underwriting Made Easy</h1>
                        <h2>Fully-Committed Mortgages in Minutes</h2>
                        <p>We can improve the way you assess and approve mortgages throughout the underwriting process. 
                            <br>See why FundMore.ai is the right choice to help your business scale, improve its productivity, cut costs, and boost client satisfaction.</p>
                        <a class="btn sub_btn a_btn" href="how-it-works">Learn More<i class="fa fa-lightbulb-o" aria-hidden="true"></i></a>
                    </div>
                    <div class="col-lg-6 video_top">
                        <!-- <img src="img/video.png" alt=""> -->
                        <div id="playVideo" data-toggle="modal" data-target="#myModal">
                        <img src="img/play.png" alt="demo-video">
                        </div>
                        <div class="modal fade demoVideo" id="myModal" role="dialog">
                            <div class="modal-dialog">
                            
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                <iframe id="video" width="560" height="315" src="https://www.youtube.com/embed/oWVPypmtBxc?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!-- ===================================================================================================== -->





<?php 
include "default/nav.php";
?>  






<!-- MAIN CONTENT Start -->
<!-- ===================================================================================================== -->
        <section id="contact" class="section contact_section">
        <div class="row contact-wrapper">

<div class="col-md-5 left_form">
    <div class="contact_container">
        <h3><strong>Book Your 1-on-1 Demo</strong></h3>
        <p>Are you interested in seeing how FundMore.ai can enhance your underwriting processes?<br> Complete the short form to schedule your no-obligation demo.</p>
        

<?php 
include "post/contactForm.php";
?>
            

        </section>
<!-- ===================================================================================================== -->





        <!-- Call to action Section Start -->
        <section class="section ca_section_g">
            <div class="container">
                <div class="ca">
                    <h2>Need Help? We're Always Here For You.</h2>
                    <button type="button" class="btn grn_btn fx"><a href="contact-us">Contact Us</a></button>
                </div>
            </div>
        </section>
        <!-- Call to action Section End -->


        <?php
 include "default/footer.php";
 ?>