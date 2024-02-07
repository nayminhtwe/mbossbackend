@inject('model', '\App\Domains\Auth\Models\User')

@extends('backend.layouts.app')

@section('title', __('Password Reset'))

@section('content')

<x-forms.post :action="route('admin.resetpassword', $app_user)" method="POST">
    <x-backend.card>
        <x-slot name="header">
            @lang('Reset Password for User ID -> ')<mark><strong>{{$app_user->id}}</strong></mark>
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.appuser.index')" :text="__('Cancel')" />
        </x-slot>

        <x-slot name="body">
            <div x-data="{userType : '{{ $model::TYPE_ADMIN }}'}">

                <input type="hidden" value="{{ $app_user->id }}" name="app_user_id">

                <div class="form-group row">
                    <label for="firstName" class="col-md-2 col-form-label">@lang('Name')</label>

                    <div class="col-md-10">
                        <input type="text" name="firstName" class="form-control" value="{{ old('firstName') ?? $app_user->firstName }}" readonly />
                    </div>
                </div>
                <!--form-group-->

                <div class="form-group row">
                    <label for="password" class="col-md-2 col-form-label">@lang('Please Type New Password:')</label>

                    <div class="col-md-10">
                        <input type="password" name="password" class="form-control" placeholder="{{ __('New Password') }}" maxlength="100" required />
                    </div>
                </div>
                <!--form-group-->

            </div>
        </x-slot>

        <x-slot name="footer">
            <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Submit')</button>
        </x-slot>
    </x-backend.card>
</x-forms.post>
@endsection

{{-- @extends('backend.layouts.app')

@section('content')

<div class="row" style="padding: 20px">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Password Reset Form</h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-primary" href="{{ route('doctor.index') }}"> Back</a>

        </div>

    </div>

</div>

@if ($errors->any())

<div class="alert alert-danger">

    <strong>Whoops!</strong> There were some problems with your input.<br><br>

    <ul>

        @foreach ($errors->all() as $error)

        <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif



<form action="{{ url('resetpassword') }}" method="POST">

    @csrf

    <div class="row" style="padding: 20px">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Application User Name:</strong>

                {{ $app_user->firstName }}

            </div>

        </div>

        <input type="hidden" value="{{ $app_user->id }}" name="app_user_id">

        <div class="col-xs-12 text-center">

            <div class="form-group">

                <strong>Please Type New Password:</strong>

                <input type="password" class="form-control" name="password" placeholder="Password" required
                    minlength="5">

            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </div>


    </div>



</form>

@endsection --}}