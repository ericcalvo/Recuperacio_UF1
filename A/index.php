<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <p>
        <?php
            $hora = date("G");
            for ($h=0; $h < 24; $h++) { 
                if ($hora == $h) {
                    echo "<strong>$h</strong> ";
                } else {
                    echo "$h ";
                }    
            }
        ?>
        </p>
        <p>
        <?php
            $minut = date("i");
            for ($m=0; $m < 60; $m++) { 
                if ($minut == $m) {
                    echo "<strong>$m</strong> ";
                } else {
                    echo "$m ";
                }        
            }
        ?>
        </p>
        <p>
        <?php
            $segon = date("s");
            for ($s=0; $s < 60; $s++) { 
                if ($segon == $s) {
                    echo "<strong>$s</strong> ";
                } else {
                    echo "$s ";
                }        
            }
        ?>
        </p>
    </body>
</html>