<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/PHPMailer/src/Exception.php';
require 'vendor/PHPMailer/src/PHPMailer.php';
require 'vendor/PHPMailer/src/SMTP.php';



class HomeModel extends BaseModel{
    const TABLE_PRODUCTS = 'products';
    const TABLE_CUSTOMERS= 'customers';

    public function getAllProducts($select=['*'],$orderBy=[],$limit=8){
       return $this->getAllData(self::TABLE_PRODUCTS,$select,$orderBy,$limit);
    }


    public function getpCustomer($eCustomer){
         return $this->getPassWordCustomer(self::TABLE_CUSTOMERS, $eCustomer);
    }

    public function registerAccount($eCustomer,$pCustomer,$nCustomer){
        
        // $mail = new PHPMailer(true);

        // try {
        //     //Server settings
        //     $mail->isSMTP();                                            //Send using SMTP
        //     $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        //     $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        //     $mail->Username   = '19522373@gm.uit.edu.vn';                     //SMTP username
        //     $mail->Password   = 'mhcs dprj woty essi';                               //SMTP password
        //     $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        //     $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //     //Recipients
        //     $mail->setFrom('19522373@gm.uit.edu.vn', 'Mailer');
        //     $mail->addAddress('tram20011242001@gmail.com', 'Tram');     //Add a recipient
        //     $mail->addCC('19522373@gm.uit.edu.vn');

       
        //     //Content
        //     $mail->isHTML(true);                                  //Set email format to HTML
        //     $mail->Subject = 'Register success!';
        //     $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        //     // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        //     $mail->send();
        //     echo 'Message has been sent';
        //     die;
        // } catch (Exception $e) {
        //     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        //     die;
        // }

        //  return $this->createAccount(self::TABLE_CUSTOMERS, $eCustomer,$pCustomer,$nCustomer);
        // Kiểm tra xem địa chỉ email đã tồn tại hay chưa
        $existingCustomer = $this->checkExistingEmail(self::TABLE_CUSTOMERS, $eCustomer);
        // var_dump($existingCustomer);
        if ($existingCustomer===NULL) {
            return $this->createAccount(self::TABLE_CUSTOMERS, $eCustomer, $pCustomer, $nCustomer);
        } else {
            // return $this->createAccount(self::TABLE_CUSTOMERS, $eCustomer, $pCustomer, $nCustomer);
            return false;
        }
    }


    public function findProductByCategoryId($category_id){
        return $this->findByCategoryId(self::TABLE,$category_id);
        
    }
    public function findProductById($id){
        return $this->findById(self::TABLE,$id);
        
    }

}

?>