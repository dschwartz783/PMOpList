<?php
/**
 * Created by PhpStorm.
 * User: funtimes
 * Date: 6/19/16
 * Time: 8:08 AM
 */

namespace DDSPlugins\PMOpList;

use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;

class PMOpList extends PluginBase
{
    function onCommand(CommandSender $sender, Command $command, $label, array $args)
    {
        $staff_string = "§cCurrently online staff: \n §a- ";
        $temp_string = "";
        foreach ($this->getServer()->getOnlinePlayers() as $player) {
            if ($player->isOp()) {
                if ($temp_string != "") {
                    $temp_string .= ", ";
                }
                $temp_string .= $player->getName();
            }
        }

        if ($temp_string === "") {
            $staff_string .= "None";
        } else {
            $staff_string .= $temp_string;
        }
        $sender->sendMessage($staff_string);
        return true;
    }
}
