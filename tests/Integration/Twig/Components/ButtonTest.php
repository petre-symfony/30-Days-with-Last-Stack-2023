<?php

namespace App\Tests\Integration\Twig\Components;

use App\Twig\Components\Button;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\UX\TwigComponent\Test\InteractsWithTwigComponents;

class ButtonTest extends KernelTestCase {
	use InteractsWithTwigComponents;

	public function testButtonRendersWithVariants() {
		$component = $this->mountTwigComponent('Button', [
			'variant' => 'success'
		]);

		$this->assertInstanceOf(Button::class, $component);
		dump($component);
		$this->assertSame('success', $component->variant);
	}
}