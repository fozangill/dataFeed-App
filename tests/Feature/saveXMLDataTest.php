<?php

it('Read XML file and Save data into DB', function () {
    $this->artisan('datafeed')
        ->assertSuccessful()
        ->assertExitCode(0);

});

