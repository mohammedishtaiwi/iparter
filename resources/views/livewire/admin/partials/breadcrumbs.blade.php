@if (count($breadcrumbs))
<div class="px-4 mx-left sm:px-4 lg:px-2 mb-6">
    <nav class="flex justify-center" aria-label="Breadcrumb">
        <ol role="list" class="flex items-center ">
            @foreach ($breadcrumbs as $breadcrumb)
            @if ($breadcrumb->url && !$loop->last)
            <li>
                <div class="flex items-center">
                    @if (count($breadcrumbs) != 1 && !$loop->first
                     )
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                            clip-rule="evenodd"></path>
                    </svg>
                    @endif
                    <a href="{{ $breadcrumb->url }}" wire:navigate
                        class="text-sm font-medium text-gray-500 hover:text-gray-900">{{
                        $breadcrumb->title }}</a>
                </div>
            </li>
            @else
            <li>
                <div class="flex items-center">
                    @if (count($breadcrumbs) != 1 )
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                            clip-rule="evenodd"></path>
                    </svg>
                    @endif
                    <span class="text-sm font-medium text-blue-500" aria-current="page">{{
                        $breadcrumb->title }}</span>
                </div>
            </li>
            @endif
            @endforeach
        </ol>
    </nav>
</div>
@endif