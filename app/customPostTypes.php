<?php

/** @var  \Herbert\Framework\Application $container */

$books = new CPT('book', array(
    'supports' => array('title')
));