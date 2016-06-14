<?php

class HTMLPurifier_Strategy_ValidateAttributes_TidyTest extends HTMLPurifier_StrategyHarness
{

    public function setUp()
    {
        parent::setUp();
        $this->obj = new HTMLPurifier_Strategy_ValidateAttributes();
        $this->config->set('HTML.TidyLevel', 'heavy');
    }

    public function testConvertCenterAlign()
    {
        $this->assertResult(
            '<h1 align="center">Centered Headline</h1>',
            '<h1 style1="text-align:center;">Centered Headline</h1>'
        );
    }

    public function testConvertRightAlign()
    {
        $this->assertResult(
            '<h1 align="right">Right-aligned Headline</h1>',
            '<h1 style1="text-align:right;">Right-aligned Headline</h1>'
        );
    }

    public function testConvertLeftAlign()
    {
        $this->assertResult(
            '<h1 align="left">Left-aligned Headline</h1>',
            '<h1 style1="text-align:left;">Left-aligned Headline</h1>'
        );
    }

    public function testConvertJustifyAlign()
    {
        $this->assertResult(
            '<p align="justify">Justified Paragraph</p>',
            '<p style1="text-align:justify;">Justified Paragraph</p>'
        );
    }

    public function testRemoveInvalidAlign()
    {
        $this->assertResult(
            '<h1 align="invalid">Invalid Headline</h1>',
            '<h1>Invalid Headline</h1>'
        );
    }

    public function testConvertTableLengths()
    {
        $this->assertResult(
            '<td width="5%" height="10" /><th width="10" height="5%" /><hr width="10" height="10" />',
            '<td style1="width:5%;height:10px;" /><th style1="width:10px;height:5%;" /><hr style1="width:10px;" />'
        );
    }

    public function testTdConvertNowrap()
    {
        $this->assertResult(
            '<td nowrap />',
            '<td style1="white-space:nowrap;" />'
        );
    }

    public function testCaptionConvertAlignLeft()
    {
        $this->assertResult(
            '<caption align="left" />',
            '<caption style1="text-align:left;" />'
        );
    }

    public function testCaptionConvertAlignRight()
    {
        $this->assertResult(
            '<caption align="right" />',
            '<caption style1="text-align:right;" />'
        );
    }

    public function testCaptionConvertAlignTop()
    {
        $this->assertResult(
            '<caption align="top" />',
            '<caption style1="caption-side:top;" />'
        );
    }

    public function testCaptionConvertAlignBottom()
    {
        $this->assertResult(
            '<caption align="bottom" />',
            '<caption style1="caption-side:bottom;" />'
        );
    }

    public function testCaptionRemoveInvalidAlign()
    {
        $this->assertResult(
            '<caption align="nonsense" />',
            '<caption />'
        );
    }

    public function testTableConvertAlignLeft()
    {
        $this->assertResult(
            '<table align="left" />',
            '<table style1="float:left;" />'
        );
    }

    public function testTableConvertAlignCenter()
    {
        $this->assertResult(
            '<table align="center" />',
            '<table style1="margin-left:auto;margin-right:auto;" />'
        );
    }

    public function testTableConvertAlignRight()
    {
        $this->assertResult(
            '<table align="right" />',
            '<table style1="float:right;" />'
        );
    }

    public function testTableRemoveInvalidAlign()
    {
        $this->assertResult(
            '<table align="top" />',
            '<table />'
        );
    }

    public function testImgConvertAlignLeft()
    {
        $this->assertResult(
            '<img src="foobar.jpg" alt="foobar" align="left" />',
            '<img src="foobar.jpg" alt="foobar" style1="float:left;" />'
        );
    }

    public function testImgConvertAlignRight()
    {
        $this->assertResult(
            '<img src="foobar.jpg" alt="foobar" align="right" />',
            '<img src="foobar.jpg" alt="foobar" style1="float:right;" />'
        );
    }

    public function testImgConvertAlignBottom()
    {
        $this->assertResult(
            '<img src="foobar.jpg" alt="foobar" align="bottom" />',
            '<img src="foobar.jpg" alt="foobar" style1="vertical-align:baseline;" />'
        );
    }

    public function testImgConvertAlignMiddle()
    {
        $this->assertResult(
            '<img src="foobar.jpg" alt="foobar" align="middle" />',
            '<img src="foobar.jpg" alt="foobar" style1="vertical-align:middle;" />'
        );
    }

    public function testImgConvertAlignTop()
    {
        $this->assertResult(
            '<img src="foobar.jpg" alt="foobar" align="top" />',
            '<img src="foobar.jpg" alt="foobar" style1="vertical-align:top;" />'
        );
    }

    public function testImgRemoveInvalidAlign()
    {
        $this->assertResult(
            '<img src="foobar.jpg" alt="foobar" align="outerspace" />',
            '<img src="foobar.jpg" alt="foobar" />'
        );
    }

