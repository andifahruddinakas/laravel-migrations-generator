<?php
/**
 * Created by PhpStorm.
 * User: liow.kitloong
 * Date: 2020/03/31
 * Time: 12:09
 */

namespace Tests\KitLoong\MigrationsGenerator\Generators;

use Doctrine\DBAL\Schema\Column;
use KitLoong\MigrationsGenerator\Generators\DecimalField;
use KitLoong\MigrationsGenerator\MigrationMethod\ColumnModifier;
use Mockery;
use Orchestra\Testbench\TestCase;

class DecimalFieldTest extends TestCase
{
    public function testMakeField()
    {
        /** @var DecimalField $decimalField */
        $decimalField = resolve(DecimalField::class);

        $field = [
            'field' => 'field',
            'type' => 'decimal',
            'args' => [],
            'decorators' => []
        ];

        $column = Mockery::mock(Column::class);
        $column->shouldReceive('getPrecision')
            ->andReturn(5);
        $column->shouldReceive('getScale')
            ->andReturn(3);

        $column->shouldReceive('getUnsigned')
            ->andReturnTrue()
            ->once();

        $field = $decimalField->makeField($field, $column);
        $this->assertSame([5, 3], $field['args']);
        $this->assertSame([ColumnModifier::UNSIGNED], $field['decorators']);
    }

    public function testMakeFieldPrecisionIsDefault()
    {
        /** @var DecimalField $decimalField */
        $decimalField = resolve(DecimalField::class);

        $field = [
            'field' => 'field',
            'type' => 'decimal',
            'args' => [],
            'decorators' => []
        ];

        $column = Mockery::mock(Column::class);
        $column->shouldReceive('getPrecision')
            ->andReturn(8);
        $column->shouldReceive('getScale')
            ->andReturn(2);

        $column->shouldReceive('getUnsigned')
            ->andReturnFalse();

        $field = $decimalField->makeField($field, $column);
        $this->assertSame([], $field['args']);
    }

    public function testMakeFieldScaleIsDefaultButPrecisionIsNot()
    {
        /** @var DecimalField $decimalField */
        $decimalField = resolve(DecimalField::class);

        $field = [
            'field' => 'field',
            'type' => 'decimal',
            'args' => [],
            'decorators' => []
        ];

        $column = Mockery::mock(Column::class);
        $column->shouldReceive('getPrecision')
            ->andReturn(5);
        $column->shouldReceive('getScale')
            ->andReturn(2);

        $column->shouldReceive('getUnsigned')
            ->andReturnFalse();

        $field = $decimalField->makeField($field, $column);
        $this->assertSame([5], $field['args']);
    }
}
