<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div class="text-right">
        <h1>{{ \Illuminate\Support\Facades\Auth::user()->name }}</h1>
    </div>

    <div class="mt-8 text-2xl text-center">

        @if(\Illuminate\Support\Facades\Session::has('success'))
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800">
                {{ \Illuminate\Support\Facades\Session::get('success') }}
            </div>
        @endif
        @php
            $names = \App\Models\Namebord::where('userID',\Illuminate\Support\Facades\Auth::user()->id)->orderByDesc('id')->get();
        @endphp
        <form action="/name" method="post">
            @csrf
            <input class="bg-blue-500 hover:bg-blue-700 text-white  py-2 px-4 rounded text-sm" type="submit" value="ارسال" name="submit">
            &nbsp;
            <input class="text-center" placeholder="ادخل الاسم" type="text" name="name">
        </form>
    </div>
    <div style="text-align: center">
<br>
<br>

        <div class="container flex justify-center mx-auto">
            <div class="flex flex-col">
                <div class="w-full">
                    <div class="border-b border-gray-200 shadow">
                        <table class="divide-y divide-gray-300 ">
                            <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Delete
                                </th>

                                <th class="px-6 py-2 text-xs text-gray-500">
                                    created at
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Name
                                </th>

                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-300">
                            @foreach($names as $name)
                                <tr class="whitespace-nowrap">
                                    <td class="px-6 py-4">
                                        <a href="/delete/{{ $name->id }}" class="px-4 py-1 text-sm text-red-400 bg-red-200 rounded-full">Delete</a>
                                    </td>


                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $name->created_at }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">
                                            {{ $name->name }}
                                        </div>
                                    </td>


                                </tr>



{{--                                    <a href="/delete/{{ $name->id }}" class="bg-red-500 hover:bg-red-700 text-white  py-2 px-4 rounded text-sm">حذف</a>--}}

                            @endforeach



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>




    </div>

</div>


