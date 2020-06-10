<!DOCTYPE html>
<html lang="en">
<head>
  
    <title>Dátumok</title>
</head>
<body>
  <?php
echo "Today is" .date("Y/m/d")."<br/>";
echo "Today is" .date("l")."<br/>";
echo "The time is" .date("h:i:sa")."<br/>";

/* date_default_timezone_set("Asia/Bangkok");
echo "The time is" .date("h:i:sa")."<br/>"; */

$d=mktime(11,14,54,8,12,2014);//hh mm ss HH DD YYYY//
echo "Created date is :" .$d."<br/>";//megkapjuk az 1970 01.01.ota eltelt időt//

$s=strtotime("10:30pm April 15 2014");
echo "Created date is : ".date("Y-m-d h:i:sa",$s)."<br/>";

$dateTomorrow=strtotime("tomorrow");
echo "date is tomorrow:". date("Y-m-d h:i:sa",$dateTomorrow)."<br/>";

$dateNextSaturday=strtotime("next Saturday");
echo "Date is next Saturday: ".date("Y-m-d h:i:sa",$dateNextSaturday)."<br/>";

$date3MonthsLater=strtotime("+3 Months");
echo "Date of 3 Months later: ".date("Y-m-d h:i:sa",$date3MonthsLater)."<br/>";


$startdate=strtotime("Saturday");
$enddate=strtotime("+6 weeks", $startdate);

while ($startdate < $enddate) {
  echo date("M d", $startdate) . "<br>";
  $startdate = strtotime("+1 week", $startdate);}

?>



</body>
</html>