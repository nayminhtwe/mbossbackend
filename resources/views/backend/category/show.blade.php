@inject('model', '\App\Domains\Auth\Models\User')

@extends('backend.layouts.app')

@section('title', __('Show Payer'))

@section('content')
<x-backend.card>
    <x-slot name="header">
        @lang('Payer Name') : {{ $category->name }}
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link class="card-header-action" :href="route('admin.category.index')" :text="__('Cancel')" />
    </x-slot>

    <x-slot name="body">
        <div class="row" style="padding: 20px">

            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
        
                    {{-- <h2>{{ $clinic->name }}</h2> --}}
                    @if($category->images != null)
                        {{-- @foreach ($category->images as $image) --}}
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($category->images->image) }}" class="img-fluid"
                            alt="{{ \Illuminate\Support\Facades\Storage::url($category->images->image) }}" height="250" width="250" onclick="this.requestFullscreen()">
                        {{-- @endforeach --}}
                    @endif
        
                </div>
        
            </div>
        
        </div>
    </x-slot>

</x-backend.card>

@endsection

<script>
    $(document).ready(function(){$("img").click(function(){this.requestFullscreen()})});
</script>