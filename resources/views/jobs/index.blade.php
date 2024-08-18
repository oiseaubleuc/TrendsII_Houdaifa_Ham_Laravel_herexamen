<x-layout>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>

    <!-- Success Message and PDF Download Link -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
            @if(session('pdf_link'))
                <a href="{{ session('pdf_link') }}" class="btn btn-primary">Download PDF</a>
            @endif
        </div>
    @endif

    <div class="space-y-4">
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
            <tr>
                <th class="py-2 px-4 border-b">ID</th>
                <th class="py-2 px-4 border-b">Naam</th>
                <th class="py-2 px-4 border-b">Voornaam</th>
                <th class="py-2 px-4 border-b">Username</th>
                <th class="py-2 px-4 border-b">Email</th>
                <th class="py-2 px-4 border-b">Type</th>
                <th class="py-2 px-4 border-b">Beschrijving</th>
                <th class="py-2 px-4 border-b">Bijlage</th>
                <th class="py-2 px-4 border-b">Created At</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($jobs as $job)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $job->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $job->naam }}</td>
                    <td class="py-2 px-4 border-b">{{ $job->voornaam }}</td>
                    <td class="py-2 px-4 border-b">{{ $job->username }}</td>
                    <td class="py-2 px-4 border-b">{{ $job->email }}</td>
                    <td class="py-2 px-4 border-b">{{ $job->type }}</td>
                    <td class="py-2 px-4 border-b">{{ $job->beschrijving }}</td>
                    <td class="py-2 px-4 border-b">
                        @if ($job->bijlage)
                            <a href="{{ asset('storage/' . $job->bijlage) }}" target="_blank">Download</a>
                        @else
                            N/A
                        @endif
                    </td>
                    <td class="py-2 px-4 border-b">{{ $job->created_at->format('Y-m-d') }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="/jobs/{{ $job->id }}" class="text-blue-500 hover:underline">View</a>
{{--                        <a href="/jobs/{{ $job->id }}/edit" class="text-yellow-500 hover:underline ml-2">Edit</a>--}}
{{--                        <form action="/jobs/{{ $job->id }}" method="POST" class="inline-block">--}}
{{--                            @csrf--}}
{{--                            @method('DELETE')--}}
{{--                            <button type="submit" class="text-red-500 hover:underline ml-2">Delete</button>--}}
{{--                        </form>--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
