<?php
# A BankAccount object represents a user's financial information.
class BankAccount {
  private $name;
  private $balance;
  
  # Creates a new account with the given name and no money ($0.00).
  public function __construct($name) {
    $this->name = $name;
    $this->balance = 0.00;
  }
  
  # Returns the amount of money remaining in this account.
  public function getBalance() {
    return $this->balance;
  }
  
  # Returns the name of the user of this account.
  public function getName() {
    return $this->name;
  }
  
  # Adds the given amount to this account's balance (if non-negative).
  public function deposit($amount) {
    if ($amount >= 0.00) {
	  $this->balance += $amount;
	}
  }
  
  # Removes the given amount from the user's balance
  # (if non-negative and the user has at least that much money).
  public function withdraw($amount) {
    if ($amount >= 0.00 && $amount <= $this->balance) {
	  $this->balance -= $amount;
	}
  }
  
  # Returns a String representation such as "{Joe Smith, $2.55}".
  public function __toString() {
    return "{" . $this->name . ", $" . $this->balance . "}";
  }
}
?>
