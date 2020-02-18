<?php

  function slugify($sString) {
    $sString = preg_replace('~[^\pL\d]+~u', '-', $sString);

    // transliterate
    $sString = iconv('utf-8', 'us-ascii//TRANSLIT', $sString);

    // remove unwanted characters
    $sString = preg_replace('~[^-\w]+~', '', $sString);

    // trim
    $sString = trim($sString, '-');

    // remove duplicate -
    $sString = preg_replace('~-+~', '-', $sString);

    // lowercase
    $sString = strtolower($sString);
    return $sString;
  }

?>
