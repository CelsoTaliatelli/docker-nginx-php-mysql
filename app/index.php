<?php

$tns = "(DESCRIPTION =(ADDRESS = (PROTOCOL = TCP)(HOST = 192.168.0.76)(PORT = 1521))(CONNECT_DATA =(SERVER = DEDICATED)(SERVICE_NAME = PROD)))";

try{
    $conn = new PDO("oci:dbname=".$tns,'tasy','aloisk');
}catch(PDOException $e){
    var_dump($e);
}

$qTotalOsAbertas = "select 
                   COUNT(*) TOTAL
                    from MAN_ORDEM_SERVICO
                    where IE_STATUS_ORDEM = 1 AND NR_GRUPO_PLANEJ = 22
                     AND NR_GRUPO_TRABALHO = 38
                    order by dt_ordem_servico";

$exibeTotalOsAbertas = $conn->query($qTotalOsAbertas)->fetchAll();

var_dump($exibeTotalOsAbertas);