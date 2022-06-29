<?php
namespace Metrol\Tests;

use Metrol\Status;
use PHPUnit\Framework\TestCase;

class StatusUsageTest extends TestCase
{
    public function testSettingFetchingStatus(): void
    {
        $suppStat = new SupportsStatus;

        self::assertEquals(Status::_DEFAULT, $suppStat->getStatus());

        $suppStat->setToOk();

        self::assertEquals(Status::OK, $suppStat->getStatus()
            , 'Check the status is now OK');

        $suppStat->setBadStatus();

        self::assertEquals(Status::OK, $suppStat->getStatus()
            , 'The status should not update with an invalid status being set');
    }

    public function testMessages(): void
    {
        $suppStat = new SupportsStatus;

        $this->assertEmpty($suppStat->getMessage());
        $message = 'Being able to track a status is handy';

        $suppStat->pushMessageIn($message);

        $this->assertEquals($message, $suppStat->getMessage());
    }
}
