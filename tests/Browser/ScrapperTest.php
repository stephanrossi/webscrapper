<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ScrapperTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $websites = [
            'govbr' => 'https://sso.acesso.gov.br/login',
            'ecac' => 'https://cav.receita.fazenda.gov.br/ecac',
            'ecacProc' => 'https://cav.receita.fazenda.gov.br/Servicos/ATSDR/Procuracoes.app/telaprincipal.asp'
        ];

        $this->browse(function (Browser $browser) use ($websites) {
            $browser->visit($websites['govbr'])
                ->pause(1000)
                ->waitFor('#cert-digital')
                ->clickAndWaitForReload('#cert-digital > a')
                ->pause(1000);

            $browser->visit($websites['ecac'])
                ->pause(1000)
                ->waitFor('#login-dados-certificado')
                ->clickAndWaitForReload('#login-dados-certificado > p:nth-child(2) > input[type=image]')
                ->pause(1000)
                ->click('#btn302 > a')
                ->pause(1000)
                ->waitFor('#containerServicos302')
                ->click('#containerServicos302 > div > ul > li > a')
                ->pause(627);

            $browser->visit($websites['ecacProc'])
                ->click('#consultaProcurador')
                ->pause(500)
                ->waitFor('#radioSituacaoProcuracaoAtivas')
                ->click('#radioSituacaoProcuracaoAtivas')
                ->pause(500)
                ->click('#botProcurador')
                ->pause(10000);
        });
    }
}
