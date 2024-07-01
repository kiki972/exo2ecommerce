@props(['align' => 'right', 'width' => '48', 'contentClasses' => 'py-1 bg-white'])

@php
    switch ($align) {
        case 'left':
            $alignmentClasses = 'ltr:origin-top-left rtl:origin-top-right start-0';
            break;
        case 'top':
            $alignmentClasses = 'origin-top';
            break;
        case 'right':
        default:
            $alignmentClasses = 'ltr:origin-top-right rtl:origin-top-left end-0';
            break;
    }

    switch ($width) {
        case '48':
            $width = 'w-48';
            break;
    }
@endphp

<div class="relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
    <div @click="open = ! open">
        {{ $trigger }}
    </div>

    <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
        class="absolute z-50 mt-2 {{ $width }} rounded-md shadow-lg {{ $alignmentClasses }}"
        style="display: none;" @click="open = false">
        <div class="rounded-md ring-1 ring-black ring-opacity-5 {{ $contentClasses }}">
            {{ $content_drop }}
            {{-- <x-dropdown-link :href="route('profile.edit')">
                {{ __('Profile') }}
            </x-dropdown-link>

            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link :href="route('logout')"
                    onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-dropdown-link>
            </form>
 --}}
        </div>
    </div>
</div>

<x-dropdown align="left" width="48" contentClasses="py-1 bg-white">
    <x-slot name="trigger">
        <button class="px-4 py-2">Cliquez ici</button>
    </x-slot>

    <x-dropdown-link href="/profile">Profil</x-dropdown-link>
    <x-dropdown-link href="/settings">Paramètres</x-dropdown-link>
    <x-dropdown-link href="/logout">Déconnexion</x-dropdown-link>
</x-dropdown>


{{-- <x-dropdown align="right" width="48" contentClasses="py-1 bg-white">
    <x-slot name="trigger">
        <!-- Trigger element (button, link, etc.) -->
        <button>Toggle Dropdown</button>
    </x-slot>

    <!-- Dropdown content -->
    <ul>
        <li>Item 1</li>
        <li>Item 2</li>
        <li>Item 3</li>
    </ul>
</x-dropdown> --}}
