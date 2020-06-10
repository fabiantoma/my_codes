<?php

$myXml = "<?xml version='1.0' encoding='UTF-8'?>

    <note>
        <to>Jani</to>
        <from>Eva</from>
        <heading>Reminder</heading>
        <body>Ne felejtsd el kivinni a szemetet!</body>
    </note>";


$xmlFromString = simplexml_load_string($myXml) or die("I coudn' t create");
print_r($xmlFromString);
echo "</br>";

$xmlFromFile = simplexml_load_file("note.xml") or die("I coudn' t create");
print_r($xmlFromFile);
echo "</br>";

echo $xmlFromFile->to . "</br>";
echo $xmlFromFile->body . "</br>";

$xmlBookstore = simplexml_load_file("bookstore.xml") or die("Error: Cannot create object");
foreach ($xmlBookstore->children() as $books) {
    echo $books->title . ", ";
    echo $books->author . ", ";
    echo $books->year . ", ";
    echo $books->price . "<br>";
    echo $books["category"] . "<br>";
    echo $books->title["lang"] . "<br>";
}
