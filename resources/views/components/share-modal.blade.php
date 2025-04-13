@props(['recipe'])

<dialog
    id="share__modal"
    class="modal"
>
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="text-lg font-bold">Share this Recipe!</h3>
        <p class="text-sm">Share this recipe with your friends and family using one of the links below.</p>
        <div class="py-4 flex flex-wrap gap-2">
            <!-- Facebook -->
            <a
                href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                target="_blank"
                rel="noopener"
                class="hover:underline text-blue-600"
                alt="Share on Facebook"
                title="Share on Facebook"
            >
                <x-icons.facebook />
            </a>

            <!-- Twitter / X -->
            <a
                href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($recipe->title . ' on ' . config('app.name')) }}"
                target="_blank"
                rel="noopener"
                class="hover:underline text-black"
                alt="Share on Twitter / X"
                title="Share on Twitter / X"
            >
                <x-icons.twitter-x />
            </a>

            <!-- Pinterest -->
            <a
                href="https://pinterest.com/pin/create/button/?url={{ urlencode(request()->fullUrl()) }}&description={{ urlencode($recipe->title . ' on ' . config('app.name')) }}"
                target="_blank"
                rel="noopener"
                class="hover:underline text-red-500"
                alt="Share on Pinterest"
                title="Share on Pinterest"
            >
                <x-icons.pinterest />
            </a>

            <!-- WhatsApp -->
            <a
                href="https://api.whatsapp.com/send?text={{ urlencode($recipe->title . ' on ' . config('app.name') . ' ' . request()->fullUrl()) }}"
                target="_blank"
                class="hover:underline text-green-500"
                rel="noopener"
                alt="Share on WhatsApp"
                title="Share on WhatsApp"
            >
                <x-icons.whatsapp />
            </a>

            <!-- Email -->
            <a
                href="mailto:?subject={{ urlencode($recipe->title . ' on ' . config('app.name')) }}&body={{ urlencode(request()->fullUrl()) }}"
                class="hover:underline text-gray-500"
                alt="Share via Email"
                title="Share via Email"
            >
                <x-icons.email />
            </a>
        </div>
    </div>
    <form
        method="dialog"
        class="modal-backdrop"
    >
        <button>close</button>
    </form>
</dialog>
