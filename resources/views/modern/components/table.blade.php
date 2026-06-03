<div
    class="bg-white rounded-3xl border border-zinc-200 shadow-sm overflow-hidden">

    {{-- HEADER --}}
    <div
        class="flex items-center justify-between px-6 py-5 border-b border-zinc-200">

        <div>

            <h2 class="text-xl font-bold text-zinc-800">
                {{ $title }}
            </h2>

            <p class="text-sm text-zinc-500 mt-1">
                {{ $description }}
            </p>

        </div>

        @if(isset($button))

            <button
                class="px-4 py-2 rounded-xl bg-zinc-900 text-white text-sm hover:bg-zinc-800 transition">

                {{ $button }}

            </button>

        @endif

    </div>

    {{-- TABLE --}}
    <div class="overflow-x-auto">

        <table class="w-full">

            {{ $slot }}

        </table>

    </div>

</div>