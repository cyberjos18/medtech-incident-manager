<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- jQuery -->
    {!! Html::script('/js/jquery-3.0.0.min.js') !!}
    <!-- Bootstrap Core JavaScript -->
    {!! Html::script('/js/bootstrap.min.js') !!}
    <!-- Metis Menu Plugin JavaScript -->
    {!! Html::script('/dashboard/vendor/metisMenu/metisMenu.min.js') !!}
    <!-- Morris Charts JavaScript -->
    {!! Html::script('/dashboard/vendor/raphael/raphael.min.js') !!}
    {!! Html::script('/dashboard/vendor/morrisjs/morris.min.js') !!}
    {!! Html::script('/dashboard/data/morris-data.js') !!}
    <!-- Custom Theme JavaScript -->
    {!! Html::script('/dashboard/dist/js/sb-admin-2.js') !!}
    {!! Html::script('/dashboard/data/dashboard.js') !!}
    <!-- Bootstrap Core CSS -->
    {!! Html::style('/css/bootstrap.css') !!}
    <!-- MetisMenu CSS -->
    {!! Html::style('/dashboard/vendor/metisMenu/metisMenu.min.css') !!}
    <!-- Custom CSS -->
    {!! Html::style('/dashboard/dist/css/sb-admin-2.css') !!}
    <!-- Morris Charts CSS -->
    {!! Html::style('/dashboard/vendor/morrisjs/morris.css') !!}
    <!-- Custom Fonts -->
    {!! Html::style('/dashboard/vendor/font-awesome/css/font-awesome.min.css') !!}

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    {{--<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->--}}
    {{--<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->--}}
    {{--<!--[if lt IE 9]>--}}
        {{--<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>--}}
        {{--<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>--}}
    {{--<![endif]-->--}}

</head>

<body>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="inicio.blade.php">SB Admin v2.0</a>
            </div>
            <!-- /.navbar-header -->

            <div id="menusuperior">
                @include('dashboard.pages.menu.menusuperior')
            </div>
            <div id="menulateral">
                @include('dashboard.pages.menu.menulaterial')
            </div>
        </nav>

        <div id="page-wrapper">
            </br>
            <div id="iframe">
                @include('dashboard.pages.content.iframe')
            </div>

            <div id="tarjetas">
                @include('dashboard.pages.utilities.tarjetas')
            </div>

            <div class="col-lg-8">
                <div id="chartarea">
                    @include('dashboard.pages.charts.chartarea')
                </div>
                <div id="chartbarra">
                    @include('dashboard.pages.charts.chartbarra')
                </div>
                <div id="timeline">
                    @include('dashboard.pages.utilities.timeline')
                </div>

                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">

                    <div id="notificacionpanel">
                        @include('dashboard.pages.utilities.notificacionpanel')
                    </div>

                    <div id="chartdonut">
                        @include('dashboard.pages.charts.chartdonut')
                    </div>
                    <div id="chat">
                        @include('dashboard.pages.utilities.chat')
                    </div>

            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>

    <!-- /#wrapper -->

</body>

</html>
