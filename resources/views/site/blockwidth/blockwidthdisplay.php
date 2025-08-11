@php
    $blockWidth = $block->input('block_width');
    //
    if (!in_array($blockWidth, array_column($global_blocksizes, 'value'))) {
        $blockWidth = 'col-span-12';
    }
@endphp
col-span-12 md:{{ $blockWidth }}