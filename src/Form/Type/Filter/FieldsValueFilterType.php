<?php

declare(strict_types = 1);

namespace Ptb\ExtendedOrdersFiltrationPlugin\Form\Type\Filter;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class FieldsValueFilterType extends AbstractType
{
	public function getParent(): string
	{
		return CheckboxType::class;
	}

	public function getBlockPrefix(): string
	{
		return 'sylius_grid_filter_fields_value_filter_type';
	}
}
