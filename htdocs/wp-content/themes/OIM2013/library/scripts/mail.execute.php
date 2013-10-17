<?php
require_once('../../../../../wp-load.php');
require_once(get_template_directory() . '/library/classes/class.phpmailer.php');

header("HTTP/1.0 200 OK");

function filterDefaultValue($string, $default) {
    if($string === $default) {
        return '';
    }else{
        return $string;
    }
}

function validateEmail ($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validate ($string) {
    if(!empty($string)) {
        return true;
    }else{
        return false;
    }
}

try {
    $conn = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $ex){
    die($ex->getMessage());
}

if(
    validate($_POST['name']) &&
    validate($_POST['topic']) &&
    validateEmail($_POST['email'])
){
    try {
        $log_form = $conn->prepare('INSERT INTO fg_contactlogs (name, company, enquiry, number, email, message, date, unix) VALUES (:name, :company, :enquiry, :number, :email, :message, :date, :unix)');

        $log_form->bindValue(':name',       filterDefaultValue($_POST['name'], 'Name*')); 
        $log_form->bindValue(':company',    filterDefaultValue($_POST['company'], 'Company'));
        $log_form->bindValue(':enquiry',    filterDefaultValue($_POST['topic'], 'Topic of enquiry*'));
        $log_form->bindValue(':number',     filterDefaultValue($_POST['number'], 'Contact Number'));
        $log_form->bindValue(':email',      filterDefaultValue($_POST['email'], 'Email Address*'));
        $log_form->bindValue(':message',    filterDefaultValue($_POST['message'], 'Message'));
        $log_form->bindValue(':date',       date('d-m-Y'));
        $log_form->bindValue(':unix',       time());

        if($log_form->execute()){
            $phpmailer = new PHPMailer();

            $phpmailer->From = $_POST['email'];
            $phpmailer->FromName = $_POST['name'];
            $phpmailer->AddReplyTo($_POST['email'], $_POST['name']);
            $phpmailer->IsHTML(true);

            $phpmailer->AddAddress(get_bloginfo('admin_email'));

            $phpmailer->Subject = "Enquiry from OIM Website";

            foreach($_POST as $key => $val) {
                if(is_array($val)){
                    $val = implode(", ", $val);
                }else{
                    $val = $val;
                }

                $body .= "$key: $val<br />";
            }

            $phpmailer->Body = $body;

            if($phpmailer->Send()){
                echo 'success';
            }
        }
    } catch (PDOException $ex) {
        die($ex->getMessage());
    }
}else{
    die('Please fill in all the required form fields correctly before submitting.');
}


?>
