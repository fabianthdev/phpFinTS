<?php

namespace Fhp\Action;

use Fhp\BaseAction;
use Fhp\Model\Account;
use Fhp\Protocol\BPD;
use Fhp\Protocol\UPD;
use Fhp\Segment\HIUPD\HIUPD;
use Fhp\Segment\HIUPD\HIUPDv4;
use Fhp\Segment\HIUPD\HIUPDv6;

class GetInformation extends BaseAction
{

    /** @var HIUPD[] */
    protected $hiupd;


    public static function create(): GetInformation {
        $result = new GetInformation();

        return $result;
    }

    protected function createRequest(BPD $bpd, ?UPD $upd)
    {
        if (!$upd) {
            throw new \InvalidArgumentException('UPD segment has to be present. Initiate a dialog first.');
        }
        $this->hiupd = $upd->hiupd;
        return [];
    }

    /**
     * @return Account[]
     */
    public function getInformation() {
        if ($this->hiupd == null) {
            return [];
        }

        /** @var Account[] */
        $accounts = [];

        foreach ($this->hiupd as $upd) {
            $account = new Account();
            
            if ($upd instanceof HIUPDv4) {
                $account_owners = array_filter([
                    $upd->name1,
                    $upd->name2
                ]);
                $account = new Account();
                $account
                    ->setAccountNumber($upd->kontoverbindung->kontonummer)
                    ->setCustomerId($upd->kundenId)
                    ->setCurrency($upd->kontowaehrung)
                    ->setAccountOwnerName(join(', ', $account_owners))
                    ->setAccountDescription($upd->kontoproduktbezeichnung);
            } else if ($upd instanceof HIUPDv6) {
                $account_owners = array_filter([
                    $upd->name1,
                    $upd->name2
                ]);
                
                $account = new Account();
                $account
                    ->setIban($upd->iban)
                    ->setAccountNumber($upd->kontoverbindung->kontonummer)
                    ->setCustomerId($upd->kundenId)
                    ->setCurrency($upd->kontowaehrung)
                    ->setAccountOwnerName(join(', ', $account_owners))
                    ->setAccountDescription($upd->kontoproduktbezeichnung)
                    ->setAccountType($upd->kontoart);
            }
            array_push($accounts, $account);
        }

        return $accounts;
    }
}