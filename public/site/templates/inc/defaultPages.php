<?php
/* DO NOT SYNC with live server */

$homeNew = $pages->findOne("template=home-new")->url;
$archivioNew = $pages->findOne("template=ricerca_dev")->url;
$blogNew = $pages->findOne("template=blog_post")->url;
$progettoNew = $pages->get(3299)->url;
?>