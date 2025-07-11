<x-layout>
    <x-slot:heading>
        Job Page
    </x-slot:heading>

    <div class="space-y-4">
        @foreach ($jobs as $job)
            {{-- <h2 class="font-bold text-lg">{{$job['title']}}</h2> --}}
                <a href="/jobs/{{ $job['id'] }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
                    <div class="font-bold text-blue-500 text-sm">{{ $job->employer->name }}</div>
                    <div>
                        <strong>{{ $job['title'] }}:</strong> Pays ${{ $job['salary'] }} USD per year.
                    </div>
                </a>
        @endforeach
    </div>
    
    <div>
        {{ $jobs->links() }}
    </div>
    {{-- <P>
        This job pays {{ $job['salary'] }} per year.
    </P> --}}
</x-layout>