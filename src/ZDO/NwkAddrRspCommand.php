<?php

namespace Munisense\Zigbee\ZDO;

/**
 * Class NwkAddrRspCommand
 * @package Munisense\Zigbee\ZDO
 */
class NwkAddrRspCommand extends AbstractAddrRspCommand
  {
  /**
   * Returns the Cluster ID of this frame
   * @return int
   */
  public function getClusterId()
    {
    return Command::COMMAND_NWK_ADDR_RSP;
    }
  }

