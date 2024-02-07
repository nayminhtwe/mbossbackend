@props(['href' => '#', 'text' => __('Default'), 'permission' => false])

<x-utils.link :href="$href" name=confirm-item class="btn btn-success btn-sm" :text="$text" permission="{{ $permission }}" />
