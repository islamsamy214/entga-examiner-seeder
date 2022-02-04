<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/app.css" rel="stylesheet">
    <title>get and insert some excel shit</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

    </style>
</head>

<body class="w-screen h-screen">

    @if (session('success'))
        <div id="successAlert"
            class="bg-green-100 rounded-lg py-5 px-6 mb-3 text-base text-green-700 inline-flex items-center w-full justify-between"
            role="alert">
            <div class="inline">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle"
                    class="inline w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 512 512">
                    <path fill="currentColor"
                        d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z">
                    </path>
                </svg>
                <div class="inline">
                    {{ session('success') }}
                </div>
            </div>
            <button onclick="getElementById('successAlert').remove()">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </button>
        </div>
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="bg-red-100 rounded-lg py-5 px-6 mb-3 text-base text-red-700 inline-flex items-center w-full"
                role="alert">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle"
                    class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 512 512">
                    <path fill="currentColor"
                        d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z">
                    </path>
                </svg>
                {{ $error }}
            </div>
        @endforeach
    @endif

    <div class="grid grid-cols-3 gap-4 items-stretch  m-20">

        <div class="p-6 rounded-lg shadow-lg bg-white">
            <form action="{{ route('insert-examiners') }}" method="POST" enctype="multipart/form-data"
                class="flex flex-col max-w-sm m-auto">
                {{ csrf_field() }}
                <div class="form-group mb-6">
                    <div class="flex justify-center">
                        <div class="mb-3 w-96">
                            <label for="formFile" class="form-label inline-block mb-2 text-gray-700"> Upload
                                <strong>Examiner</strong>
                                Excel
                                file to insert him</label>
                            <input
                                class="form-control
                                        block
                                        w-full
                                        px-3
                                        py-1.5
                                        text-base
                                        font-normal
                                        text-gray-700
                                        bg-white bg-clip-padding
                                        border border-solid border-gray-300
                                        rounded
                                        transition
                                        ease-in-out
                                        m-0
                                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                type="file" id="formFile" name="excel_file">
                        </div>
                    </div>
                </div>
                <button type="submit"
                    class="
                    px-6
                    py-2.5
                    bg-blue-600
                    text-white
                    font-medium
                    text-xs
                    leading-tight
                    uppercase
                    rounded
                    shadow-md
                    hover:bg-blue-700 hover:shadow-lg
                    focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
                    active:bg-blue-800 active:shadow-lg
                    transition
                    duration-150
                    ease-in-out">Submit</button>
            </form>
        </div>

        <div class="p-6 rounded-lg shadow-lg bg-white">
            <form action="{{ route('insert-answers') }}" method="POST" enctype="multipart/form-data"
                class="flex flex-col max-w-sm m-auto">
                {{ csrf_field() }}
                <div class="form-group mb-6">
                    <div class="flex justify-center">
                        <div class="mb-3 w-96">
                            <label for="formFile" class="form-label inline-block mb-2 text-gray-700"> Upload
                                <strong>answers</strong>
                                Excel
                                file to loop it on all existing examiners</label>
                            <input
                                class="form-control
                                        block
                                        w-full
                                        px-3
                                        py-1.5
                                        text-base
                                        font-normal
                                        text-gray-700
                                        bg-white bg-clip-padding
                                        border border-solid border-gray-300
                                        rounded
                                        transition
                                        ease-in-out
                                        m-0
                                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                type="file" id="formFile" name="excel_file">
                        </div>
                    </div>
                </div>
                <button type="submit"
                    class="
                    px-6
                    py-2.5
                    bg-blue-600
                    text-white
                    font-medium
                    text-xs
                    leading-tight
                    uppercase
                    rounded
                    shadow-md
                    hover:bg-blue-700 hover:shadow-lg
                    focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
                    active:bg-blue-800 active:shadow-lg
                    transition
                    duration-150
                    ease-in-out">Submit</button>
            </form>
        </div>

        <div class="p-6 rounded-lg shadow-lg bg-white">
            <form action="{{ route('insert-results') }}" method="POST" enctype="multipart/form-data"
                class="flex flex-col max-w-sm m-auto">
                {{ csrf_field() }}
                <div class="form-group mb-6">
                    <div class="flex justify-center">
                        <div class="mb-3 w-96">
                            <label for="formFile" class="form-label inline-block mb-2 text-gray-700"> Upload
                                <strong>results</strong>
                                Excel
                                file to loop it on all existing examiners</label>
                            <input
                                class="form-control
                                        block
                                        w-full
                                        px-3
                                        py-1.5
                                        text-base
                                        font-normal
                                        text-gray-700
                                        bg-white bg-clip-padding
                                        border border-solid border-gray-300
                                        rounded
                                        transition
                                        ease-in-out
                                        m-0
                                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                type="file" id="formFile" name="excel_file">
                        </div>
                    </div>
                </div>
                <button type="submit"
                    class="
                    px-6
                    py-2.5
                    bg-blue-600
                    text-white
                    font-medium
                    text-xs
                    leading-tight
                    uppercase
                    rounded
                    shadow-md
                    hover:bg-blue-700 hover:shadow-lg
                    focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
                    active:bg-blue-800 active:shadow-lg
                    transition
                    duration-150
                    ease-in-out">Submit</button>
            </form>
        </div>

        <div class="p-6 rounded-lg shadow-lg bg-white">
            <form action="{{ route('get-examiner') }}" method="GET" enctype="multipart/form-data"
                class="flex flex-col max-w-sm m-auto">
                {{ csrf_field() }}
                <div class="form-group mb-6">
                    <div class="flex justify-center">
                        <div class="mb-3 w-96">
                            <label for="formFile" class="form-label inline-block mb-2 text-gray-700"> get
                                <strong>Examiner</strong>
                                Excel file</label>
                            <input placeholder="write the examiner name"
                                class="form-control
                                        block
                                        w-full
                                        px-3
                                        py-1.5
                                        text-base
                                        font-normal
                                        text-gray-700
                                        bg-white bg-clip-padding
                                        border border-solid border-gray-300
                                        rounded
                                        transition
                                        ease-in-out
                                        m-0
                                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                type="text" name="ex_name">
                        </div>
                    </div>
                </div>
                <button type="submit"
                    class="
                    px-6
                    py-2.5
                    bg-blue-600
                    text-white
                    font-medium
                    text-xs
                    leading-tight
                    uppercase
                    rounded
                    shadow-md
                    hover:bg-blue-700 hover:shadow-lg
                    focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
                    active:bg-blue-800 active:shadow-lg
                    transition
                    duration-150
                    ease-in-out">Download</button>
            </form>
        </div>

        <div class="p-6 rounded-lg shadow-lg bg-white">
            <form action="{{ route('get-answers') }}" method="GET" enctype="multipart/form-data"
                class="flex flex-col max-w-sm m-auto">
                {{ csrf_field() }}
                <div class="form-group mb-6">
                    <div class="flex justify-center">
                        <div class="mb-3 w-96">
                            <label for="formFile" class="form-label inline-block mb-2 text-gray-700"> get
                                <strong>Examiner answers</strong>
                                Excel file</label>
                            <input placeholder="write the examiner name"
                                class="form-control
                                        block
                                        w-full
                                        px-3
                                        py-1.5
                                        text-base
                                        font-normal
                                        text-gray-700
                                        bg-white bg-clip-padding
                                        border border-solid border-gray-300
                                        rounded
                                        transition
                                        ease-in-out
                                        m-0
                                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                type="text" name="ex_name">
                        </div>
                    </div>
                </div>
                <button type="submit"
                    class="
                    px-6
                    py-2.5
                    bg-blue-600
                    text-white
                    font-medium
                    text-xs
                    leading-tight
                    uppercase
                    rounded
                    shadow-md
                    hover:bg-blue-700 hover:shadow-lg
                    focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
                    active:bg-blue-800 active:shadow-lg
                    transition
                    duration-150
                    ease-in-out">Download</button>
            </form>
        </div>

        <div class="p-6 rounded-lg shadow-lg bg-white">
            <form action="{{ route('get-results') }}" method="GET" enctype="multipart/form-data"
                class="flex flex-col max-w-sm m-auto">
                {{ csrf_field() }}
                <div class="form-group mb-6">
                    <div class="flex justify-center">
                        <div class="mb-3 w-96">
                            <label for="formFile" class="form-label inline-block mb-2 text-gray-700"> get
                                <strong>Examiner results</strong>
                                Excel file</label>
                            <input placeholder="write the examiner name"
                                class="form-control
                                        block
                                        w-full
                                        px-3
                                        py-1.5
                                        text-base
                                        font-normal
                                        text-gray-700
                                        bg-white bg-clip-padding
                                        border border-solid border-gray-300
                                        rounded
                                        transition
                                        ease-in-out
                                        m-0
                                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                type="text" name="ex_name">
                        </div>
                    </div>
                </div>
                <button type="submit"
                    class="
                    px-6
                    py-2.5
                    bg-blue-600
                    text-white
                    font-medium
                    text-xs
                    leading-tight
                    uppercase
                    rounded
                    shadow-md
                    hover:bg-blue-700 hover:shadow-lg
                    focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
                    active:bg-blue-800 active:shadow-lg
                    transition
                    duration-150
                    ease-in-out">Download</button>
            </form>
        </div>

    </div>
</body>

</html>
