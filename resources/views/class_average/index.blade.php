<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Osztályok Átlaga 2025') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-bold">Osztályok Átlaga</h2>
                    </div>

                    @php
                        $classAverages = [];

                        foreach ($marks as $mark) {
                            if ($mark->student && $mark->student->class && $mark->student->class->year == '2025') {
                                $classId = $mark->student->class->id;
                                $className = $mark->student->class->name;

                                if (!isset($classAverages[$classId])) {
                                    $classAverages[$classId] = [
                                        'name' => $className,
                                        'total' => 0,
                                        'count' => 0
                                    ];
                                }

                                $classAverages[$classId]['total'] += $mark->mark;
                                $classAverages[$classId]['count'] += 1;
                            }
                        }
                    @endphp

                    @if(empty($classAverages))
                        <p class="text-gray-500">Nincs elérhető adat az osztályokhoz.</p>
                    @else
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Osztály</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Átlag</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach($classAverages as $class)
                                    <tr>
                                        <td class="px-4 py-2 text-sm text-gray-900">{{ $class['name'] }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-900">{{ number_format($class['total'] / $class['count'], 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>