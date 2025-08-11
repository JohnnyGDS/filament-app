<section class="bg-gray-100 py-20">
    <div class="px-4 text-center">
        <h1 class="text-4xl font-bold mb-4">{{ $data['title'] }}</h1>
        @if($data['subtitle'])
            <p class="text-xl mb-8">{{ $data['subtitle'] }}</p>
        @endif
        @if($data['image'])
            <img src="{{ Storage::url($data['image']) }}" alt="{{ $data['title'] }}" class="mx-auto mb-8 rounded-lg">
        @endif
        @if($data['button_text'] && $data['button_url'])
            <a href="{{ $data['button_url'] }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
                {{ $data['button_text'] }}
            </a>
        @endif
    </div>
</section>