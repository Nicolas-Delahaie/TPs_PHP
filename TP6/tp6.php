<?php
    $xml_string = '<?xml version="1.0" encoding="ISO-8859-1" ?>
    <continents>
        <europe>
            <pays>France</pays>
            <pays>Belgique</pays>
            <pays>Espagne</pays>
        </europe>
        <asie>
            <pays>Japon</pays>
            <pays>Inde</pays>
        </asie>
    </continents>';

    echo "Tous les pays :<br>";
    $xml = simplexml_load_string($xml_string);
    foreach ($xml as $continent)
        foreach ($continent->pays as $pays)
            echo $pays."<br>";
    echo "<br>Pays europeens :<br>";
    $xml = simplexml_load_string($xml_string);
    foreach ($xml->europe->pays as $pays)
        echo $pays."<br>";

        
    # Sinon avec DocDocument
    $elt = new SimpleXMLElement($xml_string) ;
    echo "<br>".$elt->asXML() ." \n" ;
    

?>