<?php include 'header.share.php';?>
	 <table width="100%" cellpadding="0" cellspacing="0" class="table_list">
                  <tr>
                    <th>�����Ŀ</th>
                    <th>��ǰ����</th>
                    <th>���黷��</th>
                    <th>����Ӱ��</th>
                  </tr>
                  <tr>
                    <td>����ϵͳ</td>
                    <td><?php echo php_uname();?></td>
                    <td>Windows_NT/Linux/Freebsd</td>
                    <td><font color="yellow">&radic;</font></td>
                  </tr>
                  <tr>
                    <td>Web ������</td>
                    <td><?php echo $_SERVER['SERVER_SOFTWARE'];?></td>
                    <td>Apache/IIS</td>
                    <td><font color="yellow">&radic;</font></td>
                  </tr>
                  <tr>
                    <td>php �汾</td>
                    <td>php <?php echo phpversion();?></td>
                    <td>php 5.0.0 ������</td>
                    <td><?php if(phpversion() >= '5.0.0'){ ?><font color="yellow">&radic;<?php }else{ ?><font color="red">�޷�����ʹ��</font><?php }?></font></td>
                  </tr>
                  <tr>
                    <td>Mysql ��չ</td>
                    <td><?php if(extension_loaded('mysql')){ ?>&radic;<?php }else{ ?>&times;<?php }?></td>
                    <td>���뿪��</td>
                    <td><?php if(extension_loaded('mysql')){ ?><font color="yellow">&radic;</font><?php }else{ ?><font color="red">�޷�����ʹ��</font><?php }?></td>
                  </tr>
                  <tr>
                    <td>GD ��չ</td>
                    <td><?php if(function_exists( "gd_info" )){ ?>&radic; (֧�� png jpg gif) <?php }else{ ?>&times;<?php }?></td>
                    <td>���뿪��</td>
                    <td><?php if(function_exists( "gd_info" )){ ?><font color="yellow">&radic;</font><?php }else{ ?><font color="red">�޷����ͼƬˮӡ��������֤��</font><?php }?></td>
                  </tr>
                  <tr>
                    <td>allow_url_fopen</td>
                    <td><?php if(ini_get('allow_url_fopen')){ ?>&radic;<?php }else{ ?>&times;<?php }?></td>
                    <td>���뿪��</td>
                    <td><?php if(ini_get('allow_url_fopen')){ ?><font color="yellow">&radic;</font><?php }else{ ?><font color="red">�޷���ȡԶ������</font><?php }?></td>
                  </tr>
                  <tr>
                    <td>Zlib ��չ</td>
                    <td><?php if(extension_loaded('zlib')){ ?>&radic;<?php }else{ ?>&times;<?php }?></td>
                    <td>���鿪��</td>
                    <td><?php if(extension_loaded('zlib')){ ?><font color="yellow">&radic;</font><?php }else{ ?><font color="red">��֧��Gzip����</font><?php }?></td>
                  </tr>                  
                  <tr>
                    <td>Curl ��չ</td>
                    <td><?php if(function_exists("curl_init")){ ?>&radic;<?php }else{ ?>&times;<?php }?></td>
                    <td>���鿪��</td>
                    <td><?php if(function_exists("curl_init")){ ?><font color="yellow">&radic;</font><?php }else{ ?><font color="red">�޷�ģ���½</font><?php }?></td>
                  </tr>
                  <tr>
                    <td>PHP��Ϣ PHPINFO</td>
                    <td colspan="3" align="center"><a href="install.php?act=phpinfo" target="_blank" style="text-decoration:underline;" title="�鿴PHPINFO��Ϣ">PHPINFO</a></td>
                  </tr>
                </table>
        <form id="install" action="install.php" method="get">
            <input type="hidden" name="step" value="4" />
        </form>
        <input type="button" onclick="javascript:history.go(-1);" value="������һ�� : ������Э��" class="btn" />
        <input type="button" onclick="$('#install').submit();" class="btn" value="��һ�� : �ļ�Ȩ�޼��" />
  </div>
</div>
</body>
</html>