<section class="py-16" style="background-color: {{ $data['background_color'] ?? '#f3f4f6' }}">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-4">{{ $data['heading'] }}</h2>
        @if($data['description'])
            <p class="text-lg mb-8">{{ $data['description'] }}</p>
        @endif
        <a href="{{ $data['button_url'] }}" class="bg-blue-600 text-white px-8 py-4 rounded-lg hover:bg-blue-700 inline-block">
            {{ $data['button_text'] }}
        </a>
    </div>
</section>