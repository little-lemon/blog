<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{url('/api/post/store')}}" method="post">
    标题：<input type="text" name="title" /><br><br>
    内容：<textarea name="content" id="" cols="30" rows="10"></textarea>
    <div>
        <!--{{csrf_field()}}-->
        <input type="submit" value="添加" class="btn btn-danger">
        <input type="reset" value="重置" class="btn ">
    </div>
</form>
</body>
</html>