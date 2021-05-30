@extends('layouts.master')

@section('header')
    <title>Tambah Mahasiswa</title>
    <link href="{{asset('admin/dist/css/pages/form-page.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/extra-libs/prism/prism.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="page-wrapper">
    <div class="page-titles">
        <div class="d-flex align-items-center">
            <h5 class="font-medium m-b-0">Form User Mahasiswa</h5>
            <div class="custom-breadcrumb ml-auto">
                <a href="/super_admin/dashboard/data_overview" class="breadcrumb">Dashboard</a>
                <a href="/super_admin/dashboard/students" class="breadcrumb">Pengelolaan Mahasiswa</a>
                <a href="/studentuser/add" class="breadcrumb">Form User Mahasiswa</a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col s12">
                <div class="card">
                    <div class="card-content">
                        <h5 class="card-title activator">Tambah User Mahasiswa</h5>
                        <h6 class="card-subtitle">Harap lengkapi formulir di bawah ini untuk membuat user mahasiswa baru.</h6>
                        <h6 class="card-subtitle">Kata sandi default untuk user student adalah <code>TimeSeries</code>.</h6>
                    </div>
                    {!! Form::open(['url' => '/postregisterstudent','class'=>'h-form b-form striped-lables formValidate','id'=>'formValidate']) !!}
                        <div class="form-body">
                            <div class="divider"></div>
                            <div class="card-content">
                                <h6 class="font-medium">Informasi Pribadi</h6>
                                <div class="row">
                                    <div class="col s3">
                                        <div class="h-form-label">
                                            <label for="f-name1">Nama Depan</label>
                                        </div>
                                    </div>
                                    <div class="input-field col s9">
                                        {!! Form::text('first_name', old('first_name'), ['placeholder'=>'Nama Depan','id'=>'f-name1']) !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s3">
                                        <div class="h-form-label">
                                            <label for="l-name2">Nama Belakang</label>
                                        </div>
                                    </div>
                                    <div class="input-field col s9">
                                        {!! Form::text('last_name', old('last_name'), ['placeholder'=>'Nama Belakang','id'=>'l-name2']) !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s3">
                                        <div class="h-form-label">
                                            <label for="email1">Email</label>
                                        </div>
                                    </div>
                                    <div class="input-field col s9">
                                        {!! Form::email('email','', ['placeholder'=>'Email','id'=>'email']) !!}
                                        @if($errors->has('email'))
                                            <div class="error">{{$errors->first('email')}}</div>
                                            @php $err_reg=1 @endphp
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s3">
                                        <div class="h-form-label">
                                            <label for="con1">Nomor Telepon</label>
                                        </div>
                                    </div>
                                    <div class="input-field col s9">
                                        {!! Form::text('phone', old('phone'), ['placeholder'=>'Nomor Telepon','id'=>'con1']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="divider"></div>
                            <div class="card-content">
                                <h6 class="font-medium">Informasi Mahasiswa</h6>
                                <div class="row">
                                    <div class="col s3">
                                        <div class="h-form-label">
                                            <label for="npm">NPM</label>
                                        </div>
                                    </div>
                                    <div class="input-field col s9">
                                        {!! Form::text('npm', old('npm'), ['placeholder'=>'NPM','id'=>'npm']) !!}
                                        @if($errors->has('npm'))
                                            <div class="error">{{$errors->first('npm')}}</div>
                                            @php $err_reg=1 @endphp
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s3">
                                        <div class="h-form-label">
                                            <label for="gpa">IPK</label>
                                        </div>
                                    </div>
                                    <div class="input-field col s9">
                                        {!! Form::text('gpa', old('gpa'), ['placeholder'=>'IPK','id'=>'gpa']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="card-content">
                            <div class="form-action">
                                <button class="btn cyan waves-effect waves-light submit" type="submit" name="action">Kirim</button>
                                <a class="btn waves-effect waves-light grey darken-4" href="/super_admin/dashboard/students" name="action">Batal
                                </a>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    <script src="{{asset('admin/assets/extra-libs/prism/prism.js')}}"></script>
    <script src="{{asset('admin/dist/js/pages/forms/jquery.validate.min.js')}}"></script>
    <script>
        $(function() {
            $("#formValidate").validate({
                rules: {
                    first_name: {
                        required: true,
                        minlength: 3,
                    },
                    email: {
                        required: true,
                        email: true,
                    },
                    phone: {
                        required: true,
                        minlength: 10,
                        maxlength: 12,
                        number: true,
                    },
                    npm: {
                        required: true,
                        minlength: 12,
                        maxlength: 12,
                        number: true,
                    },
                    gpa: {
                        required: true,
                        min: 1,
                        max: 4,
                    },
                },
                errorElement: 'div',
                errorPlacement: function(error, element) {
                    var placement = $(element).data('error');
                    if (placement) {
                        $(placement).append(error)
                    } else {
                        error.insertAfter(element);
                    }
                },
                invalidHandler: function(e, validator) {
                    var errors = validator.numberOfInvalids();
                    if (errors) {
                        $('.error-alert-bar').show();
                    }
                },
            });
        });
    </script>
@endsection