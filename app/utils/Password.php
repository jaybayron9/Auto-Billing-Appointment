<?php 

namespace Password; 
use Validation\Valid;

class Password {
    public string $lenght;
    public string $small;
    public string $big;
    public string $number;
    public string $symbol;
    public array $err = [];

    public function set_error() {
        $this->err[] = $this->lenght = Valid::has_min_lenght($_POST['password']) ? '8 Characters' : '';
        $this->err[] = $this->small = Valid::has_small_letters($_POST['password']) ? 'Small Letter' : '';
        $this->err[] = $this->big = Valid::has_big_letters($_POST['password']) ? 'Big Letter' : '';
        $this->err[] = $this->number = Valid::has_numbers($_POST['password']) ? 'Number' : '';
        $this->err[] = $this->symbol = Valid::has_special_characters($_POST['password']) ? 'Special Character' : '';
    }

    public function get_error() { 
        return json_encode([
            'status' => 400,
            'pass_lenght' => $this->err[0],
            'pass_small' => $this->err[1],
            'pass_big' =>  $this->err[2],
            'pass_number' => $this->err[3], 
            'pass_symbol' => $this->err[4], 
        ]); 
    }
}