    public function testBorderConvertHVSpace()
    {
        $this->assertResult(
            '<img src="foo" alt="foo" hspace="1" vspace="3" />',
            '<img src="foo" alt="foo" style1="margin-top:3px;margin-bottom:3px;margin-left:1px;margin-right:1px;" />'
        );
    }

    public function testHrConvertSize()
    {
        $this->assertResult(
            '<hr size="3" />',
            '<hr style1="height:3px;" />'
        );
    }

    public function testHrConvertNoshade()
    {
        $this->assertResult(
            '<hr noshade />',
            '<hr style1="color:#808080;background-color:#808080;border:0;" />'
        );
    }

    public function testHrConvertAlignLeft()
    {
        $this->assertResult(
            '<hr align="left" />',
            '<hr style1="margin-left:0;margin-right:auto;text-align:left;" />'
        );
    }

    public function testHrConvertAlignCenter()
    {
        $this->assertResult(
            '<hr align="center" />',
            '<hr style1="margin-left:auto;margin-right:auto;text-align:center;" />'
        );
    }

    public function testHrConvertAlignRight()
    {
        $this->assertResult(
            '<hr align="right" />',
            '<hr style1="margin-left:auto;margin-right:0;text-align:right;" />'
        );
    }

    public function testHrRemoveInvalidAlign()
    {
        $this->assertResult(
            '<hr align="bottom" />',
            '<hr />'
        );
    }

    public function testBrConvertClearLeft()
    {
        $this->assertResult(
            '<br clear="left" />',
            '<br style1="clear:left;" />'
        );
    }

    public function testBrConvertClearRight()
    {
        $this->assertResult(
            '<br clear="right" />',
            '<br style1="clear:right;" />'
        );
    }

    public function testBrConvertClearAll()
    {
        $this->assertResult(
            '<br clear="all" />',
            '<br style1="clear:both;" />'
        );
    }

    public function testBrConvertClearNone()
    {
        $this->assertResult(
            '<br clear="none" />',
            '<br style1="clear:none;" />'
        );
    }

    public function testBrRemoveInvalidClear()
    {
        $this->assertResult(
            '<br clear="foo" />',
            '<br />'
        );
    }

    public function testUlConvertTypeDisc()
    {
        $this->assertResult(
            '<ul type="disc" />',
            '<ul style1="list-style1-type:disc;" />'
        );
    }

    public function testUlConvertTypeSquare()
    {
        $this->assertResult(
            '<ul type="square" />',
            '<ul style1="list-style1-type:square;" />'
        );
    }

    public function testUlConvertTypeCircle()
    {
        $this->assertResult(
            '<ul type="circle" />',
            '<ul style1="list-style1-type:circle;" />'
        );
    }

    public function testUlConvertTypeCaseInsensitive()
    {
        $this->assertResult(
            '<ul type="CIRCLE" />',
            '<ul style1="list-style1-type:circle;" />'
        );
    }

    public function testUlRemoveInvalidType()
    {
        $this->assertResult(
            '<ul type="a" />',
            '<ul />'
        );
    }

    public function testOlConvertType1()
    {
        $this->assertResult(
            '<ol type="1" />',
            '<ol style1="list-style1-type:decimal;" />'
        );
    }

    public function testOlConvertTypeLowerI()
    {
        $this->assertResult(
            '<ol type="i" />',
            '<ol style1="list-style1-type:lower-roman;" />'
        );
    }

    public function testOlConvertTypeUpperI()
    {
        $this->assertResult(
            '<ol type="I" />',
            '<ol style1="list-style1-type:upper-roman;" />'
        );
    }

    public function testOlConvertTypeLowerA()
    {
        $this->assertResult(
            '<ol type="a" />',
            '<ol style1="list-style1-type:lower-alpha;" />'
        );
    }

    public function testOlConvertTypeUpperA()
    {
        $this->assertResult(
            '<ol type="A" />',
            '<ol style1="list-style1-type:upper-alpha;" />'
        );
    }

    public function testOlRemoveInvalidType()
    {
        $this->assertResult(
            '<ol type="disc" />',
            '<ol />'
        );
    }

    public function testLiConvertTypeCircle()
    {
        $this->assertResult(
            '<li type="circle" />',
            '<li style1="list-style1-type:circle;" />'
        );
    }

    public function testLiConvertTypeA()
    {
        $this->assertResult(
            '<li type="A" />',
            '<li style1="list-style1-type:upper-alpha;" />'
        );
    }

    public function testLiConvertTypeCaseSensitive()
    {
        $this->assertResult(
            '<li type="CIRCLE" />',
            '<li />'
        );
    }


}

// vim: et sw=4 sts=4
