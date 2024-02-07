@inject('model', '\App\Domains\Auth\Models\User')

@extends('backend.layouts.app')

@section('title', __('Seller KYC Request Detail'))

@section('content')
<x-backend.card>
    <x-slot name="header">
        @lang('Seller KYC Request Detail')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link class="card-header-action" :href="route('admin.seller.request')" :text="__('Cancel')" />
    </x-slot>

    <x-slot name="body">

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    @foreach ($files as $file)
                        <div class="h4" style="text-decoration: underline;margin-top: 20px;margin-bottom: 20px">
                            {{$file->name}}
                        </div>
                        <img src="{{ \Illuminate\Support\Facades\Storage::url($file->file) }}" alt="{{ \Illuminate\Support\Facades\Storage::url($file->file) }}" class="img" height="250" width="250" onclick="this.requestFullscreen()">
                    @endforeach
                </div>
            </div>
        </div>

        @if (count($seller_company_extract_file_request))
            <div class="row">
                <div class="col-lg-12 margin-tb" style="padding: 20px">
                    <div class="pull-left">
                        <div class="h4" style="text-decoration: underline;">
                            Company Extract File
                        </div>
                        @foreach ($seller_company_extract_file_request as $file)
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($file->file) }}" alt="{{ \Illuminate\Support\Facades\Storage::url($file->file) }}" class="img" height="250" width="250" onclick="this.requestFullscreen()">
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        @if (count($seller_business_license_file_request))
            <div class="row">
                <div class="col-lg-12 margin-tb" style="padding: 20px">
                    <div class="pull-left">
                        <div class="h4" style="text-decoration: underline;">
                            Business License File
                        </div>
                        @foreach ($seller_business_license_file_request as $file)
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($file->file) }}" alt="{{ \Illuminate\Support\Facades\Storage::url($file->file) }}" class="img" height="250" width="250" onclick="this.requestFullscreen()">
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        @if (count($seller_bod_resolution_file_request))
            <div class="row">
                <div class="col-lg-12 margin-tb" style="padding: 20px">
                    <div class="pull-left">
                        <div class="h4" style="text-decoration: underline;">
                            BOD Resolution File
                        </div>
                        @foreach ($seller_bod_resolution_file_request as $file)
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($file->file) }}" alt="{{ \Illuminate\Support\Facades\Storage::url($file->file) }}" class="img" height="250" width="250" onclick="this.requestFullscreen()">
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        @if (count($seller_import_export_license_file_request))
            <div class="row">
                <div class="col-lg-12 margin-tb" style="padding: 20px">
                    <div class="pull-left">
                        <div class="h4" style="text-decoration: underline;">
                            Import Export License File
                        </div>
                        @foreach ($seller_import_export_license_file_request as $file)
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($file->file) }}" alt="{{ \Illuminate\Support\Facades\Storage::url($file->file) }}" class="img" height="250" width="250" onclick="this.requestFullscreen()">
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
        
    </x-slot>

</x-backend.card>

@endsection

<script>
    $(document).ready(function(){$("img").click(function(){this.requestFullscreen()})});
</script>