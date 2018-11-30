<?php

function print_array($title,$array){

if(is_array($array)){

    echo $title."<br/>".
    "||---------------------------------||<br/>".
    "<pre>";
    print_r($array); 
    echo "</pre>".
    "END ".$title."<br/>".
    "||---------------------------------||<br/>";

}else{
     echo $title." is not an array.";
}
}

/*
    your array
        $array = array('cat','dog','bird','mouse','fish','gerbil');
        
    usage
        print_array("PETS", $array);

*/