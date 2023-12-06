@extends('layouts.dashboard')

@section('content')
@include('layouts.partial.dashboard-aside', ['groupUrl' => $groupUrl])
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{$assessment->name}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">{{$assessment->name}}</a></li>
                        <li class="breadcrumb-item active">หัวข้อการประเมิน</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            @if ($permission->show)
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">หัวข้อการประเมิน</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">

                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0" id="table_container">
                            <table class="table table-bordered table-striped dataTable dtr-inline">
                                <thead>
                                    <tr>
                                        <th style="width:250px">เลือก</th>
                                        <th>หัวข้อการประเมิน</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($assessmentItems as $assessmentItem)
                                    <tr>
                                        <td>
                                            <div class="icheck-primary d-inline">
                                                <input name="assessment_item[]" type="checkbox" class="user-checkbox"
                                                    id="checkboxPrimary{{$assessmentItem->id}}"
                                                    value="{{$assessmentItem->id}}">
                                                <label for="checkboxPrimary{{$assessmentItem->id}}"></label>
                                            </div>
                                        </td>
                                        <td>{{$assessmentItem->name}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>


                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn bg-gradient-success btn-flat float-right">บันทึก</button>
                        </div>
                    </div>
                </div>

            </div>
            @endif

        </div>
    </div>
</div>
@push('scripts')

@endpush
@endsection