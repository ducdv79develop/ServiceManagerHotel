<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Title of the document</title>
</head>

<body>
	@if($data->type)
		<p>Email Reply Admin test :</p>
		<p>Content : {!! $data->body !!}</p>
	@else 
		<p>Email Reply Admin :</p>
		<p>Content : {!! $data->body !!}</p>
	@endif
</body>

</html>