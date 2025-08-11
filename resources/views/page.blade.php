<!DOCTYPE html>
<html>
@include('site.functional.head')
<body class="flex bg-slate-50 font-sans text-base font-normal text-slate-500 antialiased">
    @include('site.layouts.sidenav')
    <main class="h-full flex-grow max-h-screen rounded-xl transition-all duration-200 p-8 overflow-auto">
        @if($page->content)
            <div class="grid grid-cols-12 gap-6">
                @foreach($page->content as $block)
                    @php
                        $widthClass = $block['data']['width'] ?? 'col-span-12';
                    @endphp
                    <div class="{{ $widthClass }} bg-white rounded-2xl p-8">
                        {{-- Include the block view based on its type --}}
                        @include("site.blocks.{$block['type']}", ['data' => $block['data']])
                    </div>
                @endforeach
            </div>
        @endif
    </main>
</body>
</html>