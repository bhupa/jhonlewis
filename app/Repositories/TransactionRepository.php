<?php
namespace App\Repositories;


use App\Models\Transaction;

Class TransactionRepository extends BaseRepository {

    public function __construct(Transaction $transaction){

        $this->model = $transaction;

    }

}
