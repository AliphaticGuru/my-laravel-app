<x-layout>
    <x-slot:heading>
        Job Page
    </x-slot:heading>

    <ul>
        @foreach ($jobs as $job)
            {{-- <h2 class="font-bold text-lg">{{$job['title']}}</h2> --}}
            <li>
                <a href="/jobs/{{ $job['id'] }}" class="text-blue-500 hover:underline">
                    <strong>{{ $job['title'] }}:</strong> Pays {{ $job['salary'] }} per year.
                </a>
            </li>
        @endforeach
    </ul>
    
    {{-- <P>
        This job pays {{ $job['salary'] }} per year.
    </P> --}}
</x-layout>