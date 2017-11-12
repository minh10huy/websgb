<?php
function subCate($data,$id) {
  echo "<ul>";
  foreach ($data as $item) {
    if($item->Parent_id == $id) {
      echo '<li class="dropdown"><a href="'.$item->Cat_id.'">'.$item->Cat_name.'</a>';
        subCate($data,$item->Cat_id);
      echo '</li>';
    }
  }
  echo"</ul>";
}
