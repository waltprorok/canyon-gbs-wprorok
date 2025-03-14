@extends('layouts.app')
@section('title', 'Students')

@section('content')
    <div>
        <h3 class="block text font-bold text-black mb-6">Students</h3>

        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-100 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">Photo</th>
                <th scope="col" class="px-6 py-3">Name</th>
                <th scope="col" class="px-6 py-3">Email</th>
                <th scope="col" class="px-6 py-3">Bio</th>
{{--                <th scope="col" class="px-6 py-3">Action</th>--}}
            </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
                <tr class="bg-white border-b border-gray-200">
                    <td class="px-6 py-4">Need Img</td>
                    <td class="px-6 py-4">{{ $student->name }}</td>
                    <td class="px-6 py-4">{{ $student->email }}</td>
                    <td class="px-6 py-4">{{ $student->bio }}</td>
{{--                    <td class="px-6 py-4">--}}
{{--                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>--}}
{{--                    </td>--}}
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
