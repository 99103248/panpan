<?php
//�������������ļ�
if (!file_exists(PT_DIR . 'cache/flink.php')){
	include PT_DIR . 'inc/link.reset.php';
}
include PT_DIR . 'cache/flink.php';

//���빫���ļ�
if (!file_exists(PT_DIR . 'cache/ptann.php')){
	include PT_DIR . 'inc/ann.reset.php';
}
include PT_DIR . 'cache/ptann.php';

//������ҳ�����ļ�
include PT_DIR . 'cache/' . PT_TPLDIR . PT_TPL . '/block.tpl.php';

//����ȫ�ֻ����ļ�
include PT_DIR . 'cache/' . PT_TPLDIR . PT_TPL . '/blocklist.tpl.php';

//����ҳ����Ϣ�ļ�
include PT_DIR . 'data/page/' . $pt_type . '.php';
?>