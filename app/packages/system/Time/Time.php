<?php

  /**
  *      # (Time.php) #
  * ----------------------------
  * @created   < 2/7/2023, 6:27:39 PM > 
  * @path      < c:\xampp\htdocs\IFDarknet\app\packages\system\Time\Time.php > 
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
  

function getDataHoraAtual()
{
    $data = date('Y-m-d H:i:s');
    return $data;
}
function getDataHoraAtualFomatted()
{
    $data = date('d-m-Y H:i:s');
    return $data;
}
function getDiaAtual()
{
    return date('d');
}
function getMesAtual()
{
    return date('m');
}
function getAnoAtual()
{
    return date('Y');
}