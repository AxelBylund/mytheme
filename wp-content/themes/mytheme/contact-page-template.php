<?php
/*
Template Name: Contact page template
*/

//response generation function

  $response = "";

  //function to generate response
  function my_contact_form_generate_response($type, $message){

    global $response;

    if($type == "success") $response = "<div class='success'>{$message}</div>";
    else $response = "<div class='error'>{$message}</div>";

  }

  //response messages
  $not_human       = "Human verification incorrect.";
  $missing_content = "Please supply all information.";
  $email_invalid   = "Email Address Invalid.";
  $message_unsent  = "Message was not sent. Try Again.";
  $message_sent    = "Thanks! Your message has been sent.";

  //user posted variables
  $name = $_POST['message_name'];
  $email = $_POST['message_email'];
  $message = $_POST['message_text'];
  $human = $_POST['message_human'];

  //php mailer variables
  $to = get_option('admin_email');
  $subject = "Someone sent a message from ".get_bloginfo('name');
  $headers = 'From: '. $email . "\r\n" .
    'Reply-To: ' . $email . "\r\n";

  if(!$human == 0){
    if($human != 2) my_contact_form_generate_response("error", $not_human); //not human!
    else {

      //validate email
      if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        my_contact_form_generate_response("error", $email_invalid);
      else //email is valid
      {
        //validate presence of name and message
        if(empty($name) || empty($message)){
          my_contact_form_generate_response("error", $missing_content);
        }
        else //ready to go!
        {
          $sent = wp_mail($to, $subject, strip_tags($message), $headers);
          if($sent) my_contact_form_generate_response("success", $message_sent); //message sent!
          else my_contact_form_generate_response("error", $message_unsent); //message wasn't sent
        }
      }
    }
  }
else if ($_POST['submitted']) my_contact_form_generate_response("error", $missing_content);

get_header();?>
    <style type="text/css">
        .error {
            padding: 5px 9px;
            border: 1px solid red;
            color: red;
            border-radius: 3px;
        }
        
        .success {
            padding: 5px 9px;
            border: 1px solid green;
            color: green;
            border-radius: 3px;
        }
        
        form span {
            color: red;
        }
    </style>
    <div class="row">
        <div class="span8">
            <h1>Contact me, please..</h1>
            <!--
            <div id="respond">
                <?php echo $response; ?>
                    <form action="php the_permalink(); ?>" method="post">
                        <p>
                            <label for="message_name">Name: <span>*</span>
                                <br>
                                <input type="text" id="message_name" name="message_name" value="php echo esc_attr($_POST['message_name']); ?>"> </label>
                        </p>
                        <p>
                            <label for="message_email">Email: <span>*</span>
                                <br>
                                <input type="text" name="message_email" id="message_email" value="php echo esc_attr($_POST['message_email']); ?>"> </label>
                        </p>
                        <p>
                            <label for="message_text">Message: <span>*</span>
                                <br>
                                <textarea type="text" name="message_text" id="message_text">
                                    php echo esc_textarea($_POST['message_text']); ?>
                                </textarea>
                            </label>
                        </p>
                        <p>
                            <label for="message_human">Human Verification: <span>*</span>
                                <br>
                                <input type="text" style="width: 60px;" name="message_human" id="message_human"> + 3 = 5</label>
                        </p>
                        <input type="hidden" name="submitted" value="1">
                        <p>
                            <input type="submit"> </p>
                    </form>
            </div>
            -->
            <section class="contact-wrap">
                <?php echo $response; ?>
                    <form action="<?php the_permalink(); ?>" method="post" class="contact-form">
                        <div class="col-sm-12">
                            <div class="input-block">
                                <label for="">Name: <span>*</span></label>
                                <input type="text" class="form-control" name="message_name" value="<?php echo esc_attr($_POST['message_name']); ?>"> </div>
                            <div class="col-sm-12">
                                <div class="input-block">
                                    <label for="">Email: <span>*</span></label>
                                    <input type="text" name="message_email" value="<?php echo esc_attr($_POST['message_email']); ?>" class="form-control"> </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="input-block textarea">
                                    <label for="">Drop your message here: <span>*</span></label>
                                    <textarea rows="3" name="message_text" type="text" class="form-control">
                                        <?php echo esc_textarea($_POST['message_text']); ?>
                                    </textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="input-block">
                                    <label for="">something + 3 = 5: <span>*</span> </label>
                                    <input type="text" name="message_human" class="form-control"> </div>
                            </div>
                            <input type="hidden" name="submitted" value="1">
                            <div class="col-sm-12">
                                <input type="submit" class="square-button" value="Send"> </div>
                        </div>
                    </form>
            </section>
        </div>
    </div>
    <?php get_footer(); ?>