<?php

namespace Database\Seeders;

use App\Models\Quote;
use Illuminate\Database\Seeder;

class QuoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $quotes = [
            [
                'content' => 'La vie est ce qui arrive quand on est occupé à faire d\'autres plans.',
                'author' => 'John Lennon',
                'source' => 'Interview, 1980',
                'view_count' => 0
            ],
            [
                'content' => 'Le succès, c\'est d\'aller d\'échec en échec sans perdre son enthousiasme.',
                'author' => 'Winston Churchill',
                'source' => 'Discours',
                'view_count' => 0
            ],
            [
                'content' => 'La folie, c\'est de faire toujours la même chose et de s\'attendre à un résultat différent.',
                'author' => 'Albert Einstein',
                'source' => 'Publications scientifiques',
                'view_count' => 0
            ],
            [
                'content' => 'Ce n\'est pas parce que les choses sont difficiles que nous n\'osons pas, c\'est parce que nous n\'osons pas qu\'elles sont difficiles.',
                'author' => 'Sénèque',
                'source' => 'Lettres à Lucilius',
                'view_count' => 0
            ],
            [
                'content' => 'La simplicité est la sophistication suprême.',
                'author' => 'Leonardo da Vinci',
                'source' => 'Carnets',
                'view_count' => 0
            ],
            [
                'content' => 'Tout ce que je sais, c\'est que je ne sais rien.',
                'author' => 'Socrate',
                'source' => 'Dialogues de Platon',
                'view_count' => 0
            ],
            [
                'content' => 'Le bonheur n\'est pas une destination, mais une façon de voyager.',
                'author' => 'Ralph Waldo Emerson',
                'source' => 'Essais',
                'view_count' => 0
            ],
            [
                'content' => 'Soyez le changement que vous voulez voir dans le monde.',
                'author' => 'Mahatma Gandhi',
                'source' => 'Autobiographie',
                'view_count' => 0
            ],
            [
                'content' => 'La plus grande gloire n\'est pas de ne jamais tomber, mais de se relever à chaque chute.',
                'author' => 'Confucius',
                'source' => 'Analectes',
                'view_count' => 0
            ],
            [
                'content' => 'Ceux qui ne peuvent pas se souvenir du passé sont condamnés à le répéter.',
                'author' => 'George Santayana',
                'source' => 'La Vie de la Raison',
                'view_count' => 0
            ]
        ];

        foreach ($quotes as $quote) {
            Quote::create($quote);
        }
    }
}
