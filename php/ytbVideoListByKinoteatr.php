<?php
require_once(__DIR__."/reqGetHttp.php");

class VideoList {
    function __construct($urlArr) {
        $this->videoItems = array();
        $this->videoIdList = array();
        foreach ($urlArr as $url) {
            $this->_getVideoItems($url);
        }
       $this->_getVideoIdList();
    }
    function _getVideoItems($url) {
        $result = reqGetHttp($url);
        $this->videoItems = array_merge($this->videoItems, $result);
    }
    function _getVideoIdList() {
        foreach ($this->videoItems as $item) {
           if ($item->youtube && $item->youtube != "Нет данных") {
            $this->videoIdList[] = $item->youtube;
           }
        }
    }
    function getIdArr() {
        return  $this->videoIdList;
    }
}