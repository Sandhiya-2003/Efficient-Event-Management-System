<html>
    <head>
        <title>Even or Odd</title>
    </head>
    <body style="text-align:center;">
	<br><br>
        <?php
        $num = 123456;
        if ($num % 2 == 0) 
        {
        echo "The number " . $num . " is an even number";
        } 
        else 
        {
        echo "The number " . $num . " is a odd number";
        }
        ?>
    </body>
</html>