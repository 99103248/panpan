<?php
//���δ�����ʾ
error_reporting(0);
ini_set("max_execution_time", "180");
date_default_timezone_set ('PRC');
//������
include_once '../inc/common.class.php';
include_once '../data/adminuser.php';
include_once '../data/config.php';
//��ʼ����
$pt = new pt;
$sessSavePath = dirname(__FILE__);
if(is_writeable($sessSavePath) && is_readable($sessSavePath)){ session_save_path($sessSavePath);}
if (isset($_GET['do'])) {
    $do = $_GET['do'];
    if ($do == 'set_update_alert' and isset($_GET['type'])) {
        $type = $_GET['type'];
        $time = $_SERVER['REQUEST_TIME'];
        include "./info.php";
        include "./msg.php";
        if ($type == '1') {
            $ptbook['warn_release'] = $release;
        } elseif ($type == '2') {
            $ptbook['warn_time'] = $time + 86400;
        }
        $str = '<?php' . "\n";
        foreach ($ptbook as $key => $value) {
            $str .= "\$ptbook['$key']='$value';\n";
        }
        $str .= '?>';
        $result = $pt->writeto('./info.php', $str);
        die("action_successfully");
    }
}

function htmltojs($str)
{
    $re = '';
    if (get_magic_quotes_gpc()) {

    } else {
        $str = addslashes($str);
    }
    $str = split("\r\n", $str);
    for ($i = 0; $i < count($str); $i++) {
        $re .= "document.writeln(\"" . $str[$i] . "\");\r\n";
    }
    return $re;
}
function valuetoinput($str)
{
    $str = str_replace('\'."\'".\'', "'", $str);
    $str = htmlspecialchars($str);
    return $str;
}

function valuedo($str)
{
    if (get_magic_quotes_gpc() and !is_array($str)) {
        $str = stripslashes($str);
    }
    $str = str_replace("'", "'." . '"' . "'" . '"' . ".'", $str);
    return $str;
}
//ȡ��Ŀ¼�ļ��� ��������Ŀ¼
function get_dir_one_count($dir_name)
{
    $od = opendir($dir_name);
    while ($name = readdir($od)) {
        $file_path = $dir_name . '/' . $name;
        if (is_file($file_path)) {
            $files[] = $file_path;
        }
    }
    return count($files);
}
//ȡ��Ŀ¼�ļ��� ������Ŀ¼
function get_dir_all_count($dir_name)
{
    $od = opendir($dir_name);
    while ($name = readdir($od)) {
        $file_path = $dir_name . '/' . $name;
        if (is_file($file_path)) {
            $files[] = $file_path;
        } else
            if (($name != '.') && ($name != '..')) {
                get_file_count($file_path);
            }
    }
    return count($files);
}

function get_all_files($path)
{
    $list = array();
    foreach (glob($path . '/*') as $item) {
        if (is_dir($item)) {
            //$list = array_merge( $list , get_all_files( $item ) );
        } else {
            $list[] = $item;
        }
    }
    return $list;
}

function removedir($dirName)
 {
     $result = true;
     if(! is_dir($dirName))
     {
         return $result;
     }
     $handle = opendir($dirName);
     while(($file = readdir($handle)) !== false)
     {
         if($file != '.' && $file != '..')
         {
             $dir = $dirName . DIRECTORY_SEPARATOR . $file;
             is_dir($dir) ? removedir($dir) : unlink($dir);
         }
     }
     closedir($handle);
     $result = rmdir($dirName) ? true : false;
     return $result;
 }
 
 function re_br($str)
{
	$str=ereg_replace("\r\n","",$str); 
	$str=ereg_replace("\r","",$str); 
	//$str	= str_replace('"','&quot;',$str);		//˫����
	//$str	= ereg_replace("'","&#39;",$str);		//������
	/* �����������get_magic_quotes_gpc() �ͻ��Զ���\
	 * �� StripSlashes() ȥ \
	 */
	
	return addslashes($str);	
}
 
?>