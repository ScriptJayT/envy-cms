<?php

namespace App;


class QueerGradients
{
    private array $flags = [
        [
            'name' => 'Pride',
            'colours' => [ '#FF0018', '#FFA52C', '#FFD800', '#00811F', '#0000FF', '#86007D' ],
        ],
        // gender
        [
            'name' => 'Trans' , 
            'colours' => [ '#55cdfc', '#fff', '#f7a8b8' ],
        ],
        [
            'name' => 'Nonbinary' , 
            'colours' => [ '#FFD600', '#FFFFFF', '#9B59B6', '#000' ],
        ],
        [
            'name' => 'Agender', 
            'colours' => [ '#000000', '#808080', '#FFFFFF', '#B9BB3B' ],
        ],
        [
            'name' => 'Gender Fluid', 
            'colours' => [ '#FE75A5', '#FFFFFF', '#BB80B3', '#000000', '#4084D6' ],
        ], 
        [

            'name' => 'Gender Queer',
            'colours' => [ '#B57EDC', '#FFFFFF', '#4A8123' ],
        ],
        [
            'name' => 'Intersex', 
            'colours' => [ '#FFD800',  '#7B4397' ],
        ],
        [
            'name' => 'Androgenous', 
            'colours' => [ '#3D5AA9', '#FF66CC', '#FFFF00' ],
        ],
        // sexuality
        [
            'name' => 'Arro', 
            'colours' => [ '#008000', '#87D37C', '#fff', '#A0A0A0', '#000' ],
        ],
        [
            'name' => 'Ace', 
            'colours' => [ '#000', '#A0A0A0', '#fff', '#800080' ],
        ],
        [
            'name' => 'Arro-Ace', 
            'colours' => [ '#FF9900', '#FFCC33', '#fff', '#99CCFF', '#3366FF' ],
        ],
        [
            'name' => 'Lesbian', 
            'colours' => [ '#D62900', '#FFA500', '#fff', '#FF1493', '#A700AE' ],
        ],
        [
            'name' => 'Gay', 
            'colours' => [ '#4DB552', '#3DA3B5', '#64B6AC', '#FFFFFF', '#9FC0EB', '#A57DC4', '#6F5EA5' ],
        ],
        [
            'name' => 'Bi', 
            'colours' => [ '#D60270', '#9B4F96', '#0038A8' ],
        ],
        [
            'name' => 'Pan', 
            'colours' => [ '#FF1B8D', '#FFD500', '#00AEEF' ],
        ],
    ];

    private array $current_flag = [];

    private array $styles = [
        "aspect-ratio" => "146 / 39",
        "mask-size" => "contain",
        "mask-repeat" => "no-repeat",
        "mask-position" => "center",
    ];

    function __construct() {
        $this->choose_flag();
        $this->styles["mask-image"] = "url(". asset('media/icons/envy-gradient-logo.svg') . ")";
        $this->styles["background-image"] = "linear-gradient(to right, {$this->get_colours()} )";
    }

    private function choose_flag(){
        $this->current_flag = $this->flags[array_rand($this->flags)];
    }

    function get_label() {
        return "{$this->current_flag['name']} flag";
    }
    function get_colours() {
        return implode(', ', $this->current_flag['colours']);
    }

    function get_style() {
        $str = "";
        foreach ($this->styles as $_k => $_v) {
            $str .= $_k . ": " . $_v . "; ";
        }
        return trim($str);
    }
}