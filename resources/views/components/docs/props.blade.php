@props(['rows' => []])
{{-- rows: [['prop', 'type', 'default', 'description'], ...] --}}
<div class="overflow-x-auto rounded-xl border border-zinc-200 dark:border-zinc-700 my-5">
    <table class="w-full text-sm">
        <thead>
            <tr class="bg-zinc-50 dark:bg-zinc-800/60 border-b border-zinc-200 dark:border-zinc-700">
                <th class="text-left px-4 py-2.5 font-semibold text-zinc-700 dark:text-zinc-300 text-xs uppercase tracking-wide">Prop</th>
                <th class="text-left px-4 py-2.5 font-semibold text-zinc-700 dark:text-zinc-300 text-xs uppercase tracking-wide">Type</th>
                <th class="text-left px-4 py-2.5 font-semibold text-zinc-700 dark:text-zinc-300 text-xs uppercase tracking-wide">Défaut</th>
                <th class="text-left px-4 py-2.5 font-semibold text-zinc-700 dark:text-zinc-300 text-xs uppercase tracking-wide">Description</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-zinc-100 dark:divide-zinc-800">
            @foreach($rows as $row)
                <tr class="hover:bg-zinc-50 dark:hover:bg-zinc-800/40 transition-colors">
                    <td class="px-4 py-2.5"><code class="text-xs font-mono text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-950/50 px-1.5 py-0.5 rounded">{{ $row[0] }}</code></td>
                    <td class="px-4 py-2.5"><code class="text-xs font-mono text-violet-600 dark:text-violet-400">{{ $row[1] }}</code></td>
                    <td class="px-4 py-2.5"><code class="text-xs font-mono text-zinc-500 dark:text-zinc-400">{{ $row[2] }}</code></td>
                    <td class="px-4 py-2.5 text-zinc-600 dark:text-zinc-400 text-xs">{{ $row[3] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
