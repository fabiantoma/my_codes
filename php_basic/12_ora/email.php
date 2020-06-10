<?php
$to = "fabiantoma@gmail.com";
$subject = "Hello Mail";
$message = "szia" . $to . "!Ezaz első leveled!";
$header[] = "MIME-Version:1.0";
$header[] = "Content-type:text/html;charset=iso-8859";
$header[] = "From:Bill Gates<billgates@microsoft.com>";
$header[] = "Cc:xavvior@gmail.com";
@mail($to, $subject, $message, implode("\n", $header));
