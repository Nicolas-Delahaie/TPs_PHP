<html>
    <body>
        <?php
            print "Adresse : IP : ". $_SERVER["REMOTE_ADDR"];

            $ip = explode(".", $_SERVER["REMOTE_ADDR"]);
            $octet_1 = $ip[0];
            settype($octet_1, "int");

            if ($ip[0] < 128)
            {
                print " (Classe A)";
            }
            elseif ($ip[0] > 127 and $ip[0] < 193)
            {
                print " (Classe B)";
            }
            else
            {
                print " (Classe C)";
            }
        ?>
    </body>
</html>