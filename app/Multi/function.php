<?php
  function subMenu ($data,$id) {
    echo "<ul>";
    foreach($data as $item) {
      if($item["Parent_id"]==$id) {
        echo '<li><a href="#">'.$data["Cat_name"].'</a>';
        subMenu($data,$item["id"]);
        echo "</li>"
      }
    }
    echo "</ul>";
  }
?>
