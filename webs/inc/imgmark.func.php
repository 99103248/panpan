<?php
/**
	 * PHPͼƬˮӡ (ˮӡ֧��ͼƬ������)֧������
	 * @param  string    $groundImage    ����ͼƬ·��
	 * @param  intval    $waterPos       ˮӡλ��:��10��״̬��1-9����Ϊ���λ�ã�
     *                                      1Ϊ���˾���2Ϊ���˾��У�3Ϊ���˾��ң�
	 *                                      4Ϊ�в�����5Ϊ�в����У�6Ϊ�в����ң�
	 *                                      7Ϊ�׶˾���8Ϊ�׶˾��У�9Ϊ�׶˾��ң�
     * @param  array     $water_arr      �������飬�ɰ�������ֵ��
     *----------------------------------------------------------------
	 *   string    $type       ���ˮӡ������ ,  'img' => ���ˮӡͼƬ, 'text' => ���ˮӡ����,
	 *   string    $path       ���ˮӡͼƬʱ,ˮӡͼƬ��·��,
	 *   string    $content    ���ˮӡ���ֵ���������
	 *   string    $textColor  ���ˮӡ���ֵ�������ɫ
	 *   string    $textFont   ���ˮӡ���ֵ�����С��
	 *   string    $textFile   ���ˮӡ���ֵ������ֿ�·��
	 *----------------------------------------------------------------
	 * @return mixed    ����TRUE�������Ϣ��ֻ�е�����TRUEʱ���������ǳɹ���
	 * @example
	 * <code>
	 * imageWaterMark('./apntc.gif', 1,  array('type' => 'img', 'path')); ���ˮӡͼƬ
     * imageWaterMark('./apntc.gif', 1, array('type' => 'text', 'content' => '', 'textColor' => '', 'textFont' => ''));  ���ˮӡ����
     * </code>
	 */
	function imageWaterMark($backgroundPath, $waterPos = 0, $water_arr )
	{
		$isWaterImage = FALSE;
	    //��ȡ����ͼƬ
		if(!empty($backgroundPath) && file_exists($backgroundPath)){
			$background_info = getimagesize($backgroundPath);
			$ground_width = $background_info[0];//ȡ�ñ���ͼƬ�Ŀ�
			$ground_height = $background_info[1];//ȡ�ñ���ͼƬ�ĸ�
		 
			switch($background_info[2])//ȡ�ñ���ͼƬ�ĸ�ʽ
			{
				case 1:
					$background_im = imagecreatefromgif($backgroundPath);break;
				case 2:
					$background_im = imagecreatefromjpeg($backgroundPath);break;
				case 3:
					$background_im = imagecreatefrompng($backgroundPath);break;
				default:
					die($formatMsg);
			}
		} else {
	        return 'water image is not exists';
	    }
	    //�趨ͼ��Ļ�ɫģʽ
		imagealphablending($background_im, true);
	    
		if (is_array($water_arr) && !empty($water_arr)) {
			if($water_arr['type'] === 'img' && !empty($water_arr['path']) && file_exists($water_arr['path'])){
				$isWaterImage = TRUE;
		        $set = 0;
				$offset = isset($water_arr['offset']) && !empty($water_arr['offset']) ? $water_arr['offset'] : 0;
				$water_info = getimagesize($water_arr['path']);
			    $water_width = $water_info[0];//ȡ��ˮӡͼƬ�Ŀ�
				$water_height = $water_info[1];//ȡ��ˮӡͼƬ�ĸ�
				switch($water_info[2])//ȡ��ˮӡͼƬ�ĸ�ʽ
				{
					case 1:
						$water_im = imagecreatefromgif($water_arr['path']);
						break;
					case 2:
						$water_im = imagecreatefromjpeg($water_arr['path'])
						;break;
					case 3:
						$water_im = imagecreatefrompng($water_arr['path']);
						break;
					default:
						return 'picture format mistake';
		 	    } 
			} elseif ($water_arr['type'] === 'text' && $water_arr['content'] !='') {
			    $fontfile =  isset($water_arr['fontFile']) && !empty($water_arr['fontFile']) ?  $water_arr['fontFile'] : 'simkai.ttf';
			    $fontfile = 'C:\WINDOWS\Fonts\\' . $fontfile ;
				$waterText = $water_arr['content'];
				$set = 1;
				$offset = isset($water_arr['offset']) && !empty($water_arr['offset']) ? $water_arr['offset'] : 5;
				$textColor =  !isset($water_arr['textColor']) || empty($water_arr['textColor']) ? '#FF0000' :  $water_arr['textColor']; 
				$textFont =  !isset($water_arr['textFont']) || empty($water_arr['textFont']) ? 20 :  $water_arr['textFont']; 
				$temp = @imagettfbbox(ceil($textFont),0,$fontfile,$waterText);//ȡ��ʹ�� TrueType ������ı��ķ�Χ
			    $water_width = $temp[2] - $temp[6];
			    $water_height = $temp[3] - $temp[7];
			    unset($temp);
			} else {
				return 'parameter mistake';
			}
		} else {
			return FALSE;
		}
	 
	    if( ($ground_width< $water_width) || ($ground_height<$water_height) ) {
			return "water image larger than background image";
	    }
		
		switch($waterPos)
		{
			case 1://1Ϊ���˾���
				$posX = $offset * $set; 
				$posY = ($water_height + $offset) * $set-10;
			    break;
			case 2://2Ϊ���˾���
				$posX = ($ground_width - $water_width) / 2;
				$posY = ($water_height + $offset) * $set;
				break;
			case 3://3Ϊ���˾���
				$posX = $ground_width - $water_width - $offset * $set;
				$posY = ($water_height + $offset) * $set-10;
				break;
			case 4://4Ϊ�в�����
				$posX = $offset * $set;
				$posY = ($ground_height - $water_height) / 2;
			break;
				case 5://5Ϊ�в�����
				$posX = ($ground_width - $water_width) / 2;
				$posY = ($ground_height - $water_height) / 2;
				break;
			case 6://6Ϊ�в�����
				$posX = $ground_width - $water_width - $offset * $set;
				$posY = ($ground_height - $water_height) / 2;
				break;
			case 7://7Ϊ�׶˾���
				$posX = $offset * $set;
				$posY = $ground_height - $water_height;
				break;
			case 8://8Ϊ�׶˾���
				$posX = ($ground_width - $water_width) / 2;
				$posY = $ground_height - $water_height;
				break;
			case 9://9Ϊ�׶˾���
				$posX = $ground_width - $water_width - $offset * $set;
				$posY = $ground_height -$water_height;
				break;
			default://���
				$posX = rand(0,($ground_width - $water_width));
				$posY = rand(0,($ground_height - $water_height));
			    break;
		}
	 
		if($isWaterImage === TRUE) {//ͼƬˮӡ
			imagealphablending($water_im,true); 
            imagealphablending($background_im,true); 
			imagecopy($background_im, $water_im, $posX, $posY, 0, 0, $water_width,$water_height);//����ˮӡ��Ŀ���ļ�
		} else { //����ˮӡ
			if( !empty($textColor) && (strlen($textColor)==7) ) {
				$R = hexdec(substr($textColor,1,2));
				$G = hexdec(substr($textColor,3,2));
				$B = hexdec(substr($textColor,5));
			} else {
			    return "text color format mistake";
			}
            $color=imagecolorallocate($background_im, $R, $G, $B);
            $color=0-$color;
			imagettftext($background_im, $textFont, 0, $posX, $posY,$color , $fontfile , $waterText);
	    }
	 
		//����ˮӡ���ͼƬ
		@unlink($backgroundPath);
		switch($background_info[2])//ȡ�ñ���ͼƬ�ĸ�ʽ
		{
			case 1:
				imagegif($background_im,$backgroundPath);
				break;
			case 2:
				imagejpeg($background_im,$backgroundPath);
				break;
			case 3:
				imagepng($background_im,$backgroundPath);
				break;
			default:
				die($errorMsg);
		}
		
		if(isset($water_im)) {
			imagedestroy($water_im);
		}
		
		imagedestroy($background_im);
	}

if (PT_MARKPOWER=="true"){
    include PT_DIR.'data/mark.php';
    $mark_arr=explode('|',$pt_mark_where);
    $pt_mark_textstr = iconv('GBK','UTF-8',$pt_mark_textstr);
    for ($i=0;$i<count($mark_arr);$i++){
        $value=$mark_arr[$i];
        if ($pt_mark_type=='pic'){
            imageWaterMark($file,$value,array('type' => 'img', 'path' => $pt_mark_picurl));
        }else{ 
            imageWaterMark($file,$value,array('type' => 'text', 'content' => $pt_mark_textstr, 'textColor' => $pt_mark_textcolor, 'textFont' => $pt_mark_textsize));
        }        
    }
    
}


?>