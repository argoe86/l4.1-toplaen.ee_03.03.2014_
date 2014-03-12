<?php namespace Laeninvest\Repositories;

interface ReminderRepositoryInterface {
	public function setKl_nr($kl_nr);
	public function getAll();
	public function getData();
	public function paidInterest();
	public function leftInterest();
	public function interest();
	public function activeLoan();
	public function overdue();
	public function loanDate();
	public function daysWithLoan();
	public function monthsWithLoan();
	public function loanExpiryDate();
	public function daysAfterFullMonths();
	public function convertDateToEstonia($timestamp);
	public function dateAfterFullMonths();
	public function inkasso($summa);
	public function loanWithInterest();

}	