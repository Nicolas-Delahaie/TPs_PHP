<?php
    //Initialisation : formulaire non validé
    $tableau = parse_ini_file("config.ini");
    //Ajout du style
    $html ='<html><style>form{display: grid; grid-template-columns: 200px 1fr;}input[type="submit"]{grid-column: 2;}#tabAnswers{display:grid;grid-template-columns:auto auto;grid-columns:repeat('.$tableau["nbre"].',min-content);}</style>';
    //Ajout du formulaire
    $html .= '<body><h1>'.$tableau["nom"].'</h1><form action="tp5.php" method="GET">';
    //Ajouts lignes du formulaire
    for ($i=0; $i <  $tableau["nbre"]; $i++) 
    { 
        $html .= '<label>'.$tableau["champs"][$i].'</label><input type="text" name="input'.$i.'">';
    }
    //Ajout bouton validation
    $html .= '<input type= submit name="valider" value="Valider">';
    
    if (isset( $_GET['valider']))
    {
        //Formulaire a ete valide
        $html .= '<section id="tabAnswers">';
        for ($i=0; $i < $tableau["nbre"]; $i++) { 
            $html .= '<label>'.$tableau["champs"][$i].'</label>';
            $html .= '<label>'.$_GET['input'.$i].'</label>';
        }

        $html .= '</section>';        
    }

    //Ajout des balises de fin
    $html .= '</body></html>';
    echo $html;
    
?>