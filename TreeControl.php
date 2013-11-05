<?php

/*
__PocketMine Plugin__
name=TreeControl
description=Simple to Advanced Tree Control
version=0.1
author=Jemrada
class=TreeControl
apiversion=9,10
*/

class TreeControl implements Plugin{
   private $api;

   public function __construct(ServerAPI $api, $server = false){
     $this->api = $api;
   }
   
   public function init(){
     $this->api->console->register("SaplingMature", "Command for growing a tree", array($this, "command"));
            $this,
            "SaplingMature"
   }
   
   public function __destruct(){
   }

?>
