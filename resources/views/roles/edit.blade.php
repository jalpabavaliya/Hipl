<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
<link rel="icon" type="image/png" href="/assets/img/favicon.png">
<title>Material Dashboard 2 by Creative Tim</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="/assets/css/nucleo-icons.css" rel="stylesheet" />
<link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
<link rel="stylesheet" href="/assets/css/toastr.min.css">
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
<link id="pagestyle" href="/assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
<script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
<link href="/assets/css/cdn.datatables.net_1.10.16_css_jquery.dataTables.min.css?time()'" rel="stylesheet">
<link href="/assets/css/cdn.datatables.net_1.10.19_css_dataTables.bootstrap4.min.css?time()'" rel="stylesheet">
<script src="/assets/js/ajax.googleapis.com_ajax_libs_jquery_1.9.1_jquery.js?time()'"></script>
<script src="/assets/js/cdnjs.cloudflare.com_ajax_libs_jquery-validate_1.19.0_jquery.validate.js?time()'"></script>
<script src="/assets/js/cdn.datatables.net_1.10.16_js_jquery.dataTables.min.js?time()'"></script>
<script src="/assets/js/stackpath.bootstrapcdn.com_bootstrap_4.1.3_js_bootstrap.min.js?time()'"></script>
<script src="/assets/js/cdn.datatables.net_1.10.19_js_dataTables.bootstrap4.min.js?time()'"></script>
<script src="/assets/js/material-dashboard.min.js?v=3.1.0"></script>
@include('layouts.headerSub')
<div class="row bg-light vh-100">
    @include('layouts.sidebar')
    <div class="col-xxl-10">
        <div class="w3-panel w3-card card ">
            <div id="white">
                @if (count($errors) > 0)
                <div class="alert alert-primary">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Permission:</strong>
                            <br />
                            @foreach($permission as $value)
                            <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                {{ $value->name }}</label>
                            <br />
                            @endforeach
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
<script src="/assets/js/core/popper.min.js"></script>
<script src="/assets/js/plugins/chartjs.min.js"></script>
<script src="/assets/js/core/bootstrap.min.js"></script>
