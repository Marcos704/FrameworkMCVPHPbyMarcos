<?php

  /**
  *      # (File.php) #
  * ----------------------------
  * @created   < 2/7/2023, 6:24:42 PM > 
  * @path      < c:\xampp\htdocs\IFDarknet\app\packages\system\File\File.php > 
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
  
namespace app\packages\system\File;


class FILE
{
  private $FileName;
  private $FilePath;
  private $FILE;

  public function __construct($FileName, $FilePath)
  {
    $this->FileName = $FileName;
    $this->FilePath = $FilePath;
    $this->FILE = $this->FileName . $this->FilePath;
  }
  public function createFile($FileName, $FilePath)
  {
    if (!file_exists($FilePath . $FileName)) {
      $file = fopen(".$this->FILE.", "x");
      if ($file) {
        fclose($file);
        return true;
      }
      return false;
    }
    return false;
  }
  public function writeFile($data)
  {

    if (is_writable($this->FILE)) {
      
      if (!fopen(".$this->FILE.", "a")) {
        return false;
      }
      
    }
  }
}
