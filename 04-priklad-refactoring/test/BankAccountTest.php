<?php
require_once __DIR__."/../src/BankAccount.php";

class BankAccountTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var BankAccount
     */
    protected $account;

    protected function setUp()
    {
        $this->account = new BankAccount("John", "Doe");
    }

    public function testGetOwnerName()
    {
        $this->assertSame("John Doe", $this->account->getOwnerName());
    }

    public function testDepositMoney()
    {
        // check initial balance
        $this->assertSame(0.0, $this->account->getBalance());

        // deposit some money
        $this->account->depositMoney(100);
        $this->assertEquals(100, $this->account->getBalance());

        // deposit again
        $this->account->depositMoney(12.99);
        $this->assertSame(112.99, $this->account->getBalance());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testDepositeNegativeAmountOfMoney()
    {
        $this->account->depositMoney(-1);
    }

    public function testWithdrawMoney()
    {
        // deposit some money first
        $this->account->depositMoney(1000);

        $this->account->withdrawMoney(899.99);
        $this->assertSame(100.01, $this->account->getBalance());

        $this->account->withdrawMoney(10.01);
        $this->assertSame(90.0, $this->account->getBalance());

        // withdraw rest of money
        $this->account->withdrawMoney(90.0);
        $this->assertSame(0.0, $this->account->getBalance());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testWithdrawMoneyWithoutSufficientBalance()
    {
        // make sure that initial balance is zero
        $this->assertSame(0.0, $this->account->getBalance());

        // try to withdraw 100
        $this->account->withdrawMoney(100);
    }

    public function testGetChanges()
    {
        // check initial state
        $this->assertSame(array(), $this->account->getChanges());

        $this->account->depositMoney(100);
        $this->assertSame(1, count($this->account->getChanges()));
        $this->assertContains("deposit: 100.00", $this->account->getChanges());

        $this->account->withdrawMoney(99.99);
        $this->assertSame(2, count($this->account->getChanges()));
        $this->assertContains("withdraw: 99.99", $this->account->getChanges());
    }

    public function testGetChangesAfterBadDeposit()
    {
        $this->assertSame(array(), $this->account->getChanges());
        try {
            $this->account->depositMoney(-1);
        } catch(InvalidArgumentException $e) {/* ignore exception */}

        $this->assertSame(array(), $this->account->getChanges());
    }

    public function testGetChangesAfterBadWithdraw()
    {
        $this->assertSame(array(), $this->account->getChanges());
        try {
            $this->account->withdrawMoney(100);
        } catch(InvalidArgumentException $e) {/* ignore exception */}

        $this->assertSame(array(), $this->account->getChanges());
    }
}