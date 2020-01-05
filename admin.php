<?php

// Check if image file is a actual image or fake image
if(isset($_POST["post_submit"])) {

    SubmitPosts($_POST['post_text'], $_FILES['img']['tmp_name']);
}
if( isset( $_POST['news_submit']))
{
    SubmitNews($_POST['news_text'], $_FILES['img']['tmp_name']);
}





function   SubmitNews($body, $image){
    $target_dir = "uploads/news/";
    $target_file = $target_dir . basename($_FILES["img"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $check = getimagesize($image);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;

    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["img"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {

// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($image, $target_file)) {
        require "post/connect.php";

        if(!empty($_POST['news_text'])  && !empty($_POST['title'])){
            $sql = 'INSERT INTO `news`(`title`, `content`, `image_path`, `link`) VALUES ("'.$_POST['title'].'", "'.$body.'", "'.$target_file.'", "'.$_POST['link'].'")';
            
            mysqli_query($connection, $sql);
            header ('Location: news.php');
                }
        

    } else {
       
    }
}
}

function SubmitPosts($body, $image){
    $target_dir = "uploads/testimonials/";
    $target_file = $target_dir . basename($_FILES["img"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    echo $image ;
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["img"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {

// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($image, $target_file)) {
        require "post/connect.php";

        if(!empty($_POST['post_text'])  && !empty($_POST['uname'])){
            $sql = 'INSERT INTO `testimonials`(`name`, `content`, `image_path`) VALUES ("'.$_POST['uname'].'", "'.$body.'", "'.$target_file.'")';
           
            mysqli_query($connection, $sql);
            header ('Location: index.php');
                }
        

    } else {
       
    }
}
}


// =========================================================================
include "default/inputHeader.php";
// =========================================================================


?>

<section class="section admin_section">
        <div class="container">
    
            <div class="row">
                <div class="col-3">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-testimonial-tab" data-toggle="pill" href="#v-pills-testimonial" role="tab"
                            aria-controls="v-pills-testimonial" aria-selected="true">Testimonial</a>
                        <a class="nav-link" id="v-pills-news-tab" data-toggle="pill" href="#v-pills-news" role="tab"
                            aria-controls="v-pills-news" aria-selected="false">News</a>
                        <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab"
                            aria-controls="v-pills-messages" aria-selected="false">Log out</a>
    
                    </div>
                </div>
<!-- ========================================================================================= -->
                <div class="col-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-testimonial" role="tabpanel"
                            aria-labelledby="v-pills-testimonial-tab">
                            <div class="admin_c">
                            <h2>TESTIMONIALS INPUT (home page)</h2>
                                <form class="container mb-4 post_form" action="admin.php" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        
                                            <div class="container" style="background-color: #ccb49f; padding: 20px;">
                                                <label for="img">Upload image</label>
                                                <br>
                                                <input type="file" name="img" id="fileToUpload">

                                                <br>
                                            </div>
                                       
                                        <div class="col-4 mt-4">
                                            <label for="uname">Add author name</label>
                                            <br>
                                            <input type="text" name="uname">
                                            <br>
                                            </div>
                                     <div class="col-8 mt-4">
                                            <label for="post_text">Text Area</label>
                                            <br>
                                            <textarea name="post_text" placeholder="share with us" style="height: 220px; width:100%;"></textarea>


                                        </div>
                                        <button type="submit" class="btn" name="post_submit">Share</button>
                                    </div>
                                </form>
                            </div>
                        
                               
                        </div>
<!-- ========================================================================================= -->
                        
                        
                        
                        
                        
                        
                 
                        <div class="tab-pane fade" id="v-pills-news" role="tabpanel"
                            aria-labelledby="v-pills-news-tab">
                            <div class="admin_c">
                            <h2>NEWS INPUT (news page)</h2>
                                <form class="container mb-4 post_form" method="post" action="admin.php" enctype="multipart/form-data">
                                    <div class="row">
                            
                                            <div class="container" style="background-color: #b5b1ad; padding: 20px;">
                                                <label for="img">Upload image</label>
                                                <br>
                                                <input type="file" name="img" id="fileToUpload">

                                                <br>
                                            </div>
                                      
                                        <div class="col-4 mt-4">
                                            <label for="title">Title</label>
                                            <br>
                                            <input type="text" name="title">
                                            <br>
                                            <label for="link">Link</label>
                                            <br>
                                            <input type="text" name="link">
                                            <br>
                                            </div>
                                     <div class="col-8 mt-4">
                                            <label for="news_text">Text Area</label>
                                            <br>
                                            <textarea name="news_text" placeholder="share with us" style="height: 220px; width:100%;"></textarea>


                                        </div>
                                        <button type="submit" class="btn" name="news_submit">Share</button>
                                    </div>
                                </form>
                            </div>
                        
                        
                        
<!-- ========================================================================================= -->                        
                        
                        
                        
                        
                        
                        
                        </div>
                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                            aria-labelledby="v-pills-messages-tab">
                            <div class="admin_c">

                            <button class="btn main_btn"><a href="logout.php" class="text-white">Log Out</a> </button>
                            </div>
                        
                        
                        
                        
                        </div>
    
                    </div>
                </div>
            </div>
        </div>
</section>
    
<?php
// =========================================================================
 include "default/footer.php";
 // =========================================================================
 ?>