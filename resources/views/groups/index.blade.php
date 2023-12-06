@extends('layouts.dashboard')

@section('content')
@include('layouts.partial.dashboard-aside')
<div class="content-wrapper">
    @include($group->dashboard)
</div>
@endsection