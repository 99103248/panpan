<?php
if (file_exists('../data/install.lock')){
    exit('���Ѿ���װ��<b>PTС˵����</b>,���°�װ��ɾ��dataĿ¼��install.lock�ļ�');
}
header('location:install.php');
?>
