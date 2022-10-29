@props(['title', 'total'])

<div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
    <div class="flex items-center">
        <div class="flex-shrink-0">
            <div class="flex items-center gap-2">
                {{ $slot }}
                <h3 class="text-base font-lg text-gray-500">{{ $title }}</h3>
            </div>
            <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">{{ $total }}</span>
        </div>
        <div class="ml-5 w-0 flex items-center justify-end flex-1 text-blue-500 text-base font-bold">
            <a href="" class="hover:underline">View All</a>
        </div>
    </div>
</div>
