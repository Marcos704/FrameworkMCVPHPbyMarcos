<?php

  /**
  *      # (Network.php) #
  * ----------------------------
  * @created   < 2/7/2023, 6:25:08 PM > 
  * @path      < c:\xampp\htdocs\IFDarknet\app\packages\system\Network\Network.php > 
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
 * Verifica a URL atual e trata ela 
 * {verificador} - Valor a ser verificado
 */
function getURL($verificador)
{
    if (substr($_SERVER["REQUEST_URI"], strpos($_SERVER["REQUEST_URI"], $verificador)) == $verificador) {
        return true;
    }
    return false;
}
