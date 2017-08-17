<?php 
include 'admin/db_config.php';

//----------------------------- select top content 
function select_top_content() {
    return $select = mysql_query("SELECT * FROM contain_one LIMIT 4");
}


//----------------------------- select top content 
function select_gallery() {
    return $select = mysql_query("SELECT * FROM gallery");
}

//----------------------------- select top content 
function select_blog() {
    return $select = mysql_query("SELECT * FROM blog");
}
//----------------------------- select top content 
function full_blog($id) {
     $select = mysql_query("SELECT * FROM blog WHERE id = '$id'");
     return $fetch = mysql_fetch_array($select);
}
//----------------------------- select top content 
function org_news($id) {
     $select = mysql_query("SELECT * FROM news WHERE news_id = '$id'");
     return $fetch = mysql_fetch_array($select);
}
//----------------------------- Stirng limit
           function limit_text($text, $limit) {
      if (str_word_count($text, 0) > $limit) {
          $words = str_word_count($text, 2);
          $pos = array_keys($words);
          $text = substr($text, 0, $pos[$limit]) . '...';
      }
      return $text;
    }

?>