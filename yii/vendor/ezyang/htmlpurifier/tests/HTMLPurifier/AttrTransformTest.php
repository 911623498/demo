<?php

Mock::generatePartial(
        'HTMLPurifier_AttrTransform',
        'HTMLPurifier_AttrTransformTestable',
        array('transform'));

class HTMLPurifier_AttrTransformTest extends HTMLPurifier_Harness
{

    public function test_prependCSS()
    {
        $t = new HTMLPurifier_AttrTransformTestable();

        $attr = array();
        $t->prependCSS($attr, 'style1:new;');
        $this->assertIdentical(array('style1' => 'style1:new;'), $attr);

        $attr = array('style1' => 'style1:original;');
        $t->prependCSS($attr, 'style1:new;');
        $this->assertIdentical(array('style1' => 'style1:new;style1:original;'), $attr);

        $attr = array('style1' => 'style1:original;', 'misc' => 'un-related');
        $t->prependCSS($attr, 'style1:new;');
        $this->assertIdentical(array('style1' => 'style1:new;style1:original;', 'misc' => 'un-related'), $attr);

    }

    public function test_confiscateAttr()
    {
        $t = new HTMLPurifier_AttrTransformTestable();

        $attr = array('flavor' => 'sweet');
        $this->assertIdentical('sweet', $t->confiscateAttr($attr, 'flavor'));
        $this->assertIdentical(array(), $attr);

        $attr = array('flavor' => 'sweet');
        $this->assertIdentical(null, $t->confiscateAttr($attr, 'color'));
        $this->assertIdentical(array('flavor' => 'sweet'), $attr);

    }

}

// vim: et sw=4 sts=4
