<?php
/** @noinspection PhpIllegalPsrClassPathInspection */
/** @noinspection PhpUnused */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Tests\KitLoong\Support\CheckLaravelVersion;

class FromCreateAllColumnsTable extends Migration
{
    use CheckLaravelVersion;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_columns', function (Blueprint $table) {
            $table->bigInteger('bigInteger');
            $table->bigInteger('bigInteger_default')->default(1080);
            $table->binary('binary');
            $table->boolean('boolean');
            $table->boolean('boolean_default_false')->default(0);
            $table->boolean('boolean_default_true')->default(1);
            $table->boolean('boolean_unsigned')->unsigned();
            $table->char('char');
            $table->char('char_255', 255);
            $table->char('char_100', 100);
            $table->char('char_default')->default('default');
            $table->date('date');
            $table->date('date_default')->default('2020-10-08');
            $table->dateTime('dateTime');
            $table->dateTime('dateTime_0', 0);
            $table->dateTime('dateTime_2', 2);
            $table->dateTime('dateTime_default', 2)->default('2020-10-08 10:20:30');
            $table->dateTimeTz('dateTimeTz');
            $table->dateTimeTz('dateTimeTz_0', 0);
            $table->dateTimeTz('dateTimeTz_2', 2);
            $table->dateTimeTz('dateTimeTz_default')->default('2020-10-08 10:20:30');
            $table->decimal('decimal');
            $table->decimal('decimal_82', 8, 2);
            $table->decimal('decimal_53', 5, 3);
            $table->decimal('decimal_default')->default(10.8);
            $table->double('double');
            $table->double('double_82', 8, 2);
            $table->double('double_53', 5, 3);
            $table->double('double_default')->default(10.8);
            $table->enum('enum', ['easy', 'hard']);
            $table->enum('enum_default', ['easy', 'hard'])->default('easy');
            $table->float('float');
            $table->float('float_82', 8, 2);
            $table->float('float_53', 5, 3);
            $table->float('float_default')->default(10.8);
            $table->geometry('geometry');
            $table->geometryCollection('geometryCollection');
            $table->integer('integer');
            $table->integer('integer_default')->default(1080);
            $table->ipAddress('ipAddress');
            $table->ipAddress('ipAddress_default')->default('10.0.0.8');
            $table->json('json');
            $table->jsonb('jsonb');
            $table->lineString('lineString');
            $table->longText('longText');
            $table->mediumInteger('mediumInteger');
            $table->mediumInteger('mediumInteger_default')->default(1080);
            $table->mediumText('mediumText');
            $table->multiLineString('multiLineString');
            $table->multiPoint('multiPoint');
            $table->multiPolygon('multiPolygon');
            $table->point('point');
            $table->polygon('polygon');
            $table->smallInteger('smallInteger');
            $table->smallInteger('smallInteger_default')->default(1080);
            $table->string('string');
            $table->string('string_255', 255);
            $table->string('string_100', 100);
            $table->string('default_single_quote')->default('string with \" !@#$%^^&*()_+ \\\' quotes');
            $table->string('comment_double_quote')->comment("string with \" ' quotes");
            $table->text('text');
            $table->time('time');
            $table->time('time_0', 0);
            $table->time('time_2', 2);
            $table->time('time_default')->default('10:20:30');
            $table->timeTz('timeTz');
            $table->timeTz('timeTz_0', 0);
            $table->timeTz('timeTz_2', 2);
            $table->timeTz('timeTz_default')->default('10:20:30');
            $table->timestamp('timestamp');
            $table->timestamp('timestamp_useCurrent')->useCurrent();
            $table->timestamp('timestamp_useCurrentOnUpdate')->useCurrent()->useCurrentOnUpdate();
            $table->timestamp('timestamp_0', 0)->nullable();
            $table->timestamp('timestamp_2', 2)->nullable();
            $table->timestamp('timestamp_default')->default('2020-10-08 10:20:30');
            $table->timestampTz('timestampTz')->nullable();
            $table->timestampTz('timestampTz_0', 0)->nullable();
            $table->timestampTz('timestampTz_2', 2)->nullable();
            $table->timestampTz('timestampTz_default')->default('2020-10-08 10:20:30');
            $table->tinyInteger('tinyInteger');
            $table->tinyInteger('tinyInteger_default')->default(10);
            $table->unsignedBigInteger('unsignedBigInteger');
            $table->decimal('unsignedDecimal')->unsigned();
            $table->double('unsignedDouble')->unsigned();
            $table->float('unsignedFloat')->unsigned();
            $table->unsignedInteger('unsignedInteger');
            $table->unsignedMediumInteger('unsignedMediumInteger');
            $table->unsignedSmallInteger('unsignedSmallInteger');
            $table->unsignedTinyInteger('unsignedTinyInteger');
            $table->year('year')->default(2020);

            if (config('database.default') === 'mysql') {
                $table->char('char_charset')->charset('utf8');
                $table->char('char_collation')->collation('utf8_unicode_ci');
                $table->enum('enum_charset', ['easy', 'hard'])->charset('utf8');
                $table->enum('enum_collation', ['easy', 'hard'])->collation('utf8_unicode_ci');
                $table->longText('longText_charset')->charset('utf8');
                $table->longText('longText_collation')->collation('utf8_unicode_ci');
                $table->mediumText('mediumText_charset')->charset('utf8');
                $table->mediumText('mediumText_collation')->collation('utf8_unicode_ci');
                $table->text('text_charset')->charset('utf8');
                $table->text('text_collation')->collation('utf8_unicode_ci');

                if ($this->atLeastLaravel5Dot8()) {
                    $table->set('set', ['strawberry', 'vanilla']);
                    $table->set('set_default', ['strawberry', 'vanilla'])->default('strawberry');
                    $table->set('set_charset', ['strawberry', 'vanilla'])->charset('utf8');
                    $table->set('set_collation', ['strawberry', 'vanilla'])->collation('utf8_unicode_ci');
                }

                $table->string('string_charset')->charset('utf8');
                $table->string('string_collation')->collation('utf8_unicode_ci');
            }

            if (config('database.default') !== 'pgsql') {
                $table->macAddress('macAddress');
                $table->macAddress('macAddress_default')->default('10.0.0.8');
                $table->uuid('uuid')->default('uuid');
            }

            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('all_columns');
    }
}
