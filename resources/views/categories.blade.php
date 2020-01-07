<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Categories</title>
</head>
<body>
<div id="wrapper">
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a href="{{ url('categories') }}">
                    Softlab Case
                </a>
            </li>
            @foreach($categories as $category)
                <li>
                    <!--a href="{{url('categories') . '/' . $category['id'] }}">{{ $category['value'] }}</a-->
                    <a class="categoryItem" href="#{{$category['id']}}" data-id="{{ $category['id'] }}">{{ $category['value'] }}</a>
                </li>
            @endforeach

        </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">

                @if(Request::url() === url('categories'))
                    <div id="notice" class="col-lg-12">
                        <h1>Yağız Yeniay</h1>
                        <p>Hello, <br>
                            This project has been developed in order to accomplish backend developer task. Since there was no clear instructions about design I just put it as the requirements asking in this project.<br>
                            I hope it fulfills the need.
                        </p>
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-12">
                        <div id="venueList" hidden></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>
<script src="{{ url('js/app.min.js') }}"></script>
</body>
</html>
