<?php
require_once("./ytbVideoListByKinoteatr.php");
require_once("./fileExistChecker.php");
require_once("./fileLoader.php");

$pathDir = "../public/video/";

$videoList = new VideoList(
    array(
    "http://xn--42-mlcqimbe0a8d2b.xn--p1ai/sunnyRikt/today.php",
    "http://xn--42-mlcqimbe0a8d2b.xn--p1ai/sunnyRikt/soon.php",
    "http://kuzbass-stb.m-sk.ru/page122.php",
    "http://kuzbass-stb.m-sk.ru/page121.php"
    )
);
$fileExistChecker = new FileExistChecker($videoList->getIdArr(), $pathDir);
$fileLoader = new FileLoader($fileExistChecker->getNoExists());
$fileLoader->load($pathDir);