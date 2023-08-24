<nav {{ $attributes }}>
    <ul class="flex space-x-4 text-slate-100 p-2 pt-10 pb-5 font-medium">
        <li>
            <a href="/">Home</a>
        </li>


        @foreach ($links as $label => $link)
            <li>→</li>
            <li>
                <a href="{{ $link }}">
                    {{ $label }}
            </a>
            </li>
        @endforeach

      
    </ul>
</nav>