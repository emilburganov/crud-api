<?php

namespace Tests\Feature\Post;

use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StorePostRequestTest extends TestCase
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
    public function test_validates_user_id()
    {
        $this->assertTrue($this->validateField('user_id', User::factory()->create()->id));
        $this->assertTrue($this->validateField('user_id', (string)User::factory()->create()->id));
        $this->assertFalse($this->validateField('user_id', ''));
        $this->assertFalse($this->validateField('user_id', null));
        $this->assertFalse($this->validateField('user_id', true));
    }

    /**
     * @return void
     */
    public function test_validates_body()
    {
        $this->assertTrue($this->validateField('body', 'Hello, World!'));
        $this->assertTrue($this->validateField('body', str()->random(50000)));
        $this->assertTrue($this->validateField('body', '1234567890'));
        $this->assertTrue($this->validateField('body', '1234567890'));
        $this->assertFalse($this->validateField('body', str()->random(50001)));
        $this->assertFalse($this->validateField('body', 'a'));
        $this->assertFalse($this->validateField('body', '123456789'));
        $this->assertFalse($this->validateField('body', ''));
        $this->assertFalse($this->validateField('body', 1));
        $this->assertFalse($this->validateField('body', 'ab'));
    }
}
