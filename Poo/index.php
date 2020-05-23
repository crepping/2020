<?php

error_reporting(0);
class persona {

    function nombre(){

        $nom = "pedro";
        echo $nom;
    }

}
$nomb = new persona();
$nomb -> nombre();

?>
<html>
<head>
<style>

</style>
</head>
<body>
<form method=get action="wsp.php" >
<div class="center">

<input type="text" name="text">

<input type="text" name="phone">

<button type="submit">Enviar</button>
</div>

</body>
</html>
