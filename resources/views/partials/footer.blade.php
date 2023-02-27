<div class="flex justify-center mt-4 sm:items-center sm:justify-center">
    <div class="ml-4 text-center text-sm text-gray-500 sm:text-center sm:ml-0">
        @ {{ date('Y') }} {{ config('app.author') }}, {{ config('app.author_email') }}
    </div>
</div>
@include('common.script')