<div class="h-[75vh] my-16">
    <div class="flex flex-col gap-8 items-center justify-center h-full">
        <div>
            <svg
                width="0"
                height="0"
            >
                <defs>
                    <clipPath
                        id="privateBlobClip"
                        clipPathUnits="objectBoundingBox"
                    >
                        <path
                            d="M0.865 0.321C0.939 0.452 1 0.596 0.971 0.734C0.943 0.872 0.825 0.995 0.683 1C0.54 0.999 0.389 0.89 0.26 0.812C0.132 0.734 0.026 0.688 0 0.555C-0.026 0.423 0.045 0.216 0.139 0.1C0.233 -0.015 0.349 -0.042 0.495 0.018C0.641 0.078 0.792 0.189 0.865 0.321Z"
                        />
                    </clipPath>
                </defs>
            </svg>
            <div class="flex items-center justify-center relative">
                <img
                    src="{{ asset('images/private.jpg') }}"
                    alt="Private Profile"
                    class="private-blob-mask rounded-full"
                >
            </div>
        </div>

        <div class="text-center">
            <h2 class="text-2xl font-semibold mb-4">Sorry, this creator's profile is private.</h2>
            <p class="text-gray-600">
                You will not be able to view their recipes or details unless you are a friend or they have made
                their profile public.
            </p>
        </div>

        <div>
            <a
                href="{{ route('home') }}"
                class="btn btn-primary"
            >
                Go Back
            </a>
        </div>
    </div>
</div>
