<?php


namespace Faridepc78\User\Tests\Unit;


use Faridepc78\User\Services\VerifyCodeService;
use Tests\TestCase;

class VerifyCodeServiceTest extends TestCase
{
    public function test_generated_code_is_6_digit()
    {
        $code = VerifyCodeService::generate();
        $this->assertIsNumeric($code, 'Generated code is not Numeric');
        $this->assertLessThanOrEqual(999999, $code, 'Generated Code is Less than 999999');
        $this->assertGreaterThanOrEqual(100000, $code, 'Generated Code is Greater than 999999');
    }

    public function test_verify_code_can_store()
    {
        $code = VerifyCodeService::generate();
        VerifyCodeService::store(1, $code);

        $this->assertEquals($code, cache()->get('verify_code_1'));
    }
}
