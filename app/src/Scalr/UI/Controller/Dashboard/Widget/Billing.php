<?php

use Scalr\Acl\Acl;

class Scalr_UI_Controller_Dashboard_Widget_Billing extends Scalr_UI_Controller_Dashboard_Widget
{
    public function getDefinition()
    {
        return array(
            'type' => 'nonlocal'
        );
    }

    public function getContent($params = array())
    {
        $this->request->restrictAccess(Acl::RESOURCE_BILLING_ACCOUNT);

        $billing = Scalr_Billing::init()->loadByAccount($this->user->getAccount());
        return $billing->getInfo();
    }

    public function xGetContentAction()
    {
        $this->response->data($this->getContent());
    }
}