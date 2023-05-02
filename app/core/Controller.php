<?php
namespace app\core;

class Controller{
    private $core;
     public function load($viewName, $viewData=array()){
      if($viewData) 
        extract($viewData); 
       
       include "app/views/" . $viewName .".php";
   }
}