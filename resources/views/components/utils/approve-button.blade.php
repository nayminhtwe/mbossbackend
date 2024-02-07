@props(['href' => '#', 'text' => __('Finish'), 'permission' => false])

<x-utils.link :href="$href" name=confirm-item class="btn btn-success btn-sm" :text="$text" permission="{{ $permission }}" />
