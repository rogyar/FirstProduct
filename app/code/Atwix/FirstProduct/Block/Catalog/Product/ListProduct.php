<?php

namespace Atwix\FirstProduct\Block\Catalog\Product;

class ListProduct
{
    /**
     * @var \Magento\Framework\App\Response\Http
     */
    protected $response;

    public function __construct(
       \Magento\Framework\App\Response\Http $response
    )
    {
        $this->response = $response;
    }

    /**
     * @param \Magento\Eav\Model\Entity\Collection\AbstractCollection $resultCollection
     * @param \Magento\Catalog\Block\Product\ListProduct $subject
     * @return \Magento\Eav\Model\Entity\Collection\AbstractCollection $resultCollection
     */
    public function afterGetLoadedProductCollection(\Magento\Catalog\Block\Product\ListProduct $subject, $resultCollection)
    {
        if ($resultCollection->count() == 1) {
            /** @var \Magento\Catalog\Model\Product $product */
            $product = $resultCollection->getFirstItem();
            $this->response->setRedirect($product->getProductUrl());
        }

        return $resultCollection;
    }
}
