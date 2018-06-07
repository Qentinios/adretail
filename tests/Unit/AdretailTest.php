<?php

namespace Tests\Unit;

use App\Http\Controllers\AdretailController;
use App\Service\AdretailService;
use Tests\TestCase;

class AdretailTest extends TestCase
{
    /**
     * Jobs array test
     *
     * @return void
     */
    public function testGetJobsArray()
    {
        $adretailService = new AdretailService();
        $adretail = new AdretailController($adretailService);

        $table = [
            'a =>
            b => c
            c => f
            d => a
            e => b
            f =>',

            'abc',

            '===>
            b ==> c
            c => f
            d => a
            e => b
            f =>',

            '
            b =>
            c =>f
            f =>'
            ];

        $expectations = [
            [
                'a' => '',
                'b' => 'c',
                'c' => 'f',
                'd' => 'a',
                'e' => 'b',
                'f' => ''
            ],
            null,
            [
                'c' => 'f',
                'd' => 'a',
                'e' => 'b',
                'f' => ''
            ],
            [
                'b' => '',
                'c' => 'f',
                'f' => ''
            ]
        ];

        foreach ($table as $key=>$item) {
            $result = $this->invokeMethod($adretail, 'getJobsArray', array($item));

            $this->assertEquals($result, $expectations[$key]);
        }
    }
}
