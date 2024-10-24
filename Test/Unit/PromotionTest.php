<?php
declare(strict_types=1);

namespace Andrewprofile\Promotion\Test\Unit;

use Andrewprofile\Promotion\Model\Promotion;
use Magento\Framework\Model\Context;
use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use PHPUnit\Framework\TestCase;
use Magento\Framework\Stdlib\DateTime;
use Magento\Framework\Registry;

class PromotionTest extends TestCase
{
    private $contextMock;
    private $registryMock;
    private $dateTimeMock;
    private $promotion;

    protected function setUp(): void
    {
        $objectManager = new ObjectManager($this);
        $resource =  $objectManager->getObject(\Magento\Framework\App\ResourceConnection::class);

        $this->contextMock = $objectManager->getObject(Context::class,
            ['resource' => $resource]
        );

        $this->registryMock = $this->createMock(Registry::class);
        $this->dateTimeMock = $this->createMock(DateTime::class);
        $this->promotion = new Promotion($this->contextMock, $this->registryMock, $this->dateTimeMock);
    }

    public function testGetAndSetPromotionId()
    {
        $this->promotion->setPromotionId(1);
        $this->assertEquals(1, $this->promotion->getPromotionId());
    }

    public function testGetAndSetName()
    {
        $this->promotion->setName('Summer Sale');
        $this->assertEquals('Summer Sale', $this->promotion->getName());
    }

    public function testGetAndSetCreatedAt()
    {
        $this->promotion->setCreatedAt('2024-01-01 00:00:00');
        $this->assertEquals('2024-01-01 00:00:00', $this->promotion->getCreatedAt());
    }

    public function testGetAndSetUpdatedAt()
    {
        $this->promotion->setUpdatedAt('2024-01-02 00:00:00');
        $this->assertEquals('2024-01-02 00:00:00', $this->promotion->getUpdatedAt());
    }

    public function testBeforeSaveNewObjectSetsCreatedAt()
    {
        $this->dateTimeMock->method('formatDate')->willReturn('2024-01-01 00:00:00');
        $this->promotion->setObjectNew(true);
        $this->promotion->beforeSave();

        $this->assertEquals('2024-01-01 00:00:00', $this->promotion->getCreatedAt());
        $this->assertEquals('2024-01-01 00:00:00', $this->promotion->getUpdatedAt());
    }

    public function testBeforeSaveExistingObjectUpdatesUpdatedAt()
    {
        $this->dateTimeMock->method('formatDate')->willReturn('2024-01-02 00:00:00');
        $this->promotion->setObjectNew(false);
        $this->promotion->beforeSave();

        $this->assertEquals('2024-01-02 00:00:00', $this->promotion->getUpdatedAt());
    }
}


