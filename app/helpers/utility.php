<?php
  // Simple page redirect
  function redirect($page){
    header('location: ' . URLROOT . '/' . $page);
  }



  // Permet de sécuriser une chaine de caractères

  function str_secur($string) {
    return trim(htmlspecialchars($string));
  }



  // Debug plus lisible des différentes variables

  function debug($var) {
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
  }

  

  