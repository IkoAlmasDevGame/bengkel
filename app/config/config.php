<?php 

function get_ip_address(){
    $ipaddress = "";
        if(isset($_SERVER['HTTP_CLIENT_IP'])){
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        }else if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else if(isset($_SERVER['HTTP_X_FORWARDED'])){
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        }else if(isset($_SERVER['HTTP_FORWARDED_FOR'])){
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        }else if(isset($_SERVER['HTTP_FORWARDED'])){
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        }else if(isset($_SERVER['REMOTE_ADDR'])){
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        }else{
            $ipaddress = 'IP tidak dikenali';
        }
        return $ipaddress;
    }    
    
function get_client_browser(){
    $browser = "";
        if(strpos($_SERVER['HTTP_USER_AGENT'], 'Netscape')){
            $browser = 'Netscape';
        }else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox')){
            $browser = 'Firefox';
        }else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome')){
            $browser = 'Chrome';
        }else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera')){
            $browser = 'Opera';
        }else if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE')){
            $browser = 'Internet Explorer';
        }else{
            $browser = 'Other';
        }
        return $browser;
    }

?>