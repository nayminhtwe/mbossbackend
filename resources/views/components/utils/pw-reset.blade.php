@props(['href' => '#', 'permission' => false])

<x-utils.link :href="$href" class="btn btn-primary btn-sm" icon="fas fa-key" :text="__('Reset Password')" permission="{{ $permission }}" />
