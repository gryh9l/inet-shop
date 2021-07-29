<?php
class kaptcha_set{
  public function char(){
    $chars = 'abcdefghijkmnopqrstuvwxyz23456789';
      $numChars = strlen($chars);
      $str = substr($chars, rand(1, $numChars) - 1, 1);
      return $str; 
  }
  public function image_cap(){
      // error_reporting (E_ALL); // нужен для вывода ошибок
    // Должно быть расширение php-gd 
    // обязательно после создания надо перевести в кодировку "encoding и convert to utf-8 without BOM"
      // создаём полотно
      // полотоно
    session_start();
      $i = imageCreate(270, 120);
      // цвет полотна
      $back_color = imageColorAllocate($i, 20, 0, 100);
      // фиксируем цвет фона
      imagefill($i, 0, 0, $back_color);
      // цвет линий
      $color_line = imageColorAllocate($i, 220, 180, 20);
      // жирность линий
      imagesetthickness($i, 4);
      for($t=0; $t<4; $t++){
        imageline($i, rand(1, 5), rand(1, 120), rand(260, 269), rand(1, 120), $color_line);
      }
      $color_font = imagecolorallocate($i, 255, 255, 0);
      // путь обязательно должен быть абсолютным (от диска и до папки с сайтом)
      $font = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'account'.DIRECTORY_SEPARATOR.'autor_registr'.DIRECTORY_SEPARATOR.'set'.DIRECTORY_SEPARATOR.'font.ttf';
      $random_int = rand(4,5);
      $x = rand(10,20);
      for($int=0; $int<$random_int; $int++){
        $text = $this->char();
        imagettftext($i, /*size*/rand(60, 80), /* угол поворота */rand(-20, 20), $x, /*y*/rand(60, 90),$color_font, $font, $text);
        $text_char[] = $text;
        $x+=50;
      }
      $text_char = implode('',$text_char);
      $_SESSION['kap4a'] = md5(md5($text_char));
      Header("Content-type: image/jpeg");
      imageJpeg($i);
      imageDestroy($i); 
  }
}
$char_set = new kaptcha_set();
$char_set->image_cap();
?>