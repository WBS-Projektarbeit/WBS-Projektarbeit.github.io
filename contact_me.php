<?php


  $to = "info@wbs-projektarbeit.de";


  $name = filter_var($_POST["sender_name"], FILTER_SANITIZE_STRING);
  $plz = filter_var($_POST["plz"], FILTER_SANITIZE_NUMBER_INT);
  $ort = filter_var($_POST["ort"], FILTER_SANITIZE_STRING);
  $phone = filter_var($_POST["phone"], FILTER_SANITIZE_NUMBER_INT);
  $email = filter_var($_POST["sender_email"], FILTER_SANITIZE_EMAIL);
  $message = filter_var($_POST["message"], FILTER_SANITIZE_STRING);
  $subject = "Anfrage WBS-Projektarbeit";

  $body = $message;

  $headers = array();
  $headers[] = "Mime-Version: 1.0";
  $headers[] = "Content-Type: text/plain; charset=utf-8";
  $headers[] = "Content-Transfer-Encoding: quoted-printable";
  $headers[] = "From: {$email}";
  $headers[] = "Reply-To: {$email}";
  $headers[] = "Subject: {$subject}";
  $headers[] = "X-Mailer: PHP/".phpversion();

  $send_mail = mail($to, $subject, $body, implode("\r\n", $headers));

  if($send_mail) echo json_encode(['success'=>true]);
  else
    echo json_encode(['success'=>false]);
?>
