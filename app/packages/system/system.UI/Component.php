<?php

use app\packages\system\DataBase\DataBase;

/**
 *      # (Component.php) #
 * ----------------------------
 * @created   < 2/10/2023, 6:52:31 PM > 
 * @path      < c:\xampp\htdocs\IFDarknet\app\packages\system\system.UI\Component.php > 
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
 * Cria um componente na view do tipo Select
 * como os dados de uma tabela no banco de dados
 * 
 * {$tabela}
 *  -> Nome da tabela onde será realizado a coleta dos dados
 * {$nameSelectOption}
 *  -> Nome do campo na tabela de banco de dados que será 
 *     utilizado na renderização na view
 *  -> Default 'false' 
 *      -> Renderiza o mesmo valor que o $valueSelectOption
 *                        
 * {$valueSelectOption}
 *  -> Nome do campo na tabela de banco de dados que será 
 *     utilizado como atributo 'valeu' no select
 *  -> Default 'false' 
 *      -> Renderiza o mesmo valor que o $nameSelectOption
 */
function createSelect(
  $tabela,
  $idSelect,
  $obrigatorio,
  $idReferenciaLabel,
  $informacaoLabel,
  $nameSelect,
  $informacaoSelect,
  $valorSelect
) {
  if(!$tabela){
    console_log("{Erro}","Falha ao gerar componente, tabela nao informada","{id componente} - ".$idSelect,"erro");
  }
  $dataBase = new DataBase();
  $dados = $dataBase->obterRegistros($tabela, null, null, null, 1);
  if (!$dados) {
    console_log("{Erro}","Falha ao gerar componente, nao retornou dados","{id componente} - ".$idSelect,"erro");
    modal("Atenção","Falha na requisição de dados. O formulário pode não funcionar corretamente", "danger");
    if($obrigatorio){
      echo '
      <label for="'.$idReferenciaLabel.'" class="form-label">'.$informacaoLabel.'</label>
        <div class="input-group has-validation">
          <select id="'.$idSelect.'" name="'.$nameSelect.'" class="form-control form-control-dark" required>
            <option selected disabled value>Não retornou dados</option>
          </select>
        </div>';
    }else{
      echo '
      <label for="'.$idReferenciaLabel.'" class="form-label">'.$informacaoLabel.'</label>
        <div class="input-group has-validation">
          <select id="'.$idSelect.'" name="'.$nameSelect.'" class="form-control form-control-dark">
            <option selected disabled value>Não retornou dados</option>
          </select>
        </div>';
    }
  }else{
    if($obrigatorio){
      echo '
      <label for="'.$idReferenciaLabel.'" class="form-label">'.$informacaoLabel.'</label>
        <div class="input-group has-validation">
          <select id="'.$idSelect.'" name="'.$nameSelect.'" class="form-control form-control-dark" required>
            <option selected disabled value>Selecione</option>';
          for($i = 0; $i < count($dados); $i++){
            foreach($dados[$i] as $key => $value){}
            $descricao  = $dados[$i][$informacaoSelect];
            $valor      = $dados[$i][$valorSelect];
            echo '<option value="'.$valor.'">'.$descricao.'</option>';
          }
      echo'
          </select>
        </div>';
    }else{
      echo '
      <label for="'.$idReferenciaLabel.'" class="form-label">'.$informacaoLabel.'</label>
        <div class="input-group has-validation">
          <select id="'.$idSelect.'" name="'.$nameSelect.'" class="form-control form-control-dark">
            <option selected disabled value>Selecione</option>';
          for($i = 0; $i < count($dados); $i++){
            foreach($dados[$i] as $key => $value){}
            $descricao  = $dados[$i][$informacaoSelect];
            $valor      = $dados[$i][$valorSelect];
            echo '<option value="'.$valor.'">'.$descricao.'</option>';
          }
      echo'
          </select>
        </div>';
    }
    
  }
}


function createTable()
{

}
