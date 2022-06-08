<?php 
$homeNew = $pages->findOne("template=home-new")->url;
$archivioNew = $pages->findOne("template=ricerca")->url;
$blogNew = $pages->findOne("template=blog_post")->url;
$progettoNew = $pages->get(3299)->url;


// da sitemare poi
$homePage = $pages->findOne("template=home");
$homePageFooter = $pages->get("/");
$archivioPage = $pages->findOne("template=ricerca");
$blogPage = $pages->findOne("template=blog");
$progettoPage = $pages->get(3299);

$menuPages = [$homePage, $progettoPage, $archivioPage, $blogPage ];

?>