<?php

namespace App\Twig\Components;

use App\Entity\Voyage;
use App\Form\VoyageType;
use Doctrine\DBAL\Driver\Middleware\AbstractConnectionMiddleware;
use Symfony\Component\Form\FormInterface;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\ComponentWithFormTrait;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent]
class VoyageForm extends AbstractConnectionMiddleware {
	use DefaultActionTrait;
	use ComponentWithFormTrait;

	protected function instantiateForm(): FormInterface {
		$voyage = $voyage ?? new Voyage();
		return $this->createForm(VoyageType::class, $voyage, [
			'action' => $voyage->getId() ? $this->generateUrl('app_voyage_edit', ['id' => $voyage->getId()]) : $this->generateUrl('app_voyage_new'),
		]);
	}
}