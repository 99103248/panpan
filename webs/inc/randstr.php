<?php

function randstr($body,$fontcolor="#FFFFFF",$maxpos = 1024)
{
	//���������(����ڼ�ⲻ��p��ǵ�����£���������ִ������������)
	//$maxpos = 100;

	//font ��������ɫ
	//$fontcolor = "#FFFFFF";

	//div span p ��ǵ������ʽ
	$st1 = chr(mt_rand(ord('A'),ord('Z'))).chr(mt_rand(ord('a'),ord('z'))).chr(mt_rand(ord('a'),ord('z'))).mt_rand(100,999);
	$st2 = chr(mt_rand(ord('A'),ord('Z'))).chr(mt_rand(ord('a'),ord('z'))).chr(mt_rand(ord('a'),ord('z'))).mt_rand(100,999);
	$st3 = chr(mt_rand(ord('A'),ord('Z'))).chr(mt_rand(ord('a'),ord('z'))).chr(mt_rand(ord('a'),ord('z'))).mt_rand(100,999);
	$st4 = chr(mt_rand(ord('A'),ord('Z'))).chr(mt_rand(ord('a'),ord('z'))).chr(mt_rand(ord('a'),ord('z'))).mt_rand(100,999);
	$rndstyle[1]['value'] = ".{$st1} { display:none; }";
	$rndstyle[1]['name'] = $st1;
	$rndstyle[2]['value'] = ".{$st2} { display:none; }";
	$rndstyle[2]['name'] = $st2;
	$rndstyle[3]['value'] = ".{$st3} { display:none; }";
	$rndstyle[3]['name'] = $st3;
	$rndstyle[4]['value'] = ".{$st4} { display:none; }";
	$rndstyle[4]['name'] = $st4;
	$mdd = mt_rand(1,4);
	$rndstyleValue = $rndstyle[$mdd]['value'];
	$rndstyleName = $rndstyle[$mdd]['name'];
	$reString = "<style> $rndstyleValue </style>\r\n";

	//�������
	$rndem['1'] = 'font';
	$rndem['2'] = 'span';
	$rndem['3'] = 'Span';
	$rndem['4'] = 'FoNt';
	$rndem['5'] = 'FOnT';
	$rndem['6'] = 'SpAn';
	$rndem['7'] = 'spaN';
	$rndem['8'] = 'fonT';

	//��ȡ�ַ�������
	$fp = fopen('./data/randstr.php','r');
	$start = 0;
	$totalitem = 0;

	while(!feof($fp))
	{
		$v = trim(fgets($fp,128));
		if($start==1)
		{
			if(ereg("#end#",$v))
			{
				break;
			}
			if($v!='')
			{
				$totalitem++; $rndstring[$totalitem] = ereg_replace("#,","",$v);
			}
		}
		if(ereg("#start#",$v))
		{
			$start = 1;
		}
	}
	fclose($fp);

	//����Ҫ���ɼ����ֶ�
	$bodylen = strlen($body) - 1;
	$prepos = 0;
	for($i=0;$i<=$bodylen;$i++)
	{
		if($i+2 >= $bodylen || $i<50)
		{
			$reString .= $body[$i];
		}
		else
		{
			$ntag = @strtolower($body[$i].$body[$i+1].$body[$i+2]);
			if($ntag=='</p' || ($ntag=='<br' && $i-$prepos>$maxpos) )
			{
				$dd = mt_rand(1,8);
				$emname = $rndem[$dd];
				$dd = mt_rand(1,$totalitem);
				$rnstr = $rndstring[$dd];
				if($emname!='font' and $emname!='fonT' and $emname!='FoNt')
				{
					$rnstr = " <$emname class=\"$rndstyleName\">$rnstr</$emname> ";
				}
				else
				{
					$rnstr = " <font color=\"$fontcolor\">$rnstr</font> ";
				}
				$reString .= $rnstr.$body[$i];
				$prepos = $i;
			}
			else
			{
				$reString .= $body[$i];
			}
		}
	}
	return $reString;
}//��������
?>