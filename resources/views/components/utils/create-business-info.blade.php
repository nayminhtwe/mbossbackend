@props(['href' => '#', 'permission' => false])

<x-utils.link :href="$href" class="btn btn-primary btn-sm" icon="fas fa-plus" :text="__('Business Info')" permission="{{ $permission }}" />
