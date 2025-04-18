@props(['title' => 'No Users Found.', 'subtitle' => 'Try adjusting your filters or search criteria.'])

<div
    class="text-center text-gray-600 mt-8 h-[40vh] flex items-center justify-center my-16"
    id="no-users"
>
    <div class="flex flex-col gap-6 p-12 bg-gray-200 border border-gray-300">
        <h3 class="font-bold text-2xl sm:text-3xl">
            {{ $title }}
        </h3>
        <p class="text-sm sm:text-base text-gray-400 font-[Jost]">
            {{ $subtitle }}
        </p>
    </div>

</div>
