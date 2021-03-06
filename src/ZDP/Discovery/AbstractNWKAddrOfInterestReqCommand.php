<?php

namespace Munisense\Zigbee\ZDP\Discovery;
use Munisense\Zigbee\AbstractFrame;
use Munisense\Zigbee\Buffer;
use Munisense\Zigbee\Exception\ZigbeeException;
use Munisense\Zigbee\ZDP\IZDPCommandFrame;

/**
 * Class AbstractNWKAddrOfInterestReqCommand
 *
 * @package Munisense\Zigbee\ZDP\Discovery
 *
 * Since a lot of ZDP Commands start with or only have the nwk_addr_of_interest, here's a basis to work from.
 */
abstract class AbstractNWKAddrOfInterestReqCommand extends AbstractFrame implements IZDPCommandFrame
  {
  private $nwk_address_of_interest;

  public function setFrame($frame)
    {
    $this->setNwkAddressOfInterest(Buffer::unpackInt16u($frame));
    }

  public function getFrame()
    {
    $frame = "";
    Buffer::packInt16u($frame, $this->getNwkAddressOfInterest());
    return $frame;
    }

  public function setNwkAddressOfInterest($nwk_address)
    {
    if($nwk_address >= 0x0000 && $nwk_address <= 0xffff)
      $this->nwk_address_of_interest = $nwk_address;
    else
      throw new ZigbeeException("Nwk Address not in range 0x0000 - 0xffff: ".sprintf("0x%04x", $nwk_address));
    }

  public function getNwkAddressOfInterest()
    {
    return $this->nwk_address_of_interest;
    }

  public function displayNwkAddressOfInterest()
    {
    return sprintf("0x%04x", $this->getNwkAddressOfInterest());
    }

  public function __toString()
    {
    $output = __CLASS__." (length: ".strlen($this->getFrame()).")".PHP_EOL;
    $output .= "|- NwkAddr    : ".$this->displayNwkAddressOfInterest().PHP_EOL;

    return $output;
    }
  }

