<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

use function PHPSTORM_META\type;

class TicketTest extends DuskTestCase
{

    /** @test */

    public function check_if_ticket_is_working()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->assertSee('Entrar')
                    ->type('email', 'matheus@gmail.com')
                    ->type('password', '123456789')
                    ->press('Entrar')
                    ->assertPathIs('/home')
                    ->assertSee('Novo Chamado')
                    ->assertVisible('#novoChamado')
                    ->visit(
                        $browser->attribute('#novoChamado', 'href')
                    )
                    ->assertPathIs('/ticket')
                    ->assertSee('Criar Chamado')
                    ->type('titulo', 'teste')
                    ->type('solicitacao', 'teste')
                    ->select('prioridade', 'Baixa')
                    ->type('solicitante', 'teste')
                    ->type('setor', 'teste')
                    ->press('Abrir Chamado');
        });
    }

}
