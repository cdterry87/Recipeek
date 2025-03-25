<div class="max-w-6xl mx-auto p-6">
    <div class="flex flex-row gap-4 justify-between items-center mb-6">
        <h1 class="text-2xl sm:text-3xl font-bold">Following</h1>
    </div>

    <x-user-filters :results-count="$users->count()" />

    @if ($users && $users->isNotEmpty())
        <x-user-grid :users="$users" />
    @else
        <x-user-empty />
    @endif
</div>
