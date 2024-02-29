
<x-app-layout>


    <x-slot name="header" class='pb-2'>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                    <br>
                    <br>
                    <br>
                    <a style='border: 2px solid white; padding: 10px 6px; margin: 10px auto;' class='text-white btn-sm' href="{{route('all.posts')}}">See All Posts</a>
                </div>
            </div>
        </div>
    </div>




</x-app-layout>
