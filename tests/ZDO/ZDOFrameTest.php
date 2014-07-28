<?php

namespace Munisense\Zigbee\ZDO;


class ZDOFrameTest extends \PHPUnit_Framework_TestCase
  {
  /**
   * This test ensures the default ZDO parameters do not change without notification
   */
  public function testZDODefaults()
    {
    $frame = new ZDOFrame();
    $this->assertEquals("0x00", $frame->displayFrame());
    }

  public function testCommandInclusion()
    {
    $command = new NwkAddrReqCommand();
    $frame = ZDOFrame::construct($command, 0x12);

    $this->assertEquals($command->getClusterId(), $frame->getCommandId());
    $this->assertEquals("0x12 0x00 0x00 0x00 0x00 0x00 0x00 0x00 0x00 0x00", $frame->displayFrame());
    }

  public function testGetPayloadObject()
    {
    $command = new NwkAddrReqCommand();
    $frame = ZDOFrame::construct($command, 0x12);
    $this->assertInstanceOf("Munisense\\Zigbee\\ZDO\\NwkAddrReqCommand", $frame->getPayloadObject());
    }
  }