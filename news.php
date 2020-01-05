<?php 
include "default/header.php";
?>


<!-- Header Section Start -->
<!-- ===================================================================================================== -->
<header class="sub_banners newsp">

        <div class="container">
                <div class="row ">
                    <div class="col-lg-6">
                        <h1>News</h1>
                    </div>
                    <div class="col-lg-6 ">
                        <h5></h5>
                    
                    </div>
                </div>
            </div>
<!-- ===================================================================================================== -->



<?php 
include "default/nav.php";
?>        




<!-- MAIN CONTENT Start -->
<!-- ===================================================================================================== -->
        <section class="section news_section">
            <div class="container">
            <div class='news_group'>
            <?php
                require "post/connect.php";
                $sql = "SELECT `title`, `content`, `image_path`, `date`, `link` FROM `news` ORDER BY id DESC";
                $data = mysqli_query($connection, $sql);
                $image_count = 0;
                $button_html = '';
                $post_form="";
                if($data -> num_rows > 0 ){
                while($row = $data->fetch_assoc()){
                    
                        $body = $row['content'];
                        $title = $row['title'];
                        $date_added = $row['date'];
                        $date = substr($date_added, 0, 10);
                        $image = $row['image_path']; 
                        $link = $row['link']; 
                        $active_class = '';
                        if (empty($image)) $image = "img/img.png";

                        if(!$image_count) {
                            $active_class = 'active';
                            $image_count = 1;
                            }
                            $image_count++;
                        

                        $post_form .= "
                      
                        <div class='card news_card'>
                        <div class='top_container'>
                        <img class='card-img-top' src='".$image."'/>
                        </div>
                        <div class='card-body'>
                        <h5>". $date."</h5>
                            <h5 class='card-title'>".$title."</h5>
                            <p class='card-text'>".substr($body, 0, 100)."</p>
                                <a target='_blank' href='".$link."' class='btn sub_btn a_btn fx'>Read More </a>
                        </div>
                    </div>
                   

                        ";
                        }
                        echo $post_form;
                        }
        
?>
              </div>   
            </div>

        </section>
<!-- ===================================================================================================== -->


        <!-- Call to action Section Start -->
        <section class="section ca_section">
            <div class="container">
                <div class="ca">
                    <h2>Ready to <span>Power up our workflow</span>?</h2>
                    <button type="button" class="btn grn_btn fx"><a href="product-demo">Get Started</a></button>
                </div>
            </div>
        </section>
        <!-- Call to action Section End -->


 <?php
 include "default/footer.php";
 ?>