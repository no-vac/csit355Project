<?php
$cname = "product";
$quant = 10;
setcookie($cname, $quant, time()+(86400),"/");
?>

<html>
    <body style="margin:0;padding:0;border: 1px solid red">
        <h1 style="width:100%;font-size:calc(7vw + .5em)">Hello World</h1>
        
        <?php
        echo '<p style="width:100%;font-size:calc(5vw + .5em)">hello from php</p>';
        ?>
        
        
        <?php
        
        if(isset($_COOKIE[$cname])){
            echo "cname '". $cname."' is not set. ".$_COOKIE[$cname];
        }else{
            echo "cname '".$cname."' is set. Value is ".$_COOKIE[$cname];
        }
        
        ?>
        
    </body>
    
</html>