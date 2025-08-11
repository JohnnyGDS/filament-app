<!-- sidenav  -->
<aside
	class="sticky w-64 shrink-0 ease-nav-brand z-990 inset-y-0 my-4 ml-4 block -translate-x-full flex-wrap items-center justify-between overflow-y-auto rounded-2xl border-0 bg-white p-0 antialiased shadow-none transition-transform duration-200 xl:left-0 xl:translate-x-0 xl:bg-transparent">
	<div class="h-19.5">
		<i class="fas fa-times absolute right-0 top-0 hidden cursor-pointer p-4 text-slate-400 opacity-50 xl:hidden"
			sidenav-close=""></i>
		<a
			class="logo h-19.5 m-0 flex content-center justify-center whitespace-nowrap object-center text-sm text-slate-700"
			href="/">
			<img src="{{ $global_logo_url }}"
				class="max-w-52 ease-nav-brand inline h-full w-full max-w-full object-contain transition-all duration-200" alt="main_logo">
		</a>
	</div>

	<div class="h-sidenav mt-4 mx-4 block max-h-screen w-auto grow basis-full items-center overflow-auto">
		<ul class="mb-0 flex flex-col pl-0">

			@php 
				$pages = \App\Providers\PageServiceProvider::getAllNavigationPages();
			@endphp

			@foreach($pages as $page)
				@include('site.components.sidenavitem', [
					'url' => $page->getURL(),
					'title' => $page->title,
					'selected' => ($global_element_type == 'page' && $page->slug === $item->slug) ? true : false,
					'icon' => $page->icon,
				])
			@endforeach

			{{-- <li class="mt-4 mb-1 w-full">
				<h6 class="pl-4 text-xs font-bold uppercase leading-tight opacity-60">Account pages</h6>
			</li>

			@include('site.components.sidenavitem', [
				'url' => '/logout',
				'title' => 'Microsoft Sign out',
				'icon' => 'fas-door-open',
			]) --}}

		</ul>
	</div>
</aside>
<!-- end sidenav -->
