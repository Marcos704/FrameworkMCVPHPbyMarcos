<?php

  /**
  *      # (Router.php) #
  * ----------------------------
  * @created   < 2/7/2023, 6:25:37 PM > 
  * @path      < c:\xampp\htdocs\IFDarknet\app\packages\system\Router\Router.php > 
  * @type      < php > 
  * @author    <seu-nome>
  * @copyright <sua-empresa>
  * ----------------------------
  *      #  Descricao   #
  *     digite a decricao
  * ----------------------------
  * -- gerado automaticamente --
  *       phpcodedetals
  **/
  
/**
 * Redireciona para uma nova view
 * {viewName} -> nome da view
 */
function redirect($viewName)
{
    if ($viewName == null) {
        header("Location:" . URL_BASE);
    } else {
        header("Location: " . URL_BASE . $viewName . ".php");
    }
}

/**
 * Recarrega a view atual
 */
function reload()
{
    $view = $_SERVER['REQUEST_URI'];
    header("Location: " . $view);
}

/**
 * Volta para a view anterior
 */
function backPage()
{

    if (str_contains($_SERVER["PHP_SELF"], 'backPague')) {
        echo "<script>history.go(-2);</script>";
    } else {
        echo "<script>history.go(-1);</script>";
    }
}
