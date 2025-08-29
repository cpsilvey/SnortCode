<?php
function get_code_max() {
    if (plan_is_free()) {
        $free_code_max = get_field('free_max_codes', 'option');
        return $free_code_max;
    } else if (plan_is_plus()) {
        $plus_code_max = get_field('plus_max_codes', 'option');
        return $plus_code_max;
    } else if (plan_is_premium()) {
        $premium_code_max = get_field('premium_max_codes', 'option');
        return $premium_code_max;
    } else {
        return;
    }

}