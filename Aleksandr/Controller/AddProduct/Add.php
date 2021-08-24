<?php

namespace Amasty\Aleksandr\Controller\AddProduct;

use Magento\Framework\App\Action\Context;
use Magento\Checkout\Model\Session as CheckoutSession;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory as ProductCollectionFactory;

class Add extends \Magento\Framework\App\Action\Action
{
    /**
     * @var CheckoutSession
     */

    private $session;

    /**
     * @var ProductRepositoryInterface
     */

    private $productRepository;

    public function __construct(
        Context                    $context,
        CheckoutSession            $session,
        ProductRepositoryInterface $productRepository,
        ProductCollectionFactory   $productCollectionFactory
    )
    {
        $this->session = $session;
        $this->productRepository = $productRepository;
        $this->productCollectionFactory = $productCollectionFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $product = $this->productRepository->get('24-MB01');
        $quote = $this->session->getQuote();
        if (!$quote->getId()) {
            $quote->save();
        }

        $quote->addProduct($product, 3);
        $quote->save();
        die('done');
    }


}
