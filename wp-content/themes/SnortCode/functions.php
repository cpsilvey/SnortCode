<?php
foreach(glob(get_template_directory() . "/library/main/*.php") as $file){
  require $file;
}
foreach(glob(get_template_directory() . "/library/ajax/*.php") as $file){
  require $file;
}
foreach(glob(get_template_directory() . "/library/users/*.php") as $file){
  require $file;
}
foreach(glob(get_template_directory() . "/library/login/*.php") as $file){
  require $file;
}

