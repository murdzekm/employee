<?php
function show($stuff)
{
    echo "<pre>";
    print_r($stuff);
    echo "</pre>";
}

function getRandomStringMax($length) {

    $array = array(0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
    $text = "";
    $length = rand(4,$length);

    for($i=0;$i<$length;$i++) {
        $random = rand(0,61);
        $text .= $array[$random];
    }

    return $text;
}

function checkMessage()
{
    if(isset($_SESSION['error']) && $_SESSION['error'] != "")
    {
        foreach ($_SESSION['error'] as $error )
//        echo $_SESSION['error'];
            echo "- $error <br>";
        unset($_SESSION['error']);
    }
}