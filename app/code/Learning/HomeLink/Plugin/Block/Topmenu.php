<?php

namespace Learning\HomeLink\Plugin\Block;

use Magento\Framework\Data\Tree\NodeFactory;
use Magento\Framework\UrlInterface;

class Topmenu
{

    /**
     * @var NodeFactory
     */
    protected $nodeFactory;
    private $urlInterface;

    /**
     * Initialize dependencies.
     *
     * @param NodeFactory $nodeFactory
     * @param UrlInterface $urlInterface
     */
    public function __construct(
        NodeFactory $nodeFactory,
        UrlInterface $urlInterface
    ) {
        $this->nodeFactory = $nodeFactory;
        $this->urlInterface = $urlInterface;
    }

    /**
     *
     * Inject node into menu.
     * @param \Magento\Theme\Block\Html\Topmenu $subject
     */
    public function beforeGetHtml(
        \Magento\Theme\Block\Html\Topmenu $subject
    ) {
        $node = $this->nodeFactory->create(
            [
                'data' => $this->getNodeAsArray(),
                'idField' => 'id',
                'tree' => $subject->getMenu()->getTree()
            ]
        );
        $subject->getMenu()->addChild($node);
    }

    /**
     *
     * Build node
     **/
    protected function getNodeAsArray()
    {
        return [
            'name' => __('Home'),
            'id' => 'home',
            'url' => $this->urlInterface->getUrl('/'),
            'has_active' => false,
            'is_active' => $this->isActive()
        ];
    }

    private function isActive()
    {
        $activeUrls = '/';
        $currentUrl = $this->urlInterface->getCurrentUrl();
        if (strpos($currentUrl, $activeUrls) !== false) {
            return false;
        }
        return true;
    }
}
