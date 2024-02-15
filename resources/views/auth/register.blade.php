@extends('layouts.app')

@section('content')
<div class="sf-custom-tabs sf-custom-new aon-logon-sign-area p-3">

    <!--Tabs-->
    <ul class="nav nav-tabs nav-table-cell">
        <li><a data-toggle="tab" href="#Upcoming" class="active">Login</a></li>
        <li><a data-toggle="tab" href="#Past">Sign up</a></li>
    </ul>
    <!--Tabs Content-->
    <div class="tab-content">

        <!--Login Form-->
        <div id="Upcoming" class=" container tab-pane active">
            <div class="sf-tabs-content">
                <form method="POST" action="{{ route('login') }}" class="aon-login-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="aon-inputicon-box">
                                    <input class="form-control sf-form-control" name="email" type="number"
                                        placeholder="phone" required>
                                    <i class="aon-input-icon fa fa-phone"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group d-flex aon-login-option justify-content-between">
                                <div class="aon-login-opleft">
                                    <div class="checkbox sf-radio-checkbox">
                                        <input id="td2_2" name="abc" value="five" type="checkbox">
                                        <label for="td2_2">Keep me logged</label>
                                    </div>
                                </div>
                                <div class="aon-login-opright">
                                    <a href="{route('reset_password') }}">Forgot Password</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="site-button w-100">Login <i class="feather-arrow-right"></i>
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>

        <!--Sign up Form-->
        <div id="Past" class="tab-pane">
            <div class="sf-tabs-content">
                <form method="POST" action="{{ route('register_otp') }}" class="aon-login-form">
                    @csrf

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="aon-inputicon-box">
                                    <input class="form-control sf-form-control" id="phone" name="phone" type="number"
                                        placeholder="Phone" >
                                    <i class="aon-input-icon fa fa-phone"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group sign-term-con">
                                <div class="checkbox sf-radio-checkbox">
                                    <input id="td33" name="abc" value="five" required type="checkbox">
                                    <label for="td33">I've read and agree with your <a href="#">Privacy Policy</a> and
                                        <a href="#">Terms &
                                            Conditions</a> </label>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="site-button w-100">Submit <i class="feather-arrow-right"></i>
                        </button>


                    </div>
                </form>
            </div>
        </div>

    </div>

</div>

@endsection
