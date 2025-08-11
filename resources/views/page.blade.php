<!DOCTYPE html>
<html>
<head>
    <title>{{ $page->title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <main>
        @if($page->content)
            @foreach($page->content as $block)
                @include("blocks.{$block['type']}", ['data' => $block['data']])
            @endforeach
        @endif
    </main>
</body>
</html>