@include('partials.header')
<!-- Navigation Bar -->
@php
    $array = ['title' => '🎓Student System'];
@endphp
<x-nav :data="$array" />

<!-- messages component -->
<x-messages />

<header class="max-w-lg mx-auto mt-5">
    <a href="#">
        <h1 class="text-4xl font-bold text-white text-center">Student List</h1>
    </a>
</header>
<section class="mt-10">
    <div class="overflow-x-auto relative">
        <table class="w-96 mx-auto text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="py-3 px-6">

                    </th>
                    <th scope="col" class="py-3 px-6">
                        First Name
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Last Name
                    </th>
                    <th scope="col" class="py-3 px-6">
                        email
                    </th>
                    <th scope="col" class="py-3 px-6">
                        age
                    </th>
                    <th scope="col">

                    </th>
                </tr>
            </thead>

            <tbody>
                @foreach ($students as $student)
                    <tr class="bg-gray-800 border-b text-white">
                        @php $default_profile = "https://api.dicebear.com/7.x/personas/svg/".$student->first_name."-".$student->last_name.".svg" @endphp
                        <td>
                            <!-- Displays student image on index page-->
                            <img
                                src="{{ $student->student_image ? asset('storage/public/student/thumbnail/' . $student->student_image) : $default_profile }}">
                        </td>
                        <td class="py-4 px-6">
                            {{ $student->first_name }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $student->last_name }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $student->email }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $student->age }}
                        </td>
                        <td class="py-4 px-6">
                            <a href="/student/{{ $student->id }}"
                                class="bg-sky-600 text-white 
                            px-4 py-1 rounded">view</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Custom Pagination -->
        <div class="mx-auto max-w-lg pt-6 p-4">
            {{ $students->links('vendor.pagination.custom') }}
        </div>
    </div>
</section>
@include('partials.footer')


{{-- <ul>
    @foreach ($students as $student)
        <li>{{ $student->gender }} {{ $student->gender_count }}</li>
    @endforeach
</ul> --}}
