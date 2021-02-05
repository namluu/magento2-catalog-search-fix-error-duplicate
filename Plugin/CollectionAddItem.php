<?php
namespace Sls\CatalogSearch\Plugin;
use Magento\CatalogSearch\Model\ResourceModel\Fulltext\Collection;
use Magento\Framework\DataObject;

class CollectionAddItem
{
    public function beforeAddItem(Collection $subject, $item)
    {
        $itemId = $this->getItemId($subject, $item);

        if ($itemId !== null) {
            $subject->removeItemByKey($itemId);
        }

        return [$item];
    }

    protected function getItemId(Collection $subject, DataObject $item)
    {
        $field = $subject->getIdFieldName();
        if ($field)
            return $item->getData($field);
        return null;
    }
}