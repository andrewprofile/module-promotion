<?php
declare(strict_types=1);

namespace Andrewprofile\Promotion\Test\Unit;

use Andrewprofile\Promotion\Model\PromotionGroup;
use Magento\Framework\Stdlib\DateTime;
use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use Magento\Framework\Registry;
use Magento\Framework\Model\Context;
use PHPUnit\Framework\TestCase;

class PromotionGroupTest extends TestCase
{
    protected $contextMock;
    protected $registryMock;
    protected $dateTimeMock;
    protected $promotionGroup;

    protected function setUp(): void
    {
        $objectManager = new ObjectManager($this);
        $resource =  $objectManager->getObject(\Magento\Framework\App\ResourceConnection::class);

        $this->contextMock = $objectManager->getObject(Context::class,
            ['resource' => $resource]
        );

        $this->registryMock = $this->createMock(Registry::class);
        $this->dateTimeMock = $this->createMock(DateTime::class);

        $this->dateTimeMock->method('formatDate')->willReturn('2024-01-01 00:00:00');

        $this->promotionGroup = new PromotionGroup(
            $this->contextMock,
            $this->registryMock,
            $this->dateTimeMock
        );
    }

    public function testGetAndSetPromotionGroupId()
    {
        $promotionGroupId = 123;
        $this->promotionGroup->setPromotionGroupId($promotionGroupId);
        $this->assertEquals($promotionGroupId, $this->promotionGroup->getPromotionGroupId());
    }

    public function testGetAndSetName()
    {
        $name = 'Test Promotion Group';
        $this->promotionGroup->setName($name);
        $this->assertEquals($name, $this->promotionGroup->getName());
    }

    public function testGetAndSetCreatedAt()
    {
        $createdAt = '2024-01-01 00:00:00';
        $this->promotionGroup->setCreatedAt($createdAt);
        $this->assertEquals($createdAt, $this->promotionGroup->getCreatedAt());
    }

    public function testGetAndSetUpdatedAt()
    {
        $updatedAt = '2024-01-01 00:00:00';
        $this->promotionGroup->setUpdatedAt($updatedAt);
        $this->assertEquals($updatedAt, $this->promotionGroup->getUpdatedAt());
    }

    public function testBeforeSaveSetsCreatedAtIfNew()
    {
        $this->promotionGroup->setData('is_object_new', true);
        $this->promotionGroup->beforeSave();

        $this->assertEquals('2024-01-01 00:00:00', $this->promotionGroup->getCreatedAt());
        $this->assertEquals('2024-01-01 00:00:00', $this->promotionGroup->getUpdatedAt());
    }

    public function testBeforeSaveSetsUpdatedAt()
    {
        $this->promotionGroup->setData('is_object_new', false);
        $this->promotionGroup->beforeSave();

        $this->assertEquals('2024-01-01 00:00:00', $this->promotionGroup->getUpdatedAt());
    }

    public function testBeforeSaveDoesNotSetCreatedAtIfNotNew()
    {
        $this->promotionGroup->setData('is_object_new', false);
        $this->promotionGroup->setCreatedAt('2024-01-01 00:00:00');
        $this->promotionGroup->beforeSave();

        $this->assertEquals('2024-01-01 00:00:00', $this->promotionGroup->getCreatedAt());
    }
}
