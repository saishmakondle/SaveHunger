<?php
if(isset($_POST['home_donate'])){
$name = $_POST['name'];
$email = $_POST['email'];
$dname = $_POST['dname'];
$hear = $_POST['hear'];
}

$msg = '';
$msgClass = '';

if(filter_has_var(INPUT_POST, 'submit')){
    
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $subject = htmlspecialchars($_POST['dname']);
  $hear = htmlspecialchars($_POST['hear']);
  $ft = $_POST['ft'];
  $ft2 = $_POST['spayedneutered'];
  $RT = $_POST['rt'];
  $snack = htmlspecialchars($_POST['snack']);
  $curry = htmlspecialchars($_POST['curry']);
  $money = $_POST['money'];
  $amount = htmlspecialchars($_POST['amount']);

  #
  # Required Fields
  if(!empty($email) && !empty($name) && !empty($subject)){
      # Success
      # Check Email Validation
      if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
        # Invalid Email 
        $msg = 'Please use a valid email!';
        $msgClass = 'alert-danger';
      }
      else {
        #Success  
        $toEmail = 'savehunger7@gmail.com';
        $subject = 'Subject: '.$subject; 
        $body = '<h2>Contact Request</h2>
            <h4>Name</h4><p>'.$name.'</p>
            <h4>Email</h4><p>'.$email.'</p>
            <h4>Donate Name</h4><p>'.$subject.'</p>
            <h4>How Did You hear about us</h4><p>'.$hear.'</p>
			<h4>Food Type</h4><p>'.$ft.'</p>
			<h4>Spayed Or Neutered</h4><p>'.$ft2.'</p>
			<h4>Rice Type</h4><p>'.$RT.'</p>
			<h4>Snack</h4><p>'.$snack.'</p>
			<h4>Curry</h4><p>'.$curry.'</p>
			<h4>Would you like to donate money?</h4><p>'.$money.'</p>
			<h4>Amount</h4><p>'.$curry.'</p>
            ';

        # Email Headers
        $headers = "MIME-Version: 1.0" ."\r\n";
        $headers .= "Content-Type:text/html;charset=UTF-8" . "\r\n";

        # Additional Headers

        $headers .= "From: " .$name. "<" .$email.">". "\r\n";

        if(mail($toEmail, $subject, $body, $headers)){
            # Email Success
            $msg = 'Your email has been sent!';
            $msgClass = 'alert-success';
        } else {
            $msg = 'Your email was not sent!';
            $msgClass = 'alert-danger';
        }
      }
  } else {
      # Fill in all fields
      $msg = 'Please fill in all fields!';
      $msgClass = 'alert-danger';
  }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="cform.css">
	<style>
		.alert-danger{
			background: red;
			text: 12px;
			color: white;
		}
		.alert-success{
			background: green;
			text: 12px;
			color: white;
		}
	</style>
  </head>
  <body>
    <div class="signup-container">
        
        <div class="right-container">
          <header>
            <!-- <h1>Yay, puppies! Ensure your pup gets the best care! </h1> -->
            <div class="set">
			<?php if($msg !=''): ?>
				<div id="status_msg" class="<?php echo $msgClass ?> mt-5"><?php echo $msg ?></div>
			<?php endif; ?>
			<form action="#" method="post">
                <div class="foot-type">
				<input name="name" type="text" value="<?php echo $name ?>"></input>
				<input name="email" type="text" value="<?php echo $email ?>"></input>
				<input name="dname" type="text" value="<?php echo $Dname ?>"></input>
				<input name="hear" type="text" value="<?php echo $hear ?>"></input>
                  <label for="ft-veg">FOOD</label>
                  <div class="radio-container">
                    <input id="ft-veg" name="ft" type="radio" value="veg"></input>
                    <label for="ft-veg">VEG</label>
                    <input id="ft-nveg" name="ft" type="radio" value="non veg"></input>
                    <label for="ft-nveg">NON-VEG</label>
                  </div>
                </div>
                <div class="type-food">
                  <label for="snack">Spayed or Neutered</label>
                  <div class="radio-container">
                    <input id="snack" name="spayedneutered" type="radio" value="spayed"></input>
                    <label for="snack">Snack</label>
                    <input id="rice" name="spayedneutered" type="radio" value="neutered"></input>
                    <label for="rice">Rice</label>
                    <input id="chap" name="spayedneutered" type="radio" value="neeutered"></input>
                    <label for="chap">Chapati</label>
                  </div>
                </div>
              </div>
            <div class="set">
                <div class="foot-type">
                    <label for="ricet">RICE TYPE</label>
                    <div class="radio-container">
                      <input id="ricet" name="rt" type="radio" value="rrice"></input>
                      <label for="ricet">VEG</label>
                      <input id="srice" name="rt" type="radio" value="s-rice"></input>
                      <label for="srice">NON-VEG</label>
                    </div>
                  </div>
                  <div class="snackname">
                    <label for="snackname">Mention Snack Name</label>
                    <input id="snackname" name="snack" placeholder="What's the snack?" type="text"></input>
                  </div>

            </div>
            <div class="set">
              <div class="snackname">
                <label for="snackname">Curry?</label>
                <input id="snackname" name="curry" type="text"></input>
              </div>
              <div class="foot-type">
                <label for="dnte">WOULD YOU LIKE TO DONATE MONEY?</label>
                <div class="radio-container">
                  <input id="dnte" name="money" type="radio" value="Yes"></input>
                  <label for="dnte">YES</label>
                  <input id="ft-maeele" name="money" type="radio" value="No"></input>
                  <label for="ft-maeele">NO</label>
                </div>
              </div>
            </div>
            
            <div class="set">
                <div class="snackname">
                  <label for="snackname">IF YES, ENTER AMOUNT</label>
                  <input id="snackname" placeholder="AMNT" name="amount" type="number"></input>
                </div>
            </div>
          </header>
          <footer>
            <div class="set">
              <button id="back"><a href="index.php">Back</a> </button>
              <button type="submit" name="submit">Submit</button>
            </div>
          </footer>
		  </form>
        </div>
      </div>
      <div class="footer">
        <div class="col-1">
          <h3>USEFUL LINKS</h3>
          <a href="#">About</a>
          <a href="#">Services</a>
          <a href="#"> Contact</a>
          <a href="#"> Shop</a>
          <a href="#">Blog</a>
        </div>
        <div class="col-2">
          <h3>NEWSLETTER</h3>
          <form>
            <input type=" text " placeholder="Your Email Address " required />
            <button type="submit ">SUBSCRIBE NOW</button>
          </form>
        </div>
        <div class="col -3">
          <h3>CONTACT</h3>
          <p>123, XYZ Road, BSK 3<br />Bangalore, Karnataka, IN</p>
          <div class="social-icons">
            <i class="fab fa-facebook"></i>
            <i class="fab fa-twitter"></i>
            <i class="fab fa-instagram"></i>
          </div>
        </div>
      </div>
  </body>
</html>
