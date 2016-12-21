<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>子期 || 在线笔记 || Markdown</title>
    <link href="{{URL::asset('static/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('static/plugins/bootstrap/css/bootstrap-theme.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('static/plugins/markdown/css/mou.css')}}" rel="stylesheet">
    <link href="{{URL::asset('static/plugins/markdown/css/themes/default.css')}}" rel="stylesheet">
</head>
<body>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="page-header">
            <h1>子期笔记
                <small>平时随想,记录点滴生活 -- markdown</small>
            </h1>
        </div>
    </div>
    <div class="row">
        <ul class="nav nav-stacked col-lg-3" role="tablist">
            @foreach ($dir_list as $key => $dir)
                @if(is_array($dir))
                    {{--<li role="presentation"><a href="#">{{$key}}</a></li>--}}
                    {{--<ul class="nav nav-stacked col-lg-3" role="tablist">--}}
                    {{--@foreach ($dir[0] as $di)--}}
                    {{--<li role="presentation"><a href="#">{{$di[0]}}</a></li>--}}
                    {{--@endforeach--}}
                    {{--</ul>--}}
                @else
                    <li role="presentation"><a href="#">{{$dir}}</a></li>
                @endif
            @endforeach
        </ul>
        <div class="col-lg-9 content">
            {!! $content !!}
        </div>
    </div>
</div>
<footer id="footer">
    <div class="container">
        <div class="row footer-wrap">
            <div class="col-md-12 desc">
                <p>
                    <a href="/about"><strong>关于</strong></a>
                    |
                    <a href="/team"><strong>团队</strong></a>
                    |
                    <a target="_blank" href="https://github.com/huwenlong92">
                        <strong>
                            <i class="icon-github-sign"></i> Github
                        </strong>
                    </a>
                </p>
                <p>
                    版权所有 © 2016 子期 授权许可遵循 <a href="http://www.apache.org/licenses/LICENSE-2.0.html">apache 2.0
                        licence</a> By <a target="_blank" href="http://www.henly.me">子期</a> Coding
                </p>

            </div>
        </div>
    </div>
</footer>

<script src="{{URL::asset('static/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('static/plugins/markdown/js/highlight.pack.js')}}"></script>
<script>hljs.initHighlightingOnLoad();</script>
</body>
</html>

