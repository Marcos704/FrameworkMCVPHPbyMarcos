<?php

  /**
  *      # (Path.php) #
  * ----------------------------
  * @created   < 2/7/2023, 6:20:46 PM > 
  * @path      < c:\xampp\htdocs\IFDarknet\app\packages\system\Path\Path.php > 
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
 * Inclui um arquivo ao load da página
 * {path} -> Nome do direttorio
 * {file} -> Nome do arquivo
 *  + Ex.:
 *          includes/{path}/{file}
 */
function add($path,$file)
{
    include_once("app/views/includes/" . $path . "/".$file.".php");
}