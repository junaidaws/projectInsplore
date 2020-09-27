<?php include('header.php');?>
<?php
    // if there is post
    if (isset($_POST)&& !empty($_POST)){
        //if there is an attachment
        if (!empty($_FILES['file']['name'])){
            //store some variable
            $file_name = $_FILES['file']['name'];
            $temp_name = $_FILES['file']['tmp_name'];
            $file_type = $_FILES['file']['type'];
                
            //get the extension of the file
            $base = basename($file_name);
            $extension = substr($base, strlen($base)-4,strlen($base));
        

            //only these file type will be allowed.
            $allowed_extensions = array(".doc","docx",".pdf",".zip",".png",".txt");
        
            //check that this file type is allowed
            if (in_array($extension,$allowed_extensions)){
            
                //mail essenstials
                $from = $_POST['email'];
                $to = "info@acontaxconsultancy.com";   //change to
                $subject = "Career CV";  //change to
                $message = "Name -".$_POST['name'];
                $message .= "<br/>";
                $message .= "Email -".$_POST['email'];
                $message .= "<br/>";
                $message .= "Contact -".$_POST['contact'];
                $message .= "<br/>";
                $message .= "Message -".$_POST['message'];
                
            
                //things you need
                $file = $temp_name;
                $content = chunk_split(base64_encode(file_get_contents($file)));
                $uid = md5(uniqid(time()));
            
                //standard mail headers
                $header = "From: dj4maza.com@gmail.com \r\n";
                $header .= "Reply-To: ".$from."\r\n";
                $header .= "MIME-Version: 1.0\r\n";
            
                //declaring we have multiple kind of email (i.e plain text and attachment.
                $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
                
                //file attachment
                $header .= "--".$uid."\r\n";
                $header .= "Content-Type: ".$file_type."; name=\"".$file_name."\"\r\n";
                $header .= "Content-Transfer-Encoding: base64\r\n";
                $header .= "Content-Disposition: attachment; filename=\"".$file_name."\"\r\n";
                $header .= $content."\r\n\r\n";
            
                //send the mail (message is not here, but in the header in a multi part
                if(mail($to,$subject,$message,$header)){
                    //echo "Mail Have been Send, Thanking you mail us.";
                    $res = "Mail Have been Send Successfully.";
                }else{
                    $res = "Mail Could Not b Send Us.";
                }
                        
            }else{
                $res = "Invalid file type.";
            }
        
        }else {
            $res = " No File Found";
        }
    }
?>


<section class="action d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2><b>Careers</b></h2>
                <p>Submit your CV</p>
            </div>
        </div>
    </div>
</section>
<!--/#page-breadcrumb-->
<p>&nbsp;</p>
<section id="company-information" class="choose padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">&nbsp;</div>
            <div class="col-md-6 col-md-offset-3 wow fadeInDown animated" data-wow-duration="1000ms" data-wow-delay="0ms"
                style="visibility: visible; animation-duration: 1000ms; animation-delay: 0ms; animation-name: fadeInDown;">
                <h2>Submit your CV</h2>
                <form name="contact-form" action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" required="required" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" required="required" placeholder="Email Id">
                    </div>
                    <div class="form-group">
                        <input type="telNo" id="telNo" name="contact" pattern="[6-9]{1}[0-9]{9}" minlength="10" maxlength="10" class="form-control" required="required" placeholder="Contact">
                    </div>
                    <div class="form-group">
                        <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Purpose of Contact"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="file" name="file" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/pdf" class="form-control" required="required" placeholder="CV">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary btn-block" value="Submit">
                    </div>
                    <div id="statusMessage"> 
                        <?php if (! empty($res)) { ?>
                            <p class='<?php echo $type; ?>Message'><?php echo $res; ?></p>
                        <?php } ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<a id="nav-to-top" href="#header">
    <i class="glyphicon glyphicon-hand-up"></i>
</a>

<?php include('footer.php');?>