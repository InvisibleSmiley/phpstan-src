<?php declare(strict_types = 1);

namespace PHPStan\Rules\Methods;

use PHPStan\Rules\RuleLevelHelper;

class CallMethodsOnPossiblyNullRuleTest extends \PHPStan\Testing\RuleTestCase
{

	protected function getRule(): \PHPStan\Rules\Rule
	{
		return new CallMethodsOnPossiblyNullRule(new RuleLevelHelper($this->createBroker(), true, false, true), false);
	}

	public function testExistingClassInTypehint(): void
	{
		$this->analyse([__DIR__ . '/data/possibly-nullable.php'], [
			[
				'Calling method format() on possibly null value of type DateTimeImmutable|null.',
				11,
			],
			[
				'Calling method doFoo() on possibly null value of type CallingMethodOnPossiblyNullable\IssetIssue|null.',
				92,
			],
			[
				'Calling method doFoo() on possibly null value of type CallingMethodOnPossiblyNullable\IssetIssue|null.',
				93,
			],
			[
				'Calling method doFoo() on possibly null value of type CallingMethodOnPossiblyNullable\IssetIssue|null.',
				94,
			],
		]);
	}

}
