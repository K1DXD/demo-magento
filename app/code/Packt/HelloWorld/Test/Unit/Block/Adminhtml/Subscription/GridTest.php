<?php
namespace Packt\HelloWorld\Test\Unit\Block\Adminhtml\Subscription;

class GridTest extends \PHPUnit\Framework\TestCase 
{
    /**
    * @var \Packt\HelloWorld\Block\Adminhtml\Subscription\Grid
    */
    protected $block;

    protected function setUp():void 
    {   
        $objectManager = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);
        $this->block = $objectManager->getObject("Packt\HelloWorld\Block\Adminhtml\Subscription\Grid");
    }

    protected function tearDown():void
    {
        $this->block = null;
    }

    public function testDecorateStatus():void 
    {   
        $this->assertContains('grid-severity-minor', $this->block->decorateStatus('pending'));
        $this->assertContains('grid-severity-notice', $this->block->decorateStatus('approved'));
        $this->assertContains('grid-severity-critical', $this->block->decorateStatus('declined'));
        $this->assertContains('grid-severity-critical', $this->block->decorateStatus(6));
        $this->assertContains('grid-severity-critical', $this->block->decorateStatus(null));
    }
}