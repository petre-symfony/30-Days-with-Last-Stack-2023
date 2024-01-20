<?php

namespace App\Tests\Integration\Twig\Components;

use App\Factory\VoyageFactory;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\UX\LiveComponent\Test\InteractsWithLiveComponents;
use Zenstruck\Foundry\Test\Factories;
use Zenstruck\Foundry\Test\ResetDatabase;

class SearchSiteTest extends KernelTestCase {
	use InteractsWithLiveComponents;
	use ResetDatabase;
	use Factories;

	public function testCanRenderAndReload() {
		VoyageFactory::createMany(5, [
			'purpose' => 'first 5 voyages'
		]);
		VoyageFactory::createOne();
		
		$testComponent = $this->createLiveComponent('SearchSite');
	}
}