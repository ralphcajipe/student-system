@include('partials.header', [$title])

<!-- Navigation Bar -->
@php
    $array = ['title' => '🎓Student System'];
@endphp
<x-nav :data="$array" />

<header class="max-w-lg mx-auto">
    <a href="#">
        <h1 class="text-4xl font-bold text-white text-center mt-5">Add New Student</h1>
    </a>
</header>
<main class="bg-white max-w-lg mx-auto p-8 my-10 rounded-lg shadow-2xl">
    <section class="mt-10">
        <form action="/add/student/" enctype="multipart/form-data" class="flex flex-col"
            method="POST">
            @csrf
            <!-- First Name -->
            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label for="first_name" class="block text-gray-700 text-sm 
                font-bold mb-2 ml-3">First
                    Name</label>
                <input type="text" name="first_name"
                    class="bg-gray-200 rounded w-full
                text-gray-700 focus:outline-none border-b-4 border-gray-400
                px-3"
                    autocomplete="off" value={{ old('first_name') }}>
                @error('first_name')
                    <p class="text-red-500 text-xs mt-2 p-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <!-- Last Name -->
            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label for="last_name" class="block text-gray-700 text-sm 
                font-bold mb-2 ml-3">Last
                    Name</label>
                <input type="text" name="last_name"
                    class="bg-gray-200 rounded w-full
                text-gray-700 focus:outline-none border-b-4 border-gray-400
                px-3"
                    autocomplete="off" value={{ old('last_name') }}>
                @error('last_name')
                    <p class="text-red-500 text-xs mt-2 p-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <!-- Gender -->
            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label for="gender"
                    class="block text-gray-700 text-sm 
                font-bold mb-2 ml-3">Gender</label>
                <select name="gender"
                    class="bg-gray-200 rounded w-full
                text-gray-700 focus:outline-none border-b-4 border-gray-400
                px-3">
                    <option value="" {{ old('gender') == "" ? 
                    'selected' : '' }}></option>
                    <option value="Male" {{ old('gender') == 'Male' ? 
                    'selected' : '' }}>Male</option>
                    <option value="Female" {{ old('gender') == 'Female' ? 
                    'selected' : '' }}>Female</option>
                </select>
                @error('gender')
                    <p class="text-red-500 text-xs mt-2 p-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <!-- Age -->
            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label for="age"
                    class="block text-gray-700 text-sm 
                font-bold mb-2 ml-3">Age</label>
                <input type="number" name="age"
                    class="bg-gray-200 rounded w-full
                text-gray-700 focus:outline-none border-b-4 border-gray-400
                px-3"
                    value={{ old('age') }}>
                @error('age')
                    <p class="text-red-500 text-xs mt-2 p-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <!-- Email -->
            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label for="email"
                    class="block text-gray-700 text-sm 
                font-bold mb-2 ml-3">Email</label>
                <input type="email" name="email"
                    class="bg-gray-200 rounded w-full
                text-gray-700 focus:outline-none border-b-4 border-gray-400
                px-3"
                    autocomplete="off" value={{ old('email') }}>
                @error('email')
                    <p class="text-red-500 text-xs mt-2 p-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Student Image -->
            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label for="student_image"
                    class="block text-gray-700 text-sm 
                font-bold mb-2 ml-3">Student Image</label>
                <input type="file" name="student_image"
                    class="bg-gray-200 rounded w-full
                text-gray-700 focus:outline-none border-b-4 border-gray-400
                px-3"
                    autocomplete="off" >
                @error('student_image')
                    <p class="text-red-500 text-xs mt-2 p-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <button type="submit"
                class="bg-purple-600 hover:bg-purple-700 text-white 
            font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200"
                type="submit">
                Add New
            </button>
        </form>
    </section>
</main>
@include('partials.footer')
