<?php

function p($array){
	dump($array,true,'<pre>',0);
}
/**
 * [writeArr 写入配置文件方法]
 * @param  [type] $arr      [要写入的数据]
 * @param  [type] $filename [文件路径]
 * @return [type]           [description]
 */
function writeArr($arr, $filename) {
    return file_put_contents($filename, "<?php\r\nreturn " . var_export($arr, true) . ";");
}
