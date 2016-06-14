<?php

class HTMLPurifier_AttrTransform_BorderTest extends HTMLPurifier_AttrTransformHarness
{

    public function setUp()
    {
        parent::setUp();
        $this->obj = new HTMLPurifier_AttrTransform_Border();
    }

    public function testEmptyInput()
    {
        $this->assertResult( array() );
    }

    public function testBasicTransform()
    {
        $this->assertResult(
            array('border' => '1'),
            array('style1' => 'border:1px solid;')
        );
    }

    public function testLenientTreatmentOfInvalidInput()
    {
        $this->assertResult(
            array('border' => '10%'),
            array('style1' => 'border:10%px solid;')
        );
    }

    public function testPrependNewCSS()
    {
        $this->assertResult(
            array('border' => '23', 'style1' => 'font-weight:bold;'),
            array('style1' => 'border:23px solid;font-weight:bold;')
        );
    }

}

// vim: et sw=4 sts=4
