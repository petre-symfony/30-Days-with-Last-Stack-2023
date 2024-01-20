<?php

namespace App\Tests\Integration\Twig\Components;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\UX\LiveComponent\Test\InteractsWithLiveComponents;

class SearchSiteTest extends KernelTestCase {
	use InteractsWithLiveComponents;

	public function testCanRenderAndReload() {
		$testComponent = $this->createLiveComponent('SearchSite');
		dd($testComponent);
	}
}