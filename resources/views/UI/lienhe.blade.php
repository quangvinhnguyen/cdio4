<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href='http://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet' type='text/css'>
	<link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
	 <link href="{!! asset('public/ui/css/lienhe.css') !!}" rel="stylesheet" type="text/css" media="all"/>
</head>
<body>
<div id="content">
    <h1>Contact</h1>

    <form method="post" autocomplete="on" action="{!! url('lien-he') !!}">
    {{ csrf_field() }}
        <p>
            <label for="username" class="icon-user"> Name
                <span class="required">*</span>
            </label>
            <input type="text" name="name" id="name" required="required" placeholder="Tên của bạn" />
        </p>

        <p>
            <label for="usermail" class="icon-envelope"> E-mail address
                <span class="required">*</span>
            </label>
            <input type="email" name="useremail" id="usermail" placeholder="Nhập vào địa chỉ email" required="required" />
        </p>

        <p>
            <label for="subject" class="icon-bullhorn"> Subject</label>
            <input type="text" name="subject" id="subject" placeholder="What would you like to talk about?" />
        </p>

        <p>
            <label for="message" class="icon-comment"> Message
                <span class="required">*</span>
            </label>
            <textarea name="message" placeholder="Tin nhắn của bạn ở đây và chúng tôi sẽ trả lời sớm nhất có thể" required="required"></textarea>
        </p>
        <p class="indication">Fields with
            <span class="required"> * </span>are required</p>

        <input type="submit" value=" Send this mail ! " />

    </form>
</div>
</body>
</html>

