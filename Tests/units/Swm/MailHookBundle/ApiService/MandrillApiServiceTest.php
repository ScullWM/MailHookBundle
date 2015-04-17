<?php

use mageekguy\atoum as Units;
use Swm\Bundle\MailHookBundle\ApiService\MandrillApiService as TestedModel;

class MandrillApiServiceTest extends Units\Test
{
    public function testBind()
    {
        $this->if($object = new TestedModel())
            ->array($object->bind())->isEmpty()
        ;
    }
}