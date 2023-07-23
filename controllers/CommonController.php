<?php

class CommonController
{
  public function home()
  {
    require "pages/index.php";
  }

  public function about()
  {
    require "pages/about.php";
  }

  public function gallery()
  {
    require "pages/gallery.php";
  }
  
  public function locations()
  {
    require "pages/locations.php";
  }
}