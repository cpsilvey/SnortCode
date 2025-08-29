<?php
function get_code_max() {
    if (plan_is_free()) {
        $max = '10';
        return $max;
    } else if (plan_is_plus()) {
        $max = '50';
        return $max;
    } else if (plan_is_premium()) {
        $max = '250';
        return $max;
    } else {
        return;
    }

}