<?php
class BankAccount
{
    protected $name;
    protected $surname;

    protected $balance = 0.0;
    protected $changes = array();

    /**
     * @param string $name Owner's name
     * @param string $surname Owner's surname
     */
    public function __construct($name, $surname)
    {
        $this->name = $name;
        $this->surname = $surname;
    }

    /**
     * @return string
     */
    public function getOwnerName()
    {
        return trim($this->name . " " . $this->surname);
    }

    /**
     * @param float $amount
     * @param string $reason
     * @return float
     * @throws InvalidArgumentException
     */
    public function depositMoney($amount, $reason = "deposit")
    {
        $amount = (double)sprintf("%.02f", (double)$amount);
        if ($amount <= 0) {
            throw new InvalidArgumentException("Cannot deposit negative amount of money");
        }

        return $this->addAmount($amount, $reason . ": " . sprintf("%.02f", $amount));
    }

    /**
     * @param float $amount
     * @return float
     * @throws InvalidArgumentException
     */
    public function withdrawMoney($amount)
    {
        $amount = (double)sprintf("%.02f", (double)$amount);
        if ($this->getBalance() < $amount) {
            throw new InvalidArgumentException("Insufficient balance");
        }

        return $this->subAmount($amount, "withdraw: " . sprintf("%.02f", $amount));
    }

    /**
     * @return float
     */
    public function getBalance()
    {
        return (double)sprintf("%.02f", $this->balance);
    }

    /**
     * @return array
     */
    public function getChanges()
    {
        return $this->changes;
    }

    /**
     * @param float $amount
     * @param string $reason
     * @return float
     */
    protected function addAmount($amount, $reason)
    {
        $this->balance += $amount;
        $this->changes[] = $reason;

        return $this->balance;
    }

    /**
     * @param float $amount
     * @param string $reason
     * @return float
     */
    protected function subAmount($amount, $reason)
    {
        $this->balance -= $amount;
        $this->changes[] = $reason;

        return $this->balance;
    }

    /**
     * @param BankAccount $recipient
     * @param float $amount
     * @return float
     * @throws InvalidArgumentException
     */
    public function transfer(BankAccount $recipient, $amount)
    {
        if ($this->getOwnerName() === $recipient->getOwnerName()) {
            throw new InvalidArgumentException("Cannot transfer money to the same account");
        }

        if ($amount <= 0) {
            throw new InvalidArgumentException("Cannot deposit negative amount of money");
        }

        if ($this->getBalance() < $amount) {
            throw new InvalidArgumentException("Insufficient balance");
        }

        $amount = (double)sprintf("%.02f", (double)$amount);
        $this->subAmount($amount, "sent: " . sprintf("%.02f", $amount));

        $recipient->depositMoney($amount, "received");
    }
}