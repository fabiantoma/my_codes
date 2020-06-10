<?php
/* $file=@fopen("file1.txt","r") or die("sikertelen fájl megnyitás");
echo fread($file,filesize("file1.txt"));// a file mérete byte-okban
fclose($file); */


/* $file=@fopen("file1.txt","r") or die("siertelen fájl megnyitás");// "r" readonly//
/* echo fgets($file)."<br>"; */
/* while(!feof($file)){
    $line=fgets($file);
     $elements=explode("|",$line); */ //feldarabolás mi mentén és milyen szöveget//
//$elemnents a telefon id-ja//
/* var_dump($elements); */
/* echo "Belső azonosító:".$elements[0] . "<br>";
echo "Külső azonosító:".$elements[1] . "<br>";
echo "Név:".$elements[2] . "<br>";
echo "Ár:".$elements[3] . "Ft<br>";
    echo "<br>";
}
fclose($file);
 */


/* 2.rész
$file = @fopen("file3.txt", "r") or die("siertelen fájl megnyitás");
while (!feof($file)) {
    $karakter = fgetc($file);
    if ($karakter == "\n") {
        echo "<br>";
    } else {
        echo ($karakter);
    } */

/*  fgetc($file);
    echo fgetc($file); */
/* }
fclose($file); */

/* $file = @fopen("file4.txt", "w") or die("siertelen fájl megnyitás");
$file2 = @fopen("file5.txt", "a") or die("siertelen fájl megnyitás");

fwrite($file, "1\n");
fwrite($file2, "2\n");


fclose($file);
fclose($file2); */


echo file_get_contents("file1.txt");
