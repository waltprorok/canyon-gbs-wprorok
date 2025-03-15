@extends('layouts.app')
@section('title', 'Students')

@section('content')
    <div>
        <h3 class="block text font-bold text-gray-500 mb-6">Students</h3>
        <table class="table w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-100 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">Name</th>
                <th scope="col" class="px-6 py-3">Email</th>
                <th scope="col" class="px-6 py-3">Bio</th>
            </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
                <tr class="bg-white border-b border-gray-200" wire:key="{{ $student->id }}">
                    <td class="size-px whitespace-nowrap">
                        <div class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3">
                            <div class="flex items-center gap-x-3">
                                <img class="inline-block size-9 rounded-full" src="{{ $student->image }}" alt="Avatar">
                                <div class="grow">
                                    <span class="block text-sm text-gray-600 dark:text-neutral-600">{{ $student->name }}</span>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">{{ $student->email }}</td>
                    <td class="px-6 py-4">{{ $student->bio }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $students->links('pagination::default') }}
    </div>
@endsection
