<?php

namespace Tests\Feature\User;

use App\Http\Requests\User\StoreRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreUserRequestTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * Set up operations
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->rules     = (new StoreRequest())->rules();
        $this->validator = $this->app['validator'];
    }

    /**
     * @param string $field
     * @param mixed $value
     * @return bool
     */
    protected function validateField(string $field, mixed $value): bool
    {
        return $this->validator->make(
            [$field => $value],
            [$field => $this->rules[$field]]
        )->passes();
    }

    /**
     * @return void
     */
    public function test_validates_body()
    {
        $this->assertTrue($this->validateField('name', 'Emil'));
        $this->assertTrue($this->validateField('name', str()->random(100)));
        $this->assertTrue($this->validateField('name', 'Emil Burganov'));
        $this->assertTrue($this->validateField('name', '123'));
        $this->assertFalse($this->validateField('name', str()->random(101)));
        $this->assertFalse($this->validateField('name', 'a'));
        $this->assertFalse($this->validateField('name', ''));
        $this->assertFalse($this->validateField('name', 1));
        $this->assertFalse($this->validateField('name', 'ab'));
    }
}
