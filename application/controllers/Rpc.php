<?php

class RpcController extends \Yaf\Controller_Abstract {

    public function serviceAction() {
        $service = new \Yar_Server(new \services\ConfigService());
        $service->handle();
        return false;
    }
}