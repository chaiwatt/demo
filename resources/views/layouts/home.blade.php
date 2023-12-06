<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ระบบสารสนเทศเพื่อบริหารจัดการทุนพระกนิษฐาสัมมาชีพ | Top Navigation</title>

    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/adminlte.min.css?v=3.2.0') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font.css?v=1.0') }}">

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="{{route('home')}}" class="navbar-brand">

                    <span class="brand-text font-weight-light">ผู้ใช้: {{Auth::user()->name}}
                        {{Auth::user()->lastname}}</span>
                </a>

                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="btn btn-info ml-2">
                            <i class="fas fa-sign-out-alt mr-1"></i>ออกจากระบบ
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            {{-- Authorized Group --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">

                @yield('content')
            </div>
        </div>
        <footer class="main-footer">
            <div class="float-right d-none d-sm-inline">
                กองทุนเพื่อความเสมอภาคทางการศึกษา | กสศ
            </div>
            @php
            $currentYear = date('Y');
            @endphp
            <strong>Copyright &copy; {{ $currentYear }}-{{ $currentYear + 1 }} <a
                    href="https://adminlte.io">ระบบสารสนเทศเพื่อบริหารจัดการทุนพระกนิษฐาสัมมาชีพ</a></strong>
        </footer>
    </div>
</body>
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>

<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('assets/js/adminlte.min.js?v=3.2.0') }}"></script>

</html>