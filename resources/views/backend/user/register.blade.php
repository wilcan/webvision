
<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>登录</title>
</head>
<body>
	<table>
		<form action="<?=route('register')?>" method="post">
			<tr>
				<th>用户名</th>
				<td><input type="text" value="" name="user_name" placeholder="用户名/注册邮箱"></td>
			</tr>
			<tr>
				<th>密码</th>
				<td><input type="password" name="password"></td>
			</tr>
			<tr>
				<th>确认密码</th>
				<td><input type="password" name="password_confirmation"></td>
			</tr>
			<tr>
				<th><input type="submit" value="注册"></th>
			</tr>
		</form>
	</table> 
</body>
</html>