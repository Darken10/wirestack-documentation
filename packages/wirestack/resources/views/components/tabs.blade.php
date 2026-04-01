@php
    $firstTab = !empty($tabs) ? array_key_first($tabs) : 'tab-0';
@endphp
<div
    x-data="{ activeTab: '{{ $firstTab }}' }"
    {{ $attributes }}>

    {{-- Tab list --}}
    <div class="{{ $tabListClasses() }}" role="tablist">
        @if(!empty($tabs))
            @foreach($tabs as $id => $label)
                <button
                    type="button"
                    role="tab"
                    :aria-selected="activeTab === '{{ $id }}'"
                    x-on:click="activeTab = '{{ $id }}'"
                    class="transition-colors font-medium focus:outline-none {{ $tabSizeClass() }}"
                    :class="activeTab === '{{ $id }}' ? '{{ $activeTabClass() }}' : '{{ $inactiveTabClass() }}'">
                    {{ $label }}
                </button>
            @endforeach
        @else
            {{ $tabList ?? '' }}
        @endif
    </div>

    {{-- Tab panels --}}
    <div class="mt-4">
        {{ $slot }}
    </div>
</div>
