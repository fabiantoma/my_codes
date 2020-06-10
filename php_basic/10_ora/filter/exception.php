<?php
function checkNumber($number){

    if($number>1){
        throw new Exception("The number is greater than 1");
    }return true;
}try{

    checkNumber(3);

}catch(Exception $e){

    echo"Message:".$e->getMessage(); 
}finally{
    echo "Kivételezés történt";
}
