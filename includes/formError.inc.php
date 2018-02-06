<?php

if(isset($_GET['sempty'])){
  echo '<span>Fill in every field</span>';
}

if(isset($_GET['invc'])){
  echo '<br /><span>Invalid characters</span>';
}

if(isset($_GET['inve'])){
  echo '<br /><span>Invalid E-mail</span>';
}

if(isset($_GET['tknu'])){
  echo '<br /><span>That user-name is taken</span>';
}
