<?php
namespace Metrol\Tests;

use Metrol\Status;
use PHPUnit\Framework\TestCase;

class StatusReferenceTest extends TestCase
{
    public function testStatusReference(): void
    {
        $this->assertEquals(400, Status::BAD_REQUEST);
    }

    public function testStatusCodeText(): void
    {
        $this->assertEquals('Internal Server Error', Status::getHTTPStatusText(Status::INTERNAL_ERROR));
    }
}
