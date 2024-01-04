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
                <label for="student_image" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Student Image</label>
                <label for="student_image" class="cursor-pointer">
                    <div id="image-preview" class="max-w-sm p-6 mb-4 bg-gray-100 border-dashed border-2 border-gray-400 rounded-lg items-center mx-auto text-center">
                        <input id="student_image" type="file" class="hidden" accept="image/*" name="student_image" onchange="loadFile(event)" />
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-700 mx-auto mb-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                        </svg>
                        <h5 class="mb-2 text-sm font-bold tracking-tight text-gray-700">Upload Image</h5>
                        <img id="output" class="max-h-48 rounded-lg mx-auto" alt="" />
                    </div>
                </label>
                <!-- Student Image's Error Handler -->
                @error('student_image')
                    <p id="error-message" class="text-red-500 text-sm mt-2 p-1">
                        {{ $message }}
                    </p>
                @enderror

                <script>
                    window.onload = function() {
                        const errorMessage = document.getElementById('error-message');
                        if (errorMessage) {
                            errorMessage.scrollIntoView({ behavior: 'smooth' });
                        }
                    }
                </script>
            </div>

            <script>
                var loadFile = function(event) {
                    var output = document.getElementById('output');
                    output.src = URL.createObjectURL(event.target.files[0]);
                    output.onload = function() {
                        URL.revokeObjectURL(output.src) // free memory
                    }
                };
            </script>

            <button type="submit"
                class="bg-blue-500 hover:bg-blue-400 text-white 
            font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200"
                type="submit">
                Add New
            </button>
        </form>
    </section>
</main>
@include('partials.footer')
