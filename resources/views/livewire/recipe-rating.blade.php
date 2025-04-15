<div class="flex flex-col gap-1">
    @if ($canRate)
        <div
            class="rating rating-sm"
            title="Click to rate this recipe"
        >
            <input
                type="radio"
                name="rating"
                class="mask mask-star"
                aria-label="1 star"
                value="1"
                wire:model.lazy="rating"
            />
            <input
                type="radio"
                name="rating"
                class="mask mask-star"
                aria-label="2 star"
                value="2"
                wire:model.lazy="rating"
            />
            <input
                type="radio"
                name="rating"
                class="mask mask-star"
                aria-label="3 star"
                value="3"
                wire:model.lazy="rating"
            />
            <input
                type="radio"
                name="rating"
                class="mask mask-star"
                aria-label="4 star"
                value="4"
                wire:model.lazy="rating"
            />
            <input
                type="radio"
                name="rating"
                class="mask mask-star"
                aria-label="5 star"
                value="5"
                wire:model.lazy="rating"
            />
        </div>
    @else
        <a
            href="{{ route('login') }}"
            class="rating rating-sm"
            title="Login to rate this recipe"
            aria-label="Login to rate this recipe"
        >
            <div
                class="mask mask-star"
                aria-label="1 star"
                aria-current="{{ $averageRating >= 1 && $averageRating < 2 ? 'true' : 'false' }}"
            ></div>
            <div
                class="mask mask-star"
                aria-label="2 star"
                aria-current="{{ $averageRating >= 2 && $averageRating < 3 ? 'true' : 'false' }}"
            ></div>
            <div
                class="mask mask-star"
                aria-label="3 star"
                aria-current="{{ $averageRating >= 3 && $averageRating < 4 ? 'true' : 'false' }}"
            ></div>
            <div
                class="mask mask-star"
                aria-label="4 star"
                aria-current="{{ $averageRating >= 4 && $averageRating < 5 ? 'true' : 'false' }}"
            ></div>
            <div
                class="mask mask-star"
                aria-label="5 star"
                aria-current="{{ $averageRating >= 5 ? 'true' : 'false' }}"
            ></div>
        </a>
    @endif
    <span class="text-sm">
        <strong>({{ number_format($averageRating, 1) }})</strong>
        <span>{{ $totalRatings }} ratings | {{ $totalSaves }} saves</span>
    </span>
</div>
