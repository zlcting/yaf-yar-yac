<?php
class IndexController extends \Yaf\Controller_Abstract {
    // default action name
    public function indexAction() {
        $client = new \Yar_Client("http://config.local.domain.cn/rpc");
        $result = $client->get();
        print_r($result);
        return false;
    }

    /**
     * 在配置文件变更后　手动调用此方法　广播给各个项目
     * 通知其他项目更新配置文件内存
     */
    public function refresh(){

    }


}