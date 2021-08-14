<?php

namespace Amasty\Aleksandr\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Controller\ResultFactory;

class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * @var ScopeConfigInterface
     */

    private $scopeConfig;

    public function __construct(
        Context              $context,
        ScopeConfigInterface $scopeConfig
    )
    {
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context);
    }

    public function execute()
    {
        if ($this->scopeConfig->isSetFlag('aleksandr_config/general/enabled')) {
            return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        } else {
            die('Sorry, go home');
        }
    }


}
