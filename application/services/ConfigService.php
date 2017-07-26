<?php
namespace services;
class ConfigService{
    public function get(){
        $config = new \Yaf\Config\Ini(APPLICATION_PATH . '/conf/domains.ini','prod' );
        return $config;
    }
}