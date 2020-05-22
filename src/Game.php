<?php
declare(strict_types=1);
namespace App;

class Game
{
    private Player $one;
    private Player $two;
    // тут нужно дефолтное значение. иначе getScore() до addPlayers будет давать ошибку
    private array $score;
    private array $choices = ['rock','paper','scissors'];

    public function __construct()
    {
        // пустой конструктор не нужен
    }

    public function isTheFirstWinner(string $one_result, string $two_result): bool
    {

        /**
         * 1. каждый раз гонять array_search не очень оптимально. можно было бы просто ассоциативным массивом ['rock' => 0 ...]
         * или array_flip от $choices еще иметь. строить в конструкторе например
         *
         * 2. сначала у тебя выполняется (string) array_search($one_result, $this->choices), потом конкатенация
         * да и (string) тут и не нужен. при конкатенации у тебя и так строка получится
         */
        $win_index = (string) array_search($one_result, $this->choices) . array_search($two_result, $this->choices);

        return in_array($win_index, ['21', '10', '02']);
    }

    public function addPlayers(Player $one, Player $two): self
    {
        // этому место в конструкторе. не вызывая addPlayers будет ошибка при play
        $this->one = $one;
        $this->two = $two;

        // одинаковые name сломают стату. юзер с name draw сломает стату
        $this->score[$one->getName()] = 0;
        $this->score[$two->getName()] = 0;
        $this->score['draw'] = 0;

        return $this;
    }

    // тут бы int $number_of_games = 100 и return type self
    // public function play(int $number_of_games = 100): self
    public function play($number_of_games = 100): Game
    {
        // лишнее создания массива. имея $number_of_games 100500000 будет не очень оптимально. обычный fori или while подошел бы (while($number_of_games-- > 0) )
        foreach (range(1, $number_of_games) as $n) {
            $one_result = $this->one->makeChoice($this->choices);
            $two_result = $this->two->makeChoice($this->choices);

            if ( $one_result === $two_result ) {
                $this->score['draw']++;
            } else {
                $winner = $this->isTheFirstWinner($one_result, $two_result) ? $this->one : $this->two;
                // а если у тебя будут играть игроки с одинаковыми именами?
                $this->score[$winner->getName()]++;
            }
        }

        return $this;
    }

    // return type (public function getScore(): array)
    public function getScore()
    {
        $result = [];
        // зачем все это?
        // в итоге же получится $result такой-же как $this->score
        foreach ($this->score as $k => $v)
        {
            #$result[$k] = [$k=>$v];
            $result[$k] = $v;
            // закомментированный код не должен быть тут
            #print_r($result);
        }
        return $result;
    }
}
