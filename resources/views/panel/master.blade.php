<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Limonist Task</title>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @stack('extra_style')

</head>
<body>

    @include('panel.layouts.navbar')
    @include('panel.layouts.sidebar')
    <div class="content">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
    <footer>
        2022 "&copy; Limonist Task
    </footer>

    @include('panel.layouts.js')
    @stack('extra_script')
</body>
</html>
