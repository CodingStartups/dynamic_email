function send_mail_template($to, $from, $subject, $message)
{
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  $headers .= "From: ContactNameGoesHere <" . $from . ">\r\n";
  $response = mail($to, $subject, $message, $headers);
}

function build_email_template($email_subject_image, $message)
{
    // Get email template as string
    $email_template_string = file_get_contents('template.html', true);
    // Fill email template with message and relevant banner image
    $email_template = sprintf($email_template_string,'URL_to_Banner_Images/banner_' . $email_subject_image. '.png', $message, $mobile_plugin_string);
    return $email_template;
}

$from = "company@company.com";
$to = "user@user.com";
$body_text = "Your email has been successfully verified...";
$banner_image_subject = "account_verified";
$final_message = build_email_template($banner_image_subject, $body_text);
send_email($to, $from, "You email has been verified", $final_message);
