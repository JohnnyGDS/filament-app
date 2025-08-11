<li class="my-1 w-full">
	<a 
		class="group py-2 text-sm ease-nav-brand flex items-center whitespace-nowrap px-4 transition-colors rounded-lg 
		@if (isset($selected) && $selected)
		shadow-soft-xl bg-white font-semibold text-slate-700
		@else
		hover:bg-white
		@endif

		@isset($accordionItems)
		accordion-link
		@endisset
		"

		{!! URLHelper::createLink($url, true) !!}
	>
	<div 
		@if (isset($selected) && $selected)
		class="bg-gradient-to-tl shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-primary text-white bg-center stroke-0 text-center xl:p-2.5"
		@else
		class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5 transition-colors group-hover:bg-secondary group-hover:text-white"
		@endif
	>
	@if (isset($icon) && $icon)
	<x-icon name="{{ $icon }}" />
	@endif
	</div>
	<span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">{{ $title }}</span>
</a>
</li>
