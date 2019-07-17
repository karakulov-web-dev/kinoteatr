<?php
require_once("./reqGetHttp.php");

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
        $this->url = $this->getUrl($id);
    }
    function getUrl($id) {
      $result = reqGetHttp("http://212.77.128.203/apps/youtube/links.php?id=".$id);
      $arrSize = count($result);
      if ($arrSize) {
        $url = $result[$arrSize - 1]->url;
        return $url;
      } else {
        return 0;
      }
    }
    function load($pathDir) {
        if (!$this->url) {
            return;
        }
        file_put_contents($pathDir.$this->id, file_get_contents($this->url));
    }
}