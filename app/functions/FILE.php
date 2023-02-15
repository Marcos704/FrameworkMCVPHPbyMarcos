<?php

namespace app\functions;


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
