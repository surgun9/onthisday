<?php
use Skybluesofa\OnThisDay\OnThisDay;
use Carbon\Carbon;

class OnThisDayTest extends PHPUnit_Framework_TestCase {
	function test_january_data() {
		$this->assertFileExists(__DIR__.'/../src/Data/Month/En/Us/January.php');
		$this->assertNotContains ("New Year's Day", OnThisDay::getEvents('1/1/2016'));
		$this->assertContains ("New Year's Day", OnThisDay::getHolidays('1/1/2016'));
		$this->assertContains ("New Year's Day", OnThisDay::setLocale('en_US')->getHolidays('1/1/2016'));
	}
	function test_february_data() {
		$this->assertFileExists(__DIR__.'/../src/Data/Month/En/Us/February.php');
		$this->assertContains ("Valentine's Day", OnThisDay::getEvents('2/14/2016'));
	}
	function test_march_data() {
		$this->assertFileExists(__DIR__.'/../src/Data/Month/En/Us/March.php');
	}
	function test_april_data() {
		$this->assertFileExists(__DIR__.'/../src/Data/Month/En/Us/April.php');
	}
	function test_may_data() {
		$this->assertFileExists(__DIR__.'/../src/Data/Month/En/Us/May.php');
	}
	function test_june_data() {
		$this->assertFileExists(__DIR__.'/../src/Data/Month/En/Us/June.php');
	}
	function test_july_data() {
		$this->assertFileExists(__DIR__.'/../tests/Custom/En/Us/July.php');
		$events = OnThisDay::useCustomEvents("Skybluesofa\OnThisDay\Tests\Custom")->getEvents('7/1/2016');
		$this->assertContains ("Some Custom Event", $events);
		$events = OnThisDay::useCustomEvents("Skybluesofa\OnThisDay\Tests\Custom")->withStandardEvents(false)->getEvents('7/1/2016');
		$this->assertContains ("Some Custom Event", $events);
	}
	function test_august_data() {
		$this->assertFileExists(__DIR__.'/../src/Data/Month/En/Us/August.php');
	}
	function test_september_data() {
		$this->assertFileExists(__DIR__.'/../src/Data/Month/En/Us/September.php');
	}
	function test_october_data() {
		$this->assertFileExists(__DIR__.'/../src/Data/Month/En/Us/October.php');
		$this->assertNotContains ('Halloween', OnThisDay::getEvents('10/31/2016'));
		$this->assertContains ('Halloween', OnThisDay::getHolidays('10/31/2016'));
		$this->assertContains ('Halloween', OnThisDay::getEventsAndHolidays('10/31/2016'));
	}
	function test_november_data() {
		$this->assertFileExists(__DIR__.'/../src/Data/Month/En/Us/November.php');
		$this->assertContains ('Men Make Dinner Day', OnThisDay::getEvents('11/3/2016'));
		$this->assertContains ('Take A Hike Day', OnThisDay::getEvents('11/17/2016'));
		$this->assertContains ('Black Friday', OnThisDay::getEvents('11/25/2016'));
		$this->assertNotContains ('Thanksgiving', OnThisDay::getEvents('11/24/2016'));
		$this->assertContains ('Thanksgiving', OnThisDay::getHolidays('11/24/2016'));
		$this->assertContains ('Thanksgiving', OnThisDay::getEventsAndHolidays('11/24/2016'));
	}
	function test_december_data() {
		$this->assertFileExists(__DIR__.'/../src/Data/Month/En/Us/December.php');
	}
	function test_when_is_event() {
		/*
		$this->assertContainsOnlyInstancesOf(Carbon::class, OnThisDay::whenIs('Halloween', '2016'));
		$this->assertContains('10/31/2016', array_map(
        function($halloweenDate) { return $halloweenDate->format('m/d/Y') },
        OnThisDay::whenIs('Halloween', '2016')
		));
		$this->assertCount(1, OnThisDay::whenIs('Thanksgiving', '2012'))
		$this->assertContains('11/22/2012', array_map(
        function($halloweenDate) { return $halloweenDate->format('m/d/Y') },
        OnThisDay::whenIs('Thanksgiving', '2012')
		));
		$this->assertCount(0, OnThisDay::whenIs('Some Made-up Holiday about Aliens', '2012'));
		*/
	}
}
?>
