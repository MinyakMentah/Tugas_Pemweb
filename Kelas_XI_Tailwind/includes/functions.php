<?php

function initial($name) {
    return strtoupper(substr(trim($name), 0, 1));
}

function avatarColor($name) {
    $colors = ['bg-blue-500', 'bg-purple-500', 'bg-emerald-500', 'bg-amber-500', 'bg-rose-500', 'bg-cyan-500', 'bg-indigo-500'];
    $index = array_sum(array_map('ord', str_split($name))) % count($colors);
    return $colors[$index];
}

function kelasBadge($kelas) {
    $palette = [
        ['bg-blue-50', 'text-blue-700', 'ring-blue-200'],
        ['bg-purple-50', 'text-purple-700', 'ring-purple-200'],
        ['bg-emerald-50', 'text-emerald-700', 'ring-emerald-200'],
        ['bg-amber-50', 'text-amber-700', 'ring-amber-200'],
        ['bg-rose-50', 'text-rose-700', 'ring-rose-200'],
    ];
    $index = array_sum(array_map('ord', str_split($kelas))) % count($palette);
    return $palette[$index];
}
