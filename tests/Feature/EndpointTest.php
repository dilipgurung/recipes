<?php

use Illuminate\Http\Response;

class EndpointTest extends TestCase
{
    /**
     * @test
     *
     * Test: GET /api/v1/invalid-resource
     */
    public function it_returns_a_404_status_if_the_endpoint_is_invalid()
    {
        $this->get('/api/v1/invalid-resource')
             ->seeJson([
                 'message' => 'Requested Endpoint Not Found'
             ])
             ->assertResponseStatus(Response::HTTP_NOT_FOUND);
    }
}