<?php
  namespace LastUnits\LastUnits\Plugin\Product;
  use LastUnits\LastUnits\Block\Product\LastUnitsTag;
  class View
  {
      protected $lastUnitsTag;
      public function __construct(LastUnitsTag $lastUnitsTag)
      {
          $this->lastUnitsTag = $lastUnitsTag;
      }
      public function afterToHtml(\Magento\Catalog\Block\Product\View $subject, $result)
      {
          if ($this->lastUnitsTag->isLowStock($subject->getProduct()->getId())) {
              $result .= '<div class="last-units-tag">Low Stock</div>';
          }
          return $result;
      }
  }
?>