@php
$spacing = match($data['size']) {
    'small' => 'py-2',
    'medium' => 'py-8', 
    'large' => 'py-16',
    default => 'py-8'
};
@endphp
<div class="{{ $spacing }}"></div>