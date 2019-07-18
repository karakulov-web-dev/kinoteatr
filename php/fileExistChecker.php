<?php

class FileExistChecker {
    function __construct($fileIdArr, $pathDir) {
        $this->fileIdArr = $fileIdArr;
        $this->fileExistsIds = array();
        $this->fileNoExistsIds = array();
        
        $this->pathDir = $pathDir;
        $this->files = scandir($this->pathDir);

        $this->rmLegacyFiles();

        foreach ($fileIdArr as $id) {
            if ($this->check($id)) {
                $this->fileExistsIds[] = $id;
            } else {
                $this->fileNoExistsIds[] = $id;
            }
        }
    }
    function check($id) {
        $status = false;
        foreach ($this->files as $filename) {
            if ($filename == $id || $status) {
                $status = true;
            }
        }
        return $status;
    }
    function rmLegacyFiles() {
        foreach ($this->files as $filename) {
            if (!in_array($filename, $this->fileIdArr, true) && $filename != ".." && $filename != ".") {
                unlink($this->pathDir.$filename);
            }
        }
    }
    function getNoExists() {
        return $this->fileNoExistsIds;
    }
}