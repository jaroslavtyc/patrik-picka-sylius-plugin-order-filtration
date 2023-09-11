<?php

declare(strict_types = 1);

namespace Ptb\ExtendedOrdersFiltrationPlugin\Grid\Filter;

use InvalidArgumentException;
use Sylius\Bundle\GridBundle\Form\Type\Filter\BooleanFilterType;
use Sylius\Component\Grid\Data\DataSourceInterface;
use Sylius\Component\Grid\Filter\BooleanFilter;
use Sylius\Component\Grid\Filtering\FilterInterface;

class FieldsValueFilter implements FilterInterface
{
	public const DEFAULT_SCALE = 2;

	private const EXPRESSION_EQUALS = 'equals';
	private const EXPRESSION_NOT_EQUALS = 'notEquals';
	private const EXPRESSION_IN = 'in';
	private const EXPRESSION_NOT_IN = 'notIn';

	public function apply(DataSourceInterface $dataSource, string $name, $data, array $options): void
	{
		if (empty($data)) {
			return;
		}
		$supportedExpressionsArray = [
			self::EXPRESSION_EQUALS,
			self::EXPRESSION_NOT_EQUALS,
			self::EXPRESSION_IN,
			self::EXPRESSION_NOT_IN,
		];

		$fieldsFilters = $options['fields_filters'];

		foreach ($fieldsFilters as $fieldName => $filterData) {
			$expressionName = $filterData['expression'];
			$value = $filterData['value'];

			if (!in_array($expressionName, $supportedExpressionsArray)) {
				throw new InvalidArgumentException(
					'Expression name is not supported. Supported expressions are: ' . rtrim(implode(
						", ",
						$supportedExpressionsArray
					), ', ') . '.',
				);
			} elseif (($expressionName === self::EXPRESSION_IN || $expressionName === self::EXPRESSION_NOT_IN)&& !is_array($value)) {
				throw new InvalidArgumentException('Field filter value must be type of Array.');
			} elseif (!(is_string($value) || is_numeric($value))) {
				throw new InvalidArgumentException('Field filter value type is not supported for this expression. Supported types are: "string", "int", "float"');
			}

			$dataSource->restrict($dataSource->getExpressionBuilder()->{$expressionName}($fieldName, $value));
		}
	}
}
