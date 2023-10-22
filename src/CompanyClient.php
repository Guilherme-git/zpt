<?php

namespace Department;

require_once "./Company.php";

use Company\Company;

class CompanyClient extends Company
{
    private int $registration;

    public function __construct(int $id,int $registration){
        parent::__construct($id);
        $this->registration = $registration;
    }

    public function greet() {
        echo "Bem vindo, sua Company  é ".$this->getId() ." e seu Registration é {$this->registration}";
    }
}

$companyCliente = new CompanyClient(678,2);
$companyCliente->greet();