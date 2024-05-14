@props(['href' => '#', 'text' => __('End Sale'), 'permission' => false])

<x-utils.form-button 
    :action="$href" 
    method="get"
    name=sale-end-item
    button-class="btn btn-danger btn-sm"
    :text="$text" 
    permission="{{ $permission }}"
>
    <i class="fas fa-trash"></i> {{ $text }}
</x-utils.form-button>
