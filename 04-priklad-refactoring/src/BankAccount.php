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
     * @return float
     * @throws InvalidArgumentException
     */
    public function depositMoney($amount)
    {
        if ((double)$amount <= 0) {
            throw new InvalidArgumentException("Cannot deposit negative amount of money");
        }

        $this->balance += round((double)$amount, 2);
        // log action
        $this->changes[] = "deposit: " . sprintf("%.02f", round((double)$amount, 2));

        return $this->balance;
    }

    /**
     * @param float $amount
     * @return float
     * @throws InvalidArgumentException
     */
    public function withdrawMoney($amount)
    {
        if ($this->getBalance() < (double)$amount) {
            throw new InvalidArgumentException("Insufficient balance");
        }

        $this->balance -= round((double)$amount, 2);
        // log action
        $this->changes[] = "withdraw: " . sprintf("%.02f", round((double)$amount, 2));

        return $this->balance;
    }

    /**
     * @return float
     */
    public function getBalance()
    {
        return round($this->balance, 2);
    }

    /**
     * @return array
     */
    public function getChanges()
    {
        return $this->changes;
    }
}