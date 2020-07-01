<?php
include_once('PHPMailer/PHPMailerAutoload.php');
// 메일 발송함수는 PHPMailer 라이브 러리를 이용한다.

mailer( "한밭 시그널","24mcer@naver.com","24mcer@naver.com",$_POST['subject'],$_POST['content']);

function mailer($fname, $fmail, $to, $subject, $content, $type=0, $file="", $cc="", $bcc="")
{
      if ($type != 1) $content = nl2br($content);
      $mail = new PHPMailer();
      $mail->IsSMTP();
      $mail->SMTPSecure = "ssl";
      $mail->SMTPAuth = true;
      $mail->Host = "smtp.naver.com";
      $mail->Port = 465;
      $mail->Username = "24mcer";
      $mail->Password = "gksqkx123";
      $mail->CharSet = 'UTF-8';
      $mail->From = $fmail;
      $mail->FromName = $fname;
      $mail->Subject = $subject;
      $mail->AltBody = "";
      $mail->msgHTML($content);
      $mail->addAddress($to);
      if ($cc)
            $mail->addCC($cc);
      if ($bcc)
            $mail->addBCC($bcc);
      if ($file != "") {
            foreach ($file as $f) {
                  $mail->addAttachment($f['path'], $f['name']);
            }
      }
      if ( $mail->send() ) echo "관리자에게 메일을 발송했습니다.";
      else echo "메일 발송을 실패했습니다.";
}



?>
