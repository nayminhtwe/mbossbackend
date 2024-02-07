@inject('model', '\App\Domains\Auth\Models\User')

@extends('backend.layouts.app')

@section('title', __('Buyer KYC Request Detail'))

@section('content')
<x-backend.card>
    <x-slot name="header">
        @lang('Buyer KYC Request Detail')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link class="card-header-action" :href="route('admin.buyer-kyc.request')" :text="__('Cancel')" />
    </x-slot>

    <x-slot name="body">
        
        <ul class="list-group">

            @foreach ($files as $file)

            <li class="list-group-item">

                <div class=" h5 text-primary">
                    {{$file->name}}
                </div>
                <div class="row" style="padding: 20px">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <img class="img-fluid" src="{{ \Illuminate\Support\Facades\Storage::url($file->file) }}" alt="{{ \Illuminate\Support\Facades\Storage::url($file->file) }}" height="250" width="250" onclick="this.requestFullscreen()">
                        </div>
                    </div>
                </div>

            </li>

            @endforeach

        </ul>
        
    </x-slot>

</x-backend.card>

@endsection

<script>
    $(document).ready(function(){$("img").click(function(){this.requestFullscreen()})});
</script>