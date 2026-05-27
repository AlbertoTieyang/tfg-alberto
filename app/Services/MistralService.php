<?php

namespace App\Services;

use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

class MistralService
{
    /**
     * @throws RequestException
     */
    public function generateDishDescription(string $dishName): string
    {
        $response = Http::withToken(config('services.mistral.key'))
            ->acceptJson()
            ->timeout(30)
            ->post('https://api.mistral.ai/v1/chat/completions', [
                'model' => config('services.mistral.model'),
                'temperature' => 0.7,
                'max_tokens' => 120,
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => 'Eres redactor de cartas para un bar restaurante espanol. Escribe descripciones apetecibles, claras y breves. No inventes ingredientes muy concretos si no aparecen en el nombre del plato.',
                    ],
                    [
                        'role' => 'user',
                        'content' => "Genera una descripcion en espanol para el plato: {$dishName}. Maximo 2 frases. No uses comillas.",
                    ],
                ],
            ])
            ->throw()
            ->json();

        return trim($response['choices'][0]['message']['content'] ?? '');
    }
}
