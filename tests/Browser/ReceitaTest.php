<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ReceitaTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->pause(500)
                ->clickAndWaitForReload('#login-dados-certificado > p:nth-child(2) > input[type=image]')
                ->waitFor('#accountId')
                ->value('#accountId', '05976325610')
                ->clickAndWaitForReload('#login-button-panel > button')
                ->value('#password', 'Lndlmps1034@')
                ->click('#submit-button')
                ->pause(10000);
        });
    }
}
