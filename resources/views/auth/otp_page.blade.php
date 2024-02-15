@extends('layouts.app')

@section('content')




<div id="Upcoming" class=" container tab-pane active">
    <div class="sf-tabs-content">
        <form method="POST" action="{{  route('verify.register.otp')  }}" class="aon-login-form">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="aon-inputicon-box">
                            <input class="form-control sf-form-control" name="otp" type="number" placeholder="One Time Password"
                                required>
                            <i class="aon-input-icon fa fa-number"></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <button type="submit" class="site-button w-100">Submit <i class="feather-arrow-right"></i>
                    </button>
                </div>

            </div>
        </form>
    </div>
</div>




@endsection
