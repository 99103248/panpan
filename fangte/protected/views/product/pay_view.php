
<div class="mid">
	<!--左边-->
    <?php include dirname('index.php') . '/protected/views/left.php';?>
  <div class="mid_right_nr">
  	<div class="mbx">
  		<span>您所在的位置：<a href="<?php echo $this->createUrl('site/index')?>" title="株洲方特欢乐世界">首页</a> > 游玩项目</span>
  	</div>
  	<div class="title_news">
    	<h1><?php echo $info['pay_name']?></h1>
    </div>
    <div class="wzxx"><span>添加：<?php echo date('Y-m-d',$info['pay_addtime']);?></span><span>修改：<?php echo date('Y-m-d',$info['pay_updatetime']);?></span><span>隶属：<a href='<?php $this->createUrl('product/index');?>'>游玩项目</a></span><span>点击数：<?php echo $info['pay_click']?></span></div>
    <div class="nr">
	<?php echo $info['pay_content'];?>
     <table width="100%" border="0" style=" margin-top:20px;">
        	<tr height="25px;">
                    <td width="50%" align="center" valign="middle">上一个：<?php if(empty ($before)){echo "暂无";}else{echo "<a href='{$this->createUrl('product/payinfo/id/'.$before['pay_id'])}'>{$before['pay_name']}</a>";}?></td>
        	<td width="50%" align="center" valign="middle">下一个：<?php if(empty ($next)){echo "暂无";}else{echo "<a href='{$this->createUrl('product/payinfo/id/'.$next['pay_id'])}'>{$next['pay_name']}</a>";}?></td>
        </tr>
      </table>
    </div>
    <div class="nr_bottom"></div>
  </div>
</div>
<div class="clear"></div>
