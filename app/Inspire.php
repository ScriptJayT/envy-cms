<?php

namespace App;

use Illuminate\Support\Collection;

class Inspire
{


    private $quotes = [
        [
            'quote' => "Nonbinary people are gods.",
            'person' => "Jammidodger",
            'tags' => ['pride', 'enby', 'youtuber'],
        ],
        [
            'quote' => "Nonbinary culture is running as far as possible from your agab and then approaching it cautiously from the other side.",
            'person' => "NN",
            'tags' => ['pride', 'enby'],
        ],
        [
            'quote' => "The difference between science and screwing around is writing it down.",
            'person' => "Adam Savage",
            'tags' => ['scientist', 'tinkerer'],
        ],
        [
            'quote' => "The greatest problem in communication is the illusion that it has been achieved.",
            'person' => "William H. Whyte",
            'tags' => ['language'],
        ],
        [
            'quote' => "Don/'t name your children after fictional characters. /n If they\'re transgender enough, they/'ll do it themselves.",
            'person' => "NN",
            'tags' => ['pride', 'trans'],
        ],
        [
            'quote' => "You must be the change you wish to see in the world.",
            'person' => "Mahatma Gandhi",
            'tags' => ['religious'],
        ],
        [
            'quote' => "Always remember that you are absolutely unique. Just like everyone else.",
            'person' => "Margaret Mead",
            'tags' => [],
        ],
        [
            'quote' => "The biggest battle is the war against ignorance.",
            'person' => "Mustafa Kemal Atatürk",
            'tags' => [],
        ],
        [
            'quote' => "Nothing in life is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less.",
            'person' => "Marie Curie",
            'tags' => ['scientist'],
        ],
        [
            'quote' => "The best way to take care of the future is to take care of the present moment.",
            'person' => "Thich Nhat Hanh",
            'tags' => [],
        ],
        [
            'quote' => "Life is available only in the present moment.",
            'person' => "Thich Nhat Hanh",
            'tags' => [],
        ],
        [
            'quote' => "Breathing in, I calm body and mind. Breathing out, I smile.",
            'person' => "Thich Nhat Hanh",
            'tags' => [],
        ],
        [
            'quote' => "Because you are alive, everything is possible.",
            'person' => "Thich Nhat Hanh",
            'tags' => [],
        ],
        [
            'quote' => "When there is no desire, all things are at peace.",
            'person' => "Laozi",
            'tags' => [],
        ],
        [
            'quote' => "Well begun is half done.",
            'person' => "Aristotle",
            'tags' => ['Greek', 'philosopher'],
        ],
        [
            'quote' => "Waste no more time arguing what a good man should be, be one.",
            'person' => "Marcus Aurelius",
            'tags' => ['Roman', 'emperor'],
        ],
        [
            'quote' => "Very little is needed to make a happy life.",
            'person' => "Marcus Aurelius",
            'tags' => ['Roman', 'emperor'],
        ],
        [
            'quote' => "The whole future lies in uncertainty: live immediately.",
            'person' => "Seneca",
            'tags' => ['Roman', 'philosopher'],
        ],
        [
            'quote' => "Simplicity is the ultimate sophistication.",
            'person' => "Leonardo da Vinci",
            'tags' => ['scientist', 'artisan'],
        ],
        [
            'quote' => "Walk as if you are kissing the Earth with your feet.",
            'person' => "Thich Nhat Hanh",
            'tags' => [],
        ],
        [
            'quote' => "The only way to do great work is to love what you do.",
            'person' => "Steve Jobs",
            'tags' => ['IT'],
        ],
        [
            'quote' => "Smile, breathe, and go slowly.",
            'person' => "Thich Nhat Hanh",
            'tags' => [],
        ],
        [
            'quote' => "Simplicity is the essence of happiness.",
            'person' => "Cedric Bledsoe",
            'tags' => [],
        ],
        [
            'quote' => "Simplicity is the consequence of refined emotions.",
            'person' => "Jean D\'Alembert",
            'tags' => [],
        ],
        [
            'quote' => "Simplicity is an acquired taste.",
            'person' => "Katharine Gerould",
            'tags' => [],
        ],
        [
            'quote' => "People find pleasure in different ways. I find it in keeping my mind clear.",
            'person' => "Marcus Aurelius",
            'tags' => ['Roman', 'emperor'],
        ],
        [
            'quote' => "Order your soul. Reduce your wants.",
            'person' => "Augustine",
            'tags' => [],
        ],
        [
            'quote' => "No surplus words or unnecessary actions.",
            'person' => "Marcus Aurelius",
            'tags' => ['Roman', 'emperor', 'language'],
        ],
        [
            'quote' => "Live as if you were to die tomorrow. Learn as if you were to live forever.",
            'person' => "Mahatma Gandhi",
            'tags' => ['religious'],
        ],
        [
            'quote' => "Let all your things have their places; let each part of your business have its time.",
            'person' => "Benjamin Franklin",
            'tags' => ['US', 'president'],
        ],
        [
            'quote' => "Knowing is not enough; we must apply. Being willing is not enough; we must do.",
            'person' => "Leonardo da Vinci",
            'tags' => ['scientist', 'artisan'],
        ],
        [
            'quote' => "It is quality rather than quantity that matters.",
            'person' => "Lucius Annaeus Seneca",
            'tags' => ['Roman', 'philosopher'],
        ],
        [
            'quote' => "It is not the man who has too little, but the man who craves more, that is poor.",
            'person' => "Seneca",
            'tags' => ['Roman', 'philosopher'],
        ],
        [
            'quote' => "It is never too late to be what you might have been.",
            'person' => "George Eliot",
            'tags' => [],
        ],
        [
            'quote' => "If you do not have a consistent goal in life, you can not live it in a consistent way.",
            'person' => "Marcus Aurelius",
            'tags' => ['Roman','emperor'],
        ],
        [
            'quote' => "I have not failed. I\'ve just found 10,000 ways that won\'t work.",
            'person' => "Thomas Edison",
            'tags' => ['scientist'],
        ],
        [
            'quote' => "I begin to speak only when I am certain what I will say is not better left unsaid.",
            'person' => "Cato the Younger",
            'tags' => ['language'],
        ],
        [
            'quote' => "He who is contented is rich.",
            'person' => "Laozi",
            'tags' => [],
        ],
        [
            'quote' => "Happiness is not something readymade. It comes from your own actions.",
            'person' => "Dalai Lama",
            'tags' => ['religious'],
        ],
        [
            'quote' => "Do what you can, with what you have, where you are.",
            'person' => "Theodore Roosevelt",
            'tags' => ['US', 'president'],
        ],
        [
            'quote' => "Nothing worth having comes easy.",
            'person' => "Theodore Roosevelt",
            'tags' => ['US', 'president'],
        ],
        [
            'quote' => "Be present above all else.",
            'person' => "Naval Ravikant",
            'tags' => [],
        ],
        [
            'quote' => "An unexamined life is not worth living.",
            'person' => "Socrates",
            'tags' => ['Greek', 'philosopher'],
        ],
        [
            'quote' => "Act only according to that maxim whereby you can, at the same time, will that it should become a universal law.",
            'person' => "Immanuel Kant",
            'tags' => ['humanist'],
        ]
    ];

    public $selection = [];
    public $selected = NULL;

    public function __construct()
    {
        $this->selection = Collection::make($this->quotes);
    }

    public function have_tag($_tag) {
        $this->selection = $this->selection->filter( fn($_q) => in_array($_tag, $_q['tags']) );

        return $this;
    }

    public function pick($_nr = null){
        if($_nr && $_nr > 1)
            $this->selected = $this->selection->random($_nr);
        else 
            $this->selected = [$this->selection->random()];
        return $this;
    }

    public function quote(): string {
        if(!$this->selected) return '';

        $html = '';

        foreach ($this->selected as $_ => $_q) {
            $html.="<quote>{$_q['quote']}</quote><cite>{$_q['person']}</cite>";
        }

        $html = str_replace('/n', '<br>', $html);
        $html = str_replace('\\', '', $html);

        return $html;
    }

    public function get() {
        return $this->selected;
    }
}
