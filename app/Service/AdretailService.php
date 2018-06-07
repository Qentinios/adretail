<?php

namespace App\Service;

class AdretailService
{
    /**
     * Inserts a new value before the key in the array.
     *
     * The key to insert before.
     *  @param $key
     * An array to insert in to.
     *  @param array $array
     * An value to insert.
     *  @param $new_value
     * The new array if the key exists, FALSE otherwise.
     *  @return array|false
     */
    public function arrayInsertBefore($key, array $array, $new_value) {
        if (array_key_exists($key, $array)) {
            $i = 0;
            $new = array();
            foreach ($array as $k => $value) {
                if ($k === $key) {
                    $new[$i] = $new_value;
                    $i++;
                }
                $new[$i] = $value;

                $i++;
            }
            return $new;
        }
        return false;
    }

    /**
     * Get string from array
     * @param $jobs
     * @return string
     */
    public function arrayToString($jobs){
        return implode(' ', $jobs);
    }
}