<?php



/* if(!file_exist("hello.txt")){

    die("txt was not found");
}else{$file=readfile("hello.txt")
}; */


/* function customError($errorNumber,$errorString){

    echo" Error is $errorNumber|$errorString"
}; */

$test = 2;
if ($test >= 1) {
    trigger_error("Value must be 1 or below");
};
