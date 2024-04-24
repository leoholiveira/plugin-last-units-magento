<?php
  namespace LastUnits\LastUnits\Block\Product;

  use Magento\CatalogInventory\Api\StockRegistryInterface;
  use Magento\Framework\View\Element\Template;

  class LastUnitsTag extends Template
  {
      protected $stockRegistry;
      public function __construct(
          Template\Context $context,
          StockRegistryInterface $stockRegistry,
          array $data = []
      ) {
          parent::__construct($context, $data);
          $this->stockRegistry = $stockRegistry;
      }
      public function isLowStock($productId)
      {
          $stockItem = $this->stockRegistry->getStockItem($productId);
          return $stockItem->getQty() < 50;
      }
  }
?>