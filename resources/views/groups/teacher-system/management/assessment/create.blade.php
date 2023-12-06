@extends('layouts.dashboard')

@section('content')
@include('layouts.partial.dashboard-aside', ['groupUrl' => $groupUrl])
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">เพิ่มการประเมิน</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a
                                href="{{route('groups.officer-system.budget.allowance')}}">การประเมิน</a></li>
                        <li class="breadcrumb-item active">เพิ่มการประเมิน</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            @if ($permission->show)
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">รายละเอียด</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>รายการประเมิน<span class="small text-danger">*</span></label>
                                        <select name="month"
                                            class="form-control select2 @error('month') is-invalid @enderror"
                                            style="width: 100%;">
                                            <option value="">==เลือกรายการประเมิน==</option>
                                            @foreach ($assessments as $assessment)
                                            <option value="{{ $assessment->id }}">
                                                {{ $assessment->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <label for="">เลือกนักเรียน</label>
                                        <table class="table table-bordered table-striped dataTable dtr-inline">
                                            <thead>
                                                <tr>
                                                    <th style="width:250px">เลือก</th>
                                                    <th>ชื่อ-สกุล</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $user)
                                                <tr>
                                                    <td>
                                                        <div class="icheck-primary d-inline">
                                                            <input name="user[]" type="checkbox" class="user-checkbox"
                                                                id="checkboxPrimary{{$user->id}}" value="{{$user->id}}">
                                                            <label for="checkboxPrimary{{$user->id}}"></label>
                                                        </div>
                                                    </td>
                                                    <td>{{$user->prefix->name}} {{$user->name}} {{$user->lastname}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit"
                                            class="btn bg-gradient-success btn-flat float-right">บันทึก</button>
                                    </div>
                                </div>
                            </form>
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