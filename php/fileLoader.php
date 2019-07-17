<?php
require_once("./reqGetHttp.php");

class FileLoader {
    function __construct($idArr) {
        $this->idArr = $idArr;
    }
    function load($pathDir) {
        foreach($this->idArr as $id) {
            $file = new File($id);
            $file->load();
        }
    }
}

class File {
    function __construct($id) {
        $this->id = $id;
    }
    function load() {
        exec("youtube-dl -f 22  -o /var/www/trailers/public/video/$this->id https://www.youtube.com/watch?v=$this->id");
    }
}