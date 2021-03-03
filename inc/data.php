<?php

function printData()
{
    $data = "data/rawticketsdata.txt";
    $content = file_get_contents($data);
    $formData = implode(',', $_POST);
    $content .= $formData.rand(1, 999)."/n";
    file_put_contents($data, $content);
    $messages = file_get_contents($data, true);
    $messages = explode('/n', $messages);
    return $messages;
}
function readData(){
    $data = "data/rawticketsdata.txt";
    $tickets = file_get_contents($data);
    $tickets = explode('/n', $tickets);
    return $tickets;
}