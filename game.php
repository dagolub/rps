<?php


abstract class Player
{
    private string $name = "no name";

    private array $variants = ['rock','paper','scissors'];


    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getHand()
    {
        return $this->variants[rand(0, 2)];
    }
}


class Player1 extends Player
{
}

class Player2 extends Player
{
}

function isWin($result1, $result2) {
    $result = $result1 .$result2;
    $wins = ['scissorspaper', 'paperrock', 'rockscissors'];
    if ( in_array($result, $wins)) {
        return true;
    }
    return false;
}

$player1 = new Player1();
$player1->setName('Mike');
$player2 = new Player2();
$player2->setName('Gorge');

echo "Playing " . $player1->getName() . " vs " . $player2->getName() . PHP_EOL;

$score = [$player1->getName()=>0, $player2->getName()=>0, 'draw'=>0];
for ($i =0; $i <100; $i++) {
    $result1 = $player1->getHand();
    $result2 = $player2->getHand();

    //echo $result1 , " " , $result2 , " " ;
    if ($result1 == $result2) {
        $score['draw']++;
        //echo "draw";
    } else {
        $winner = isWin($result1, $result2) ? $player1 : $player2;
        $score[$winner->getName()]++;
        //echo $winner->getName();
    }
    //echo PHP_EOL;
}

print_r($score);
