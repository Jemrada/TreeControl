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

    class TreeLife implements plugin{

    private $api;

    public function __construct(ServerAPI $api, $server = false){

		$this->api = $api;

	}

	public function init(){

    $this->api->addHandler("player.block.break", array($this, "eventHandler"), 100);

    }
    
    public function eventHandler($data, $event)
    {
    switch($event)
    {
        case 'player.block.break':
?>
