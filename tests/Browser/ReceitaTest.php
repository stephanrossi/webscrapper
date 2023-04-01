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

        $websites = [
            'govbr' => 'https://sso.acesso.gov.br/',
            'ecac' => 'https://cav.receita.fazenda.gov.br/autenticacao/login'
        ];

        $this->browse(function (Browser $browser) use ($websites) {
            $browser->visit($websites['govbr'])
                ->pause(1500)
                ->waitFor('#accountId')
                ->typeSlowly('#accountId', '05976325610')
                ->clickAndWaitForReload('#login-button-panel > button')
                ->typeSlowly('#password', 'Lndlmps1034@')
                ->pause(150)
                ->click('#submit-button')
                ->waitFor('#login-password')
                ->pause(500);
            $sitekey = $browser->attribute('#login-password > div.button-panel > div', 'data-sitekey');
            echo "sitekey: " . $sitekey;

            die;
            $browser->visit($websites['ecac'])
                ->pause(1500)
                ->waitFor('#login-dados-certificado')
                ->clickAndWaitForReload('#login-dados-certificado > p:nth-child(2) > input[type=image]')
                ->waitFor('#accountId')
                ->typeSlowly('#accountId', '05976325610')
                ->clickAndWaitForReload('#login-button-panel > button')
                ->typeSlowly('#password', 'Lndlmps1034@')
                ->pause(150)
                ->click('#submit-button')
                ->pause(10000);
        });
    }
}
