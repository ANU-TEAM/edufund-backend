<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <main class="h-full overflow-y-auto">
            <div class="container px-6 mx-auto text-center grid">
                <h1 class="text-2xl">{{ $application->title }}</h1>
            </div>
            <div class="container px-6 mx-auto py-3 justify-center flex">
                <img class="text-center" width="300" src="{{ Storage::disk('public')->url($application->image_url) }}" 
                alt="{{ $application->title }}"/>
            </div>
            <div class="container px-6 mx-auto text-center grid">
                <p class="text-justify pt-4">{{ $application->description }}</p>
            </div>
        </main>
    </div>
</x-app-layout>
