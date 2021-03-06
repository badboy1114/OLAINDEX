<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="keywords" content="OLAINDEX,OneDrive,Index,Microsoft OneDrive,Directory Index"/>
    <meta name="description" content="OLAINDEX,Another OneDrive Directory Index"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @section('css')
        @include('default.layouts.css')
    @show
    <style>
        * {
            outline-style: none
        }

        .item-list .list-group-item {
            border: 0;
        }
    </style>
    <script>
        App = {
            'routes': {},
            '_token': '{{ csrf_token() }}',
        }
    </script>
</head>

<body>
<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">{{ setting('name','OLAINDEX') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
                aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                @section('navbar')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}"><i class="ri-home-fill"></i> 首页</a>
                    </li>
                @show
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-3">
    @if ($errors->any())
        <div class="alert alert-dismissible alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    @if (session()->has('alertMessage'))
        <div class="alert alert-dismissible alert-{{ session()->pull('alertType')}}">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <p>{{ session()->pull('alertMessage') }}</p>
        </div>
    @endif
    @yield('content')
    <footer id="footer">
        <div class="row text-center">
            <div class="col-lg-12">
                <p class="text-muted">
                    {!! \App\Helpers\Tool::markdown2Html(setting('copyright','Designed
                    by [IMWNK](https://imwnk.cn/) | Powered by [OLAINDEX](https://git.io/OLAINDEX)'),true) !!}.
                </p>
            </div>
        </div>
    </footer>
</div>
@section('js')
    @include('default.layouts.js')
@show
{!! setting('statistics') !!}
<script>
    $(function() {
        $('[data-fancybox="image-list"]').fancybox({
            type: 'image',
            thumbs: {
                autoStart: true,
                axis: 'x',
            },
            buttons: [
                'zoom',
                'slideShow',
                'fullScreen',
                'download',
                'thumbs',
                'close',
            ],
        })
        let clipboard = new ClipboardJS('.clipboard')
        clipboard.on('success', function(e) {
            console.info('Action:', e.action)
            console.info('Text:', e.text)
            console.info('Trigger:', e.trigger)
            e.clearSelection()
        })
        clipboard.on('error', function(e) {
            console.error('Action:', e.action)
            console.error('Trigger:', e.trigger)
        })
        $('[data-toggle="tooltip"]').tooltip({
            title: '已复制',
            trigger: 'click',
        })
        $('img.lazy').lazyload()
    })
</script>
</body>

</html>
