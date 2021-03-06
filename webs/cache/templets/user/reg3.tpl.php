<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title><?php echo PT_SITENAME?> - 会员中心 - 注册</title>
<meta http-equiv="Content-Type" content="text/html; charset=GBK">
<link rel="stylesheet" type="text/css" href="<?php echo PT_SITEURL?>templets/user/css/basic.css">
<link rel="stylesheet" type="text/css" href="<?php echo PT_SITEURL?>templets/user/css/pphelp.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo PT_SITEURL?>templets/user/js/common.js"></script>
</head>
<body>
<div id="topnav">
	<a href="<?php echo PT_SITEURL?>" id="logo" title="<?php echo PT_SITENAME?>"></a>
	<a href="<?php echo PT_SITEURL?>user/">会员中心</a>|<a href="<?php echo PT_SITEURL?>">返回首页</a>
</div>
<div class="main">
	<div class="mainleft">
		<h2 class="title">用户指南</h2>
		<div class="helpl_list">
			<h4><a href="login.php">用户登录</a></h4>
			<h4><a href="reg.php">用户注册</a></h4>
			<h4><a href="getpwd.php">找回密码</a></h4>
			<h4><a href="<?php echo PT_SITEURL?>">返回首页</a></h4>
		</div>
		<div class="spline"></div>
		<h2 class="title">用户中心</h2>
		<ul class="question">
			<li><a href="index.php">会员首页</a></li>
			<li><a href="info.php">账户信息</a></li>
			<li><a href="edit.php">资料设置</a></li>
			<li><a href="mark.php">书架管理</a></li>
			<li><a href="automark.php">浏览历史</a></li>
			<li><a href="pm.php">站内消息</a></li>
		</ul>
	</div>
	<div class="mainright">
		<div class="tinfo">
			<div class="title3"></div>
		</div>
		<div id="reg">
			<div class="regbox">
				<h2 class="tc fred">选填内容</h2>
				<dl><dd>
					<form name="myform" action="reg4.php" method="post">
					<table border="0" cellpadding="0" cellspacing="0" width="100%">
						<tr class="tit">
							<td class="tit" valign="top"><strong>用户名：</strong></td>
							<td valign="top">
								<input type="text" name="username" value="<?php echo $username?>" size="15" class="text" readonly="readonly"/>
							</td>
						</tr>
						<tr class="tit">
							<td class="tit" valign="top"><strong>密码：</strong></td>
							<td valign="top">
								<input type="password" name="password" value="<?php echo $password?>" size="40" class="text" readonly="readonly"/>
							</td>
						</tr>
						<tr class="tit">
							<td class="tit" valign="top"><strong>邮箱：</strong></td>
							<td align="center">
								<input type="text" name="email" value="<?php echo $email?>" size="40" class="text" readonly="readonly"/>
							</td>
						</tr>
						<tr class="tit">
							<td class="tit" valign="top"><strong>QQ号码：</strong></td>
							<td valign="top">
								<input type="text" name="qq" value="<?php echo $qq?>" size="15" class="text" readonly="readonly"/>
							</td>
						</tr>
						<tr class="bor_01">
							<td class="tit" valign="top"><strong>姓名：</strong></td>
							<td valign="top">
								<input type="text" name="turename" value="" size="15" class="text"/>
							</td>
						</tr>
						<tr class="tit">
							<td class="tit" valign="top"><strong>性别：</strong></td>
							<td valign="top">
								<input type="radio" name="sex" value="男" style="border:0px" checked="checked"/>　男
								<br />
								<input type="radio" name="sex" value="女" style="border:0px"/>　女
							</td>
						</tr>
						<tr class="tit">
							<td class="tit" valign="top"><strong>生日：</strong></td>
							<td>
								<input type="text" name="birthday" id="birthday" value="" size="15" readonly="readonly"/>
								<link rel="stylesheet" type="text/css" href="<?php echo PT_SITEURL?>templets/user/css/calendar.css"/>
								<script type="text/javascript" src="<?php echo PT_SITEURL?>templets/user/js/calendar.js"></script>
							</td>
						</tr>
						<tr class="tit">
							<td class="tit" valign="top"><strong>头像：</strong></td>
							<td>
								<input type="text" name="userimg" value="" size="20"/>　<a href='javascript:///' onclick="window.open('face.html','chooseface','left=190px,top=110px,Width=537px,Height=425px,resizable=no,scrolls=no')">选择头像</a>
							</td>
						</tr>
						<tr class="tit">
							<td class="tit" valign="top"><strong>来自：</strong></td>
							<td>
								<select id="usercity" name="usercity">
									<option value="北京">北京</option>
									<option value="上海">上海</option>
									<option value="天津">天津</option>
									<option value="重庆">重庆</option>
									<option value="河北">河北</option>
									<option value="山西">山西</option>
									<option value="内蒙古">内蒙古</option>
									<option value="辽宁">辽宁</option>
									<option value="吉林">吉林</option>
									<option value="黑龙江">黑龙江</option>
									<option value="江苏">江苏</option>
									<option value="浙江">浙江</option>
									<option value="安徽">安徽</option>
									<option value="福建">福建</option>
									<option value="江西">江西</option>
									<option value="山东">山东</option>
									<option value="河南">河南</option>
									<option value="湖北">湖北</option>
									<option value="湖南">湖南</option>
									<option value="广东">广东</option>
									<option value="广西">广西</option>
									<option value="海南">海南</option>
									<option value="四川">四川</option>
									<option value="贵州">贵州</option>
									<option value="云南">云南</option>
									<option value="西藏">西藏</option>
									<option value="陕西">陕西</option>
									<option value="甘肃">甘肃</option>
									<option value="青海">青海</option>
									<option value="云南">云南</option>
									<option value="宁夏">宁夏</option>
									<option value="新疆">新疆</option>
									<option value="香港">香港</option>
									<option value="澳门">澳门</option>
									<option value="台湾">台湾</option>
									<option value="其他">其他</option>
								</select>
							</td>
						</tr>
						<tr class="tit">
							<td class="tit" valign="top"><strong>电话：</strong></td>
							<td valign="top">
								<input type="text" name="telephone" value="" size="20" class="text" require="false" regexp="^[0-9-]{6,13}$" datatype="custom" msg='电话格式不对' />
							</td>
						</tr>
						<tr class="tit">
							<td class="tit" valign="top"><strong>MSN：</strong></td>
							<td valign="top">
								<input type="text" name="msn" value="" size="40" class="text" require="false" regexp="^[\w\-\.]+@[\w\-\.]+(\.\w+)+$" datatype="custom" msg='MSN格式不对' />
							</td>
						</tr>
						<tr class="tit">
							<td class="tit" valign="top"><strong>个人主页：</strong></td>
							<td valign="top">
								<input type="text" name="myurl" value="" size="50" class="text"/>
							</td>
						</tr>
					</table>
					<table>
						<tr class="bor_01">
							<td class="tc" colspan="3" valign="top">
								<script type="text/javascript" src="<?php echo PT_SITEURL?>templets/user/js/check.js"></script>
								<input type="submit" name="dosubmit" value="下一步" class="submit"/>
								<input type="reset" name="button2" value="重 置" class="submit"/>
							</td>
						</tr>
					</table>
					</form>
				</dd></dl>
			</div>
</div>
	</div>
	<div class="spline"></div>
</div>
<div class="copyright">Copyright &copy; 2011 <a href="<?php echo PT_SITEURL?>"><?php echo PT_SHORTURL?> </a> All Rights Reserved. 【<?php echo PT_SITENAME?>】 <script src="http://www.59book.net/files/friend/tongji.js" type="text/javascript" language="javascript"></script></div>
</body>
</html>