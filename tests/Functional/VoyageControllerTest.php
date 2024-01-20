<?php

namespace App\Tests\Functional;

use App\Factory\PlanetFactory;
use App\Factory\VoyageFactory;
use App\Tests\AppPantherTestCase;
use Zenstruck\Foundry\Test\Factories;
use Zenstruck\Foundry\Test\ResetDatabase;

class VoyageControllerTest extends AppPantherTestCase {
	use ResetDatabase;
	use Factories;

	public function testCreateVoyage() {
		PlanetFactory::createOne([
			'name' => 'Earth'
		]);
		VoyageFactory::createOne();

		$browser = $this->pantherBrowser()
			->visit('/')
			->click('Voyages')
			->waitForPageLoad()
			->click('New Voyage')
			->fillField('Purpose', 'Test voyage')
			->selectFieldOption('Planet', 'Earth')
			->click('Save')
			->assertElementCount('table tbody tr', 2)
			->assertSee('Bon voyage');
	}
}