{{-- resources/views/marks/show.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jegyek: ') }} {{ $student->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg">{{ __('Jegyek listája: ') }}</h3>
                    <ul>
                        @forelse($marks as $mark)
                            <li>{{ $mark->subject }}: {{ $mark->grade }}</li>
                        @empty
                            <li>{{ __('Nincsenek jegyek a diák számára.') }}</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
