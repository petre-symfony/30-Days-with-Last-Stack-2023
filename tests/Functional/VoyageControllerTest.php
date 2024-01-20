<?php

namespace App\Tests\Functional;

use App\Factory\PlanetFactory;
use App\Factory\VoyageFactory;
use Symfony\Component\Panther\PantherTestCase;
use Zenstruck\Browser\Test\HasBrowser;
use Zenstruck\Foundry\Test\Factories;
use Zenstruck\Foundry\Test\ResetDatabase;

class VoyageControllerTest extends PantherTestCase {
	use ResetDatabase;
	use Factories;
	use HasBrowser;

	public function testCreateVoyage() {
		PlanetFactory::createOne([
			'name' => 'Earth'
		]);
		VoyageFactory::createOne();

		$this->pantherBrowser()
			->visit('/')
			->click('Voyages')
			->click('New Voyage')
			->fillField('Purpose', 'Test voyage')
			->selectFieldOption('Planet', 'Earth')
			->click('Save')
			->assertElementCount('table tbody tr', 2)
			->assertSee('Bon voyage');
	}
}