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
        //validate presence of name and message
        //send email
      }
    }
    else if ($_POST['submitted']) my_contact_form_generate_response("error", $missing_content);
get_header(); ?>
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
            <div id="respond">
                <?php echo $response; ?>
                    <form action="<?php the_permalink(); ?>" method="post">
                        <p>
                            <label for="name">Name: <span>*</span>
                                <br>
                                <input type="text" name="message_name" value="<?php echo esc_attr($_POST['message_name']); ?>"> </label>
                        </p>
                        <p>
                            <label for="message_email">Email: <span>*</span>
                                <br>
                                <input type="text" name="message_email" value="<?php echo esc_attr($_POST['message_email']); ?>"> </label>
                        </p>
                        <p>
                            <label for="message_text">Message: <span>*</span>
                                <br>
                                <textarea type="text" name="message_text">
                                    <?php echo esc_textarea($_POST['message_text']); ?>
                                </textarea>
                            </label>
                        </p>
                        <p>
                            <label for="message_human">Human Verification: <span>*</span>
                                <br>
                                <input type="text" style="width: 60px;" name="message_human"> + 3 = 5</label>
                        </p>
                        <input type="hidden" name="submitted" value="1">
                        <p>
                            <input type="submit"> </p>
                    </form>
            </div>
        </div>
    </div>
    <?php get_footer(); ?>