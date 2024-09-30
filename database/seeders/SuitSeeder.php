<?php

namespace Database\Seeders;

use App\Events\SuitCreated;
use Illuminate\Database\QueryException;
use Illuminate\Database\Seeder;
use Thunk\Verbs\Facades\Verbs;

class SuitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suits = [
            [
                'name' => 'Hearts',
                'symbol' => '♥',
                'color' => '#FF0000',
            ],
            [
                'name' => 'Diamonds',
                'symbol' => '♦',
                'color' => '#FF0000',
            ],
            [
                'name' => 'Clubs',
                'symbol' => '♣',
                'color' => '#000000',
            ],
            [
                'name' => 'Spades',
                'symbol' => '♠',
                'color' => '#000000',
            ],
        ];

        foreach ($suits as $suit) {
            try {
                SuitCreated::fire(name: $suit['name'], symbol: $suit['symbol'], color: $suit['color']);
            } catch (QueryException $e) {
                $this->command->getOutput()->writeln(
                    sprintf(
                        ' Duplicate suit detected:<fg=%s>%s %s %s</> - skipping',
                        $suit['color'],
                        $suit['symbol'],
                        $suit['name'],
                        $suit['symbol']
                    )
                );

                continue;
            }
        }
        Verbs::commit();
    }
}
