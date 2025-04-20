<?php

trait FileHandler{
    public function readJSON($file){
        if(file_exists($file)){
            $jsonFile = file_get_contents($file);
            return json_decode($jsonFile);
        }

        return false;
    }
    public function writeJSON($file, $data){
        $data = json_encode($data, JSON_PRETTY_PRINT);
        return file_put_contents($file, $data);
    }
}
    

?>