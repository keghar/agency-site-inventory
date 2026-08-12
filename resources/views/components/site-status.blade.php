
    <span @class([
        'inline-flex items-center rounded-full px-2.5 py-1 text-xs font-medium',

        'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400' => $status === 'active',

        'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400' => $status === 'inactive',

        'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400' => $status === 'pending',
    ])>
        {{ ucfirst($status) }}
    </span>

