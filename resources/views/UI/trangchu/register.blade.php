<html>
<head>
	<title></title>
</head>
<body>
	<form class = "registerForm" name ="registerForm" action="{{ route('store') }}" method="POST">
		<input type = "hidden" name ="_token" value = "{{ csrf_token() }}">
		<table>
			
			<tr>
				<td><label>Tên Người Dùng</label></td>
				<td><input type="text"id ="ten_kh" name="ten_kh" value=""></td>
				@if(count($errors)>0)
				<td><div class="alert danger cd md 6"> {{  $errors->first('ten_kh') }}</div></td>
				@endif
			</tr>

			<tr>
				<td><label>Email</label></td>
				<td><input type="email" id="email" name="email" value=""></td>
				@if(count($errors)>0)
				<td><div class="alert danger cd md 6"> {{  $errors->first('email') }}</div></td>
				@endif
			</tr>
			<tr>
				<td><label>Mật Khẩu</label></td>
				<td><input type="password" id="password" name="password" value=""></td>
				@if(count($errors)>0)
				<td><div class="alert danger cd md 6"> {{  $errors->first('password') }}</div></td>
				@endif
			</tr>

			<tr>
				<td><label>SĐT</label></td>
				<td><input type="text" id ="sdt" name="sdt" value=""></td>
				@if(count($errors)>0)
				<td><div class="alert danger cd md 6"> {{  $errors->first('sdt') }}</div></td>
				@endif
			</tr>
			<tr>
				<td><label>Địa Chỉ</label></td>
				<td><input type="text" id ="dia_chi" name="dia_chi" value=""></td>
				@if(count($errors)>0)
				<td><div class="alert danger cd md 6"> {{  $errors->first('dia_chi') }}</div></td>
				@endif
			</tr>
			<tr>
				<td><input type="submit" id ="btDK" name="btDK" value="Đăng ký"></td>
			</tr>

		</table>
	</form>
</body>
</html>