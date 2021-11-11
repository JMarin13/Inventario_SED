<?php

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$mpdf -> WriteHTML('<h1>PDF desde mpdf</h1>');

$mpdf -> OutPut('pdfNuevo.pdf');
echo ('Todo correcto');