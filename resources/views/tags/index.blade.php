<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tags') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('tags.create') }}">Add new tag</a>
                    <br /><br />
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($tags as $tag)
                            <tr>
                                <td>{{ $tag->name }}</td>
                                <td>
                                    <a href="{{ route('tags.edit', $tag) }}">Edit</a>
                                    <form method="POST" action="{{ route('tags.destroy', $tag) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>