<?php

/*
__PocketMine Plugin__
name=TreeControl
description=Simple to Advanced Tree Control.
version=1.0
author=Jemrada
class=TreeLife
apiversion=10
*/

        class TreeLife implements Plugin{
	private $api;
	
	public function __construct(ServerAPI $api, $server = false){
		$this->api = $api;
	}
	
	public function init(){
		$this->api->addHandler("player.block.afterbreak", array($this, "hdlAfterBreakingBlock"), 1);
	}
	
	public function hdlAfterBreakingBlock($data, $event){
		if(!($data["player"] instanceof Player)){return(true);}
		if(($data["player"]->gamemode & 0x01) != 0x00){return(true);}
		if($data["target"]->getID() == 17){
			$bottomWood = $data["target"]->y;
			$topWood = $data["target"]->y;
			while(true){
				$topWood++;
				$nBlock = $data["player"]->level->getBlock(new Position($data["target"]->x, $topWood, $data["target"]->z, $data["player"]->level));
				if($nBlock->getID() != 17){break;}
			}
			$blkAir = $this->api->block->get(0);
			$blkWood = $this->api->block->get(17);
			$data["player"]->level->setBlock(new Position($data["target"]->x, $topWood - 1, $data["target"]->z, $data["player"]->level), $blkAir);
			for($iWood = $bottomWood; $iWood < $topWood - 1; $iWood++){
				$data["player"]->level->setBlock(new Position($data["target"]->x, $iWood, $data["target"]->z, $data["player"]->level), $blkWood);
			}
		}
	}
	
	
	public function __destruct(){
	}
	
}
?>
