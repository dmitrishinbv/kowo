<?php
/*обрезаем текст на заданное количество символов*/
function BreakText($text, $length){
    if( mb_strlen($text) < $length + 1 ) return $text;//don't cut if too short

    $break_pos = strpos($text, ' ', $length);//find next space after desired length
    $visible = substr($text, 0, $break_pos);
    return $visible . " […]";
}
?>