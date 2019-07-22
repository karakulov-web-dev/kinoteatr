<?php
require_once(__DIR__."/reqGetHttp.php");

class FileLoader {
    function __construct($idArr) {
        $this->idArr = $idArr;
    }
    function load($pathDir) {
        foreach($this->idArr as $id) {
            $file = new File($id);
            $file->load($pathDir);
        }
    }
}

class File {
    function __construct($id) {
        $this->id = $id;
    }
    function load($pathDir) {
        exec("youtube-dl -f 22  -o ".$pathDir."$this->id https://www.youtube.com/watch?v=$this->id");
    }
}