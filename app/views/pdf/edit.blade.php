<!DOCTYPE html>
<html>
<head>
	<title></title>
	{{HTML::script('assets/ckeditor/ckeditor.js')}}
</head>
<body>
{{Form::open()}}
	{{Form::text('kl_nr', '1234')}}
	{{Form::textarea('template', $template, array('class'=>'ckeditor', 'name'=>'editor1', 'id'=>'edtiro1'))}}
	{{Form::submit('Salvesta', array('name'=>'template_save_form'))}}
{{Form::close()}}
{{Form::open(array('url'=>'wkpdf/mailsend'))}}
	{{Form::submit('Saada')}}
{{Form::close()}}
@include('pdf.template.paevaraha_leping')
</body>
</html>