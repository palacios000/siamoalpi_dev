<?php 
$homeNew = $pages->findOne("template=home-new")->url;
$archivioNew = $pages->findOne("template=ricerca")->url;
$blogNew = $pages->findOne("template=blog_post")->url;
$progettoNew = $pages->get(3299)->url;


// da sitemare poi
$homePage = $pages->findOne("template=home-new");
$archivioPage = $pages->findOne("template=ricerca");
$blogPage = $pages->findOne("template=blog_post");
$progettoPage = $pages->get(3299);

// le metto tutte in un array
$menuPages = [$homePage, $archivioPage, $blogPage, $progettoPage];

?>