<?php
$headerImageData = get_field('header_image');
$searchString = (isset($_GET['search']) ? $_GET['search'] : null);
$search = new WP_Query( ['s' => $searchString] );

bladerunner('views.pages.archive',[
    'headerImage'   => $headerImageData['url'],
    'headline'      => get_field('headline'),
    'searchString'  => $searchString,
    'search'        => $search
]);