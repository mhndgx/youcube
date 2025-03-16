<?php

if (!function_exists('formatViews')) {
    function formatViews($number)
    {
        if ($number >= 1_000_000_000) {
            return round($number / 1_000_000_000, 1) . 'B';
        } elseif ($number >= 1_000_000) {
            return round($number / 1_000_000, 1) . 'M';
        } elseif ($number >= 1_000) {
            return round($number / 1_000, 1) . 'K';
        }
        return $number;
    }
}