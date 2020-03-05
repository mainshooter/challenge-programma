<?php

  /**
   * Creates a slug from a string
   * Input: Hoi peter
   * Output: hoi-peter
   * @param  string $sString The string you want to create a slug of
   * @return string          The string that has been transformed into a slug
   */
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
