@props(['href' => '#', 'permission' => false])

<x-utils.link :href="$href" class="btn btn-info btn-sm" icon="fas fa-plus" :text="__('Create Form')" permission="{{ $permission }}" />
