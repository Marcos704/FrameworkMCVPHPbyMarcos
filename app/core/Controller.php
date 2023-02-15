<?php
namespace app\core;

class Controller{
    private $core;
     public function load($viewName, $viewData=array()){
      if($viewData) 
        extract($viewData); 
       
       include "app/views/" . $viewName .".php";
   }
    public function redirect($viewName){
        if($viewName == null){
            header("Location:".URL_BASE);
        }else{
            header("Location: ". URL_BASE . $viewName.".php"); 
        }
         
    }
    public function redirectAfter(){
        
        if(str_contains($_SERVER["PHP_SELF"], 'backPague')){
            echo "<script>history.go(-2);</script>"; 
        }else
        {
            echo "<script>history.go(-1);</script>"; 
        }
    }
    public function reloadActivity()
    {
        $localActivity = $_SERVER['REQUEST_URI'];
        header("Location: ".$localActivity);
    }
}