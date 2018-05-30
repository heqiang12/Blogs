<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"D:\wamp\www\Blogs\public/../application/admin\view\admin\file.html";i:1514363096;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="_JS_/jquery.js"></script>
	<script>
	$(function(){
		$("#shang").click(function(){
			// alert();
			var formdata=$("#chuan").val();
			console.log(formdata);
			$.ajax({
				type:"post",
				url:"<?php echo url('Admin/ajaxfile'); ?>",
				data:{"image":formdata},
				datatype:"json",
				success:function(data){
					alert(data);
					$("body").html("<image src="+data+">");
				}
			})
		});
	})
		
	</script>
</head>
<body>
	<form action="" method="post" id="myform">
		<input type="file" id="chuan" name="file">
		<input type="button" value="上传" id="shang">
	</form>
	
</body>
</html>