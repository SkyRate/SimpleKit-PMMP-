<?php

namespace AkyaMC;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\utils\Config;
use pocketmine\utils\Utils;
use pocketmine\plugin\PluginBase as Plugins;
use DevJblus\Loader;

use pocketmine\item\Item;

class Kit extends PluginBase implements Listener {

	public function onEnable() {
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getServer()->getLogger()->info("SimpleKit: §ePlugins Enable");
	}

	public function onDisable() {
		$this->getServer()->getLogger()->info("SimpleKit: §cPlugins Disable");
	}

	public function onCommand(CommandSender $sender, Command $command, $label, array $args): bool {
		switch($command->getName()) {
			case "kit":
				$sender->sendMessage("§cUsage: /kit list");
				if(isset($args[0])) {
					$args[0] = strtolower($args[0]);
					switch($args[0]) {
						case "list":
							$sender->sendMessage("§7===== §eSimple§6Kit §7===== \n\n§f/kit base §7- §fKit de base du serveur\n§f/kit legend §7- §fKit disponible a partir du grade legend\n§f/kit heros §7- §fDisponible a partir du grade heros");
							return true;

						case "base":
							$sender->sendMessage("§7[§l§eSimple§6Kit§r§7] §fVous venez d'avoir le kit §eBASE");
							$sender->getInventory()->addItem(Item::get(298, 0, 1)); #  Leather Cap
							$sender->getInventory()->addItem(Item::get(299, 0, 1)); #  Leather Tunic
							$sender->getInventory()->addItem(Item::get(300, 0, 1)); #  Leather Pants
							$sender->getInventory()->addItem(Item::get(301, 0, 1)); #  Leather Boots
							$sender->getInventory()->addItem(Item::get(272, 0, 1)); #  Stone Sword
							$sender->getInventory()->addItem(Item::get(364, 0, 15)); #  Steak
							return true;

						case "legend":
							if($sender->hasPermission("kit.legend")) {
								$sender->sendMessage("§7[§l§eSimple§6Kit§r§7] §fVous venez d'avoir le kit §eLEGEND");
								$sender->getInventory()->addItem(Item::get(306, 0, 1)); #  Iron Helmet
								$sender->getInventory()->addItem(Item::get(307, 0, 1)); #  Iron Chestplate
								$sender->getInventory()->addItem(Item::get(308, 0, 1)); #  Iron Leggings
								$sender->getInventory()->addItem(Item::get(309, 0, 1)); #  Iron Boots
								$sender->getInventory()->addItem(Item::get(267, 0, 1)); #  Iron Sword
								$sender->getInventory()->addItem(Item::get(364, 0, 32)); #  Steak
								$sender->getInventory()->addItem(Item::get(322, 0, 5)); #  Golden Apple
								return true;
							}

						case "heros":
							if($sender->hasPermission("kit.heros")) {
								$sender->sendMessage("§7[§l§eSimple§6Kit§r§7] §fVous venez d'avoir le kit §eHEROS");
								$sender->getInventory()->addItem(Item::get(310, 0, 1)); #  Diamond Helmet
								$sender->getInventory()->addItem(Item::get(311, 0, 1)); #  Diamond Chestplate
								$sender->getInventory()->addItem(Item::get(312, 0, 1)); #  Diamond Leggings
								$sender->getInventory()->addItem(Item::get(313, 0, 1)); #  Diamond Boots
								$sender->getInventory()->addItem(Item::get(276, 0, 1)); #  Diamond Sword
								$sender->getInventory()->addItem(Item::get(364, 0, 32)); #  Steak
								$sender->getInventory()->addItem(Item::get(322, 0, 15)); #  Golden Apple
								return true;
							}
					}
					$sender->sendMessage("§7[§l§eSimple§6Kit§r§7] §7- §cTu ne possède pas le grade pour se kit");
					return true;
				}
				return true;
			break;
		}
	}
}