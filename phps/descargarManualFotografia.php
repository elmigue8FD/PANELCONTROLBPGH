<?php
header("Content-disposition: attachment; filename=Manual para Fotografías Perfectas.pdf");
header("Content-type: application/pdf");
readfile("./../file_manager/Manualparafotografiasperfectas.pdf");
?>