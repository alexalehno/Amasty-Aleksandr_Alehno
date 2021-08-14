<?php

namespace Amasty\Aleksandr\Block;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class Index extends Template
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

    public function greetingText()
    {
        return $this->scopeConfig->getValue('aleksandr_config/general/greeting_text');
    }

    public function defaultValue()
    {
        return $this->scopeConfig->getValue('aleksandr_config/general/default_value');
    }

}
