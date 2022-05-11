<?php

namespace App\Services\User;

use App\Models\User;
use Illuminate\Support\Facades\Log;

class BalanceService
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function addMoney($amount)
    {
        try {
            $this->user->wallet_balance += $amount;
            $this->balanceRefilling($amount);
        } catch (\PDOException $exception) {
            Log::channel('monetization')->info('BalanceService:addMoney', ['error' => $exception->getMessage()]);
            return false;
        }

        return true;
    }

    public function subtractMoney($amount)
    {

    }

    protected function balanceRefilling($amount):void
    {
        $this->user->wallet_total_refilled += $amount;
        $this->user->save();
    }

    protected function balanceWithdrawing():void
    {

    }

}
