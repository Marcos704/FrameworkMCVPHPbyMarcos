<?php

  /**
  *      # (Array.php) #
  * ----------------------------
  * @created   < 2/7/2023, 6:22:39 PM > 
  * @path      < c:\xampp\htdocs\IFDarknet\app\packages\system\Array\Array.php > 
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
 * Remove e atualiza os dados contidos em um array
 * {array}    -> Array que será manipulado
 * {params}   -> Paramentro/Condicao de busca
 * {position} -> Posicao que será utilizado
 *                  {start} - Inicio
 *                  {end}   - Fim
 * #Retorno -> Array 
 */
function arrayUnset($array, $params, $position)
{
    $newArray = $array;
    for ($i = 0; $i < count($newArray); $i++) {
        foreach ($newArray as $key => $value) {
            if ($position == 'start') {
                if (!str_starts_with($key, $params)) {
                    unset($newArray[$key]);
                }
            } else
         if ($position == 'end') {
                if (!str_ends_with($key, $params)) {
                    unset($newArray[$key]);
                }
            }
        }
    }
    return $newArray;
}