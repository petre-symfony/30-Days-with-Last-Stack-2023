<?php

namespace App\Twig\Components;

use App\Entity\Voyage;
use App\Repository\VoyageRepository;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent]
class SearchSite {
	use DefaultActionTrait;
	
	public function __construct(private VoyageRepository $voyageRepository) {
		
	}

	/**
	 * @return Voyage[]
	 */
	public function voyages(): array{
		return $this->voyageRepository->findBySearch(null, [], 10);
	}
}