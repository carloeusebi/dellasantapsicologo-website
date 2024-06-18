<?php


test('homepage', function () {
    $response = $this->get('/');
    $response
        ->assertStatus(200)
        ->assertViewIs('home')
        ->assertSeeText('Invia il messaggio');
});


test('chi sono', function () {
    $response = $this->get('/chi-sono');
    $response
        ->assertStatus(200)
        ->assertViewIs('chi-sono')
        ->assertSeeText('Invia il messaggio');
});

test('cosa aspettarsi', function () {
    $response = $this->get('/cosa-aspettarsi');
    $response
        ->assertStatus(200)
        ->assertViewIs('cosa-aspettarsi')
        ->assertSeeText('Invia il messaggio');
});

test('di cosa mi occupo', function () {
    $response = $this->get('/di-cosa-mi-occupo');
    $response
        ->assertStatus(200)
        ->assertViewIs('di-cosa-mi-occupo')
        ->assertSeeText('Invia il messaggio');
});

test('contatti', function () {
    $response = $this->get('/contatti');
    $response
        ->assertStatus(200)
        ->assertViewIs('contatti')
        ->assertSeeText('Invia il messaggio');
});
