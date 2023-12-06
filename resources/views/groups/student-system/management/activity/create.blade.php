@extends('layouts.dashboard')

@section('content')
@include('layouts.partial.dashboard-aside', ['groupUrl' => $groupUrl])
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">บันทึกกิจกรรม</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a
                                href="{{route('groups.officer-system.budget.allowance')}}">รายการค่าใช้จ่าย</a></li>
                        <li class="breadcrumb-item active">บันทึกกิจกรรม</li>
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
                                        <div class="form-group">
                                            <label>กิจกรรม<span class="small text-danger">*</span></label>
                                            <select name="month"
                                                class="form-control select2 @error('month') is-invalid @enderror"
                                                style="width: 100%;">
                                                <option value="">==เลือกกิจกรรม==</option>
                                                @foreach ($activities as $activity)
                                                <option value="{{ $activity->id }}">
                                                    {{ $activity->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="employee-code">รายละเอียดกิจกรรม</label>
                                                <textarea class="form-control" id="employee-code" rows="10"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
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