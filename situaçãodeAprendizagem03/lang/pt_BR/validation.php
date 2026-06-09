 <?php

 return[

 'custom' => [
    'nome' => [
        'required' => 'O nome é obrigatório',
            'max' => 'O nome deve ter no máximo :max caracteres.'
        ],
        'num_setor' => [
            'required' => 'O número do setor é obrigatório.',
            'numeric' => 'O número do setor deve ser numérico',
            'max' => 'O número do setor não pode ser maior que :max.'
        ], 
        'quantidade' => [
            'required' => 'A quantidade do setor é obrigatório.',
            'numeric' => 'O número da quantidade deve ser númerica',
            'max' => 'A quantidade deve ter no máximo: max caracteres.'
        ],
        'valor' => [
            'required' => ' O valor é obrigatório.',
            'numeric' => 'O preço do valor deve ser númerico',
        ]
    ], 

 ];