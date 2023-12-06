<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{url('/')}}" class="brand-link">
        <span class="brand-text font-weight-light">ทุนพระกนิษฐาสัมมาชีพ</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}} {{Auth::user()->lastname}}</a>
            </div>
        </div>
        @include('layouts.partial.dashboard-sidebar', ['groupUrl' => $groupUrl])
    </div>
</aside>