<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title}}</title>
    <link href="{{URL::asset('static/plugins/markdown/css/mou.css')}}" rel="stylesheet">
    <link href="{{URL::asset('static/plugins/markdown/css/themes/default.css')}}" rel="stylesheet">
</head>
<body>
<div>
    {!!$content!!}
</div>
<script src="{{URL::asset('static/plugins/markdown/js/highlight.pack.js')}}"></script>
<script>hljs.initHighlightingOnLoad();</script>
</body>
</html>
