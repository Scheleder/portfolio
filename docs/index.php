<?php
$path = ".";
$diretorio = dir($path);

echo "Lista de Arquivos:<br />";
while($arquivo = $diretorio -> read()){
echo "<a href='".$arquivo."'>".$arquivo."</a><br />";
}
$diretorio -> close();
