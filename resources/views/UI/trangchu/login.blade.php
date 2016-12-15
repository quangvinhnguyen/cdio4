<html>
<head>
	<title></title>
</head>
<body>
	<form class = "loginForm" name ="loginForm" action="{{ route('success') }}" method="POST">
		<input type = "hidden" name ="_token" value = "{{ csrf_token() }}">
		<table>
			<tr>
				<td><label>Email</label></td>
				<td><input type="email" id ="email" name="email" value=""></td>
			</tr>
			<tr>
				<td><label>Mật Khẩu</label></td>
				<td><input type="password" id="password" name="password" value=""></td>
			</tr>
			<tr>
				<td><input type="submit" id ="btDN" name="btDN" value="Đăng Nhập"></td>
			</tr>
		</table>
	</form>
</body>
</html>