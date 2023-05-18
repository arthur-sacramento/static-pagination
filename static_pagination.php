<?php

$x = 1;
$i = 1;

$category = "surreal";

for($b = 1; $b < 1000; $b++){

  if(!file_exists("categories/$category/$category $i.jpg")){
    break;
  }

  $page = "";
  $limit = $b * 8;
  $start = ($b * 8) - 8;
  if ($b == 1){$start = 0;}
  $n = 1;

  for($i = $start + 1; $i <= $limit; $i++){

    if ($n == 1){
      $page = $page . "<table width='100%'><tr>";
    }

    if(file_exists("categories/$category/$category $i.jpg")){
      $page = $page . "<td><a href='$category/$category $i.jpg' target='_blank'><img src='$category/$category $i.jpg' width='100%'></a></td>";
      $to_next = 1;
    }else{
      $to_next = 0;
    }

    $p = $i;
    $p++;

    if(!file_exists("categories/$category/$category $p.jpg")){
      $to_next = 0;
    }

    if ($n == 4){
      $page = $page . "</tr><tr>";
    }

    if ($n == 8){
      $page = $page . "</tr></table>";
    }

    $n++;
  }

  $current_page = $category . '_' . $x;
  $x++;
  echo "$page";
  $next_page = $category . '_' . $x;

  if ($to_next == 1){
    $elem_next = "<a href='$next_page.html'>Next</a>";
  }else{
    $elem_next = "";
  }

  echo $page_bottom = "<table width='100%'>
        <tr>
          <td align='left'>
            <a href='../index.html'>Home</a>
          </td>
          <td align='right'>
            $elem_next
          </td>
        </tr>
    </table>";

  $menu = "<style>

  a{
    font-family: Arial;
    font-size: 16px;
    text-decoration: none;
  }

  td{
  padding: 10px;
  }

  .menu td{
  padding: 10px;
  background-color: #EEE;
  }

  .menu td:hover{
  padding: 10px;
  background-color: #DDD;
  }

</style>

<table width='100%'>
  <tr>
    <td valign='top' width='10%'>   
       <table class='menu'><tr><td><a href='categorie_1.html'>categorie 1</a></td></tr><tr><td><a href='categorie_2.html'>categorie 2</a></td></tr></table>
    </td>
    <td valign='top'>
      $page $page_bottom
       <iframe width='100%' src='ads.html'></iframe>
    </td>
  </tr>
</table>";

  $file_new = fopen("categories/$current_page.html", "w");
  fwrite($file_new, "$menu");
  fclose($file_new);

}

?>