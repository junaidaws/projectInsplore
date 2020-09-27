<?php include('header.php');?>
<?php
    error_reporting(0);
    if(!empty($_POST["email"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["telNo"];
        $content = $_POST["message"];

        $toEmail = "info@acontaxconsultancy.com";
        $subject = "Contact use Detail";
        $mailHeaders = "From: " . $name . "<". $email .">\r\n";
        if(mail($toEmail, $subject, $content, $mailHeaders)) {
            $message = "Your contact information is received successfully.";
            $type = "success";
        }
    }
?>

    <section class="action d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2><b>Contact Us</b></h2>
                </div>
            </div>
        </div>
    </section>
    <!--/#page-breadcrumb-->
    <section>
        <div class="container-fluid">
            <div class="row">
                <iframe
                    src="https://maps.google.com/maps?q=307%2C%20sapphire%20Heights%2C%20AB%20Road%2C%20Opposite%20C-21%20Mall%2C%20AB%20Road%2C%20Indore%2C%20Madhya%20Pradesh%20452011&t=&z=13&ie=UTF8&iwloc=&output=embed"
                    width="100%" height="320" frameborder="0" style="border: 0" allowfullscreen=""></iframe>
            </div>
        </div>
    </section>
    <hr/>
    <br/><br/>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2>Address</h2>
                    <address>
                        307, sapphire Heights,<br /> AB Road, Opposite C-21 Mall,<br /> Indore, Madhya Pradesh 452011
                    </address>
                </div>
                <div class="col-md-3">
                    <h2>Contacts</h2>
                    <address>
                        E-mail: <a href="mailto:info@acontaxconsultancy.com">info@acontaxconsultancy.com</a> <br>
                    </address>
                </div>
                <div class="col-md-6">
                    <h2>Send a message</h2>
                    <form id="main-contact-form" name="contact-form" method="POST" action="">
                        <div class="form-group">
                            <input type="text" id="name" name="name" class="form-control" required="required" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input type="email" id="email" name="email" class="form-control" required="required" placeholder="Email Id">
                        </div>
                        <div class="form-group">
                            <input type="telNo" id="telNo" name="telNo" pattern="[6-9]{1}[0-9]{9}" minlength="10" maxlength="10" class="form-control" required="required" placeholder="Contact">
                        </div>
                        <div class="form-group">
                            <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your text here"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-primary btn-block" value="Submit">
                        </div>

                        <div id="statusMessage"> 
                            <?php if (! empty($message)) { ?>
                                <p class='<?php echo $type; ?>Message'><?php echo $message; ?></p>
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
