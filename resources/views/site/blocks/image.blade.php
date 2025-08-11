<section class="py-8">
    <div class="mx-auto px-4">
        <div class="text-center">
            <img src="{{ Storage::url($data['image']) }}" alt="{{ $data['alt'] ?? '' }}" class="mx-auto rounded-lg">
            @if($data['caption'])
                <p class="text-gray-600 mt-2 italic">{{ $data['caption'] }}</p>
            @endif
        </div>
    </div>
</section>