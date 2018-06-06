<?php

namespace Tests\Unit;

use App\Http\Controllers\AdretailController;

class AdretailTest extends AdretailController
{
    /**
     * Jobs array test
     *
     * @return void
     */
    public function testGetJobsArray()
    {
        $table = [
            'a =>
            b => c
            c => f
            d => a
            e => b
            f =>',

            'abc',

            '===>
            b => c
            c => f
            d => a
            e => b
            f =>',

            '===>
            b =>
            c => f
            f =>'
            ];

        foreach ($table as $item) {
            $this->getJobsArray($item);
        }
    }
}
