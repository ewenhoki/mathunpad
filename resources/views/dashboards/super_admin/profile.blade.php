@extends('layouts.master')

@section('header')
    <title>Math Unpad - Profile</title>
@endsection

@section('content')
<div class="page-wrapper">
    <div class="page-titles">
        <div class="d-flex align-items-center">
            <h5 class="font-medium m-b-0">Profile</h5>
            <div class="custom-breadcrumb ml-auto">
                <a href="#!" class="breadcrumb">Dashboard</a>
                <a href="#!" class="breadcrumb">Profile</a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col s4">
                <div class="card">
                    <img class="responsive-img" src="{{ asset('admin/assets/images/big/socialbg.jpg')}}" height="456" alt="Card image">
                    <div class="card-img-overlay white-text social-profile d-flex justify-content-center">
                        <div class="align-self-center">
                            <img src="{{ asset('admin/img/profile-default.png')}}" class="circle" width="100">
                            <h4 class="card-title white-text">{{ auth()->user()->name }}</h4>
                            <h6 class="card-subtitle">{{ auth()->user()->role }}</h6>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <small>Email address </small>
                        <h6>{{ auth()->user()->email }}</h6>
                        <small>Phone Number </small>
                        <h6>{{ auth()->user()->phone }}</h6>
                        <small>Name </small>
                        <h6>{{ auth()->user()->name }}</h6>
                    </div>
                </div>
            </div>
            <div class="col s8">
                <div class="card">
                    <div class="row">
                        <div class="col s12">
                            <ul class="tabs">
                                <li class="tab col s3"><a class="active" href="#settings">Settings</a></li>
                            </ul>
                        </div> 
                        <div id="settings" class="col s12">
                            <div class="card-content">
                                {!! Form::open(['url' => '/postadminprofile','class'=>'formValidate','id'=>'formValidate']) !!}                 
                                    <div class="row">
                                        <div class="input-field col s12">
                                            {!! Form::text('name', auth()->user()->name, ['placeholder'=>'Name']) !!}
                                            <label for="name">Name</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            {!! Form::text('phone', auth()->user()->phone, ['placeholder'=>'Phone']) !!}
                                            <label for="phone">Phone Number</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            {!! Form::password('password',['placeholder'=>'New Password']) !!}
                                            <label for="password">Change Password</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <button class="btn teal waves-effect waves-light" type="submit" name="action">Update Profile</button>
                                        </div>
                                    </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Container fluid scss in scafholding.scss -->
    <!-- ============================================================== -->
</div>
@endsection

@section('footer')
    <script src="{{asset('admin/dist/js/pages/forms/jquery.validate.min.js')}}"></script>
    <script>
        $(function() {
            $("#formValidate").validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 3,
                    },
                    phone: {
                        required: true,
                        minlength: 10,
                        maxlength: 12,
                        number: true,
                    },
                    password: {
                        minlength: 8,
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