<?php
namespace App\Tests;

use Zenstruck\Browser\PantherBrowser;

class AppBrowser extends PantherBrowser {
	public function waitForPageLoad(): self {
		$this->client()->waitFor('html[aria-busy="true"]');
		$this->client()->waitFor('html:not([aria-busy])');

		return $this;
	}
}