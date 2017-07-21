<?php

    $error = "";

    $successMessage = "";


    if ($_POST){

        if (!$_POST["email"]){

            $error .= "The email field is required.<br>";

        }

        if (!$_POST["subject"]){

            $error .= "The subject field is required.<br>";

        }

        if (!$_POST["content"]){

            $error .= "The content field is required.<br>";

        }

        if ($_POST["email"] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {

            $error .= "The email address is invalid.<br>";
        }

        if ($error != "") {


            $error = '<div class="alert alert-info alert-dismissable" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a><strong>There were error(s) in your form:</strong><br>' . $error . '</div>';

        } else {

            $emailTo = "gracetang1025@hotmail.com";

            $subject = $_POST["subject"];

            $content = $_POST["content"].$_POST["phone"];

            $headers = "From: ".$_POST["email"];

            if (mail($emailTo, $subject, $content,  $headers)){

                $successMessage = '<div class="alert alert-success alert-dismissable" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>Your message was sent successfully!</div>';

            } else {

                 $error = '<div class="alert alert-info alert-dismissable" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>Your message couldn\'t be sent. Please try again.</div>';

            }

        }


    }


?>

<!DOCTYPE html>

<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

    <title>Contact Form</title>


      <style type="text/css">

          #form{


             margin: 0 auto;
             width: 80%;

          }

          .alert{

              margin: 0 auto;
              width: 80%;

          }

          span {

              color:red;

          }

          h1{

              padding-top: 130px;
              margin-bottom: 20px;
              text-align: center;
              font-weight: bolder;
              font-family:serif;
              color: lightgrey;

          }

          label {

              color: lightgrey;

          }

          .wrapper{

              background-image: url(villagewokimages/contactbackground.jpg);
              background-repeat: no-repeat;
              background-position: center;
              background-size: cover;
              background-attachment: fixed;
              height: 800px;
              box-shadow: inset 0 0 0 1000px rgba(0,0,0,.6);

          }



      </style>





  </head>

  <body>

  <nav class="navbar navbar-toggleable-md navbar navbar-inverse bg-inverse fixed-top">

        <a class="navbar-brand" href="./home.html">Village Wok</a>

      </nav>


     <div class="wrapper">

	        <div class ="container">

	            <h1>How can we help you?</h1>

	            <div id="error"><? echo $error.$successMessage; ?></div>

	            <form method="post" id="form">

	              <div class="form-group">
	                <label for="subject">Name<span>*</span></label>
	                <input type="text" class="form-control" id="subject" name="subject">
	              </div>


	              <div class="form-group">
	                <label for="phone">Phone</label>
	                <input type="text" class="form-control" id="phone" name="phone">
	              </div>



	              <div class="form-group">
	                <label for="email">Email<span>*</span></label>
	                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
	                <!--
	                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
	              </div>

	              <div class="form-group">
	                <label for="content">Message<span>*</span></label>
	                <textarea class="form-control" id="content" name="content" rows="5"></textarea>
	              </div>

	                <button type="submit" id="submit" class="btn btn-primary btn-lg btn-block">Send</button>

	            </form>

	        </div>

    	</div>








    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>



      <script type="text/javascript">

          // stop form submitting in JQuary - now we can see when click submit button is not refreshing the page.


          $("form").submit(function (e) {


              var error = "";

              if ($("#email").val() == ""){

                  error += "The email field is required.<br>";

              }

              if ($("#subject").val() == ""){

                  error += "The subject field is required.<br>";

              }

              if ($("#content").val() == ""){

                  error += "The content field is required."

              }

              if(error != ""){


                  $("#error").html('<div class="alert alert-info alert-dismissable" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a><strong>There were error(s) in your form:</strong><br>' + error + '</div>');


                  $(".alert-dismissable").alert();
                  window.setTimeout(function() { $(".alert-dismissable").alert('close'); }, 2000);


                  return false;


              } else {

                 return true;

              }


          });




      </script>


  </body>
