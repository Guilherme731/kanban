<?php
function obterSugestao(){
    $url = "https://bored-api.appbrewery.com/random";
    $response_json = @file_get_contents($url);

    if($response_json === FALSE){
        return null;
    }else{
        $data = json_decode($response_json);
        if(!isset($data->erro)){
            return $data->activity;
        }else{
            return null;
        }
    }

}
?>