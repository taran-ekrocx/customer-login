<?php

namespace Ekrocx\CustomerLogin\Controller\Uma;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Umalogin extends \Magento\Framework\App\Action\Action
{
    protected $_resultPageFactory;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) 
    {
        $this->_resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__(' UMA Login '));

        $block = $resultPage->getLayout()
                ->createBlock('Ekrocx\CustomerLogin\Block\Umalogin')
                ->setTemplate('Ekrocx_CustomerLogin::uma/uma_redirect_uri.phtml')
                ->toHtml();
        $this->getResponse()->setBody($block);
    }

}