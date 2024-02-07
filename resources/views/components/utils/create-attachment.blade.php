@props(['href' => '#', 'permission' => false])

<x-utils.link :href="$href" class="btn btn-secondary btn-sm" icon="fas fa-plus" :text="__('Attachments')" permission="{{ $permission }}" />
