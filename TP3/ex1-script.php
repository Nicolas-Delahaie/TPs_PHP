<?php
     $nb_photos = $_GET["nb_photos"];
     $html = '<FORM ENCTYPE="multipart/form-data" ACTION="upload.php" METHOD="POST"><input type=hidden name=nbphotos value='.$nb_photos.'2>';
     for ($i=1; $i < $nb_photos+1; $i++) { 
        $html .= '<input type=file name="photo.'.$i.'"jpg>';
     }
     $html .= '<input type=submit value="Télécharger Photos"></FORM>';
     echo $html;

?>