<?php

namespace Tests\Unit\Projects;

use App\Dtos\Projects\ProjectDataDTO;
use App\Models\Project;
use App\Repositories\ProjectRepository;
use App\Services\Projects\ProjectService;
use Mockery;
use PHPUnit\Framework\TestCase;

class ProjectTest extends TestCase
{
    /**
     * Ce test vérifie que le service ProjectService
     * appelle correctement la méthode store du repository.
      */
    // public function test_service_calls_repository_with_correct_data()
    // {
    //     // 1. Préparation des données via DTO
    //     $dto = new ProjectDataDTO(
    //         'Project Test',
    //         '2025-06-13',
    //         '2025-06-14'
    //     );

    //     // 2. Création d’un faux repository avec Mockery
    //     $mockRepo = Mockery::mock(ProjectRepository::class);

    //     // 3. On définit ce que l’on attend :
    //     // La méthode store() doit être appelée UNE FOIS avec ce DTO
    //     // Et doit retourner une instance de Project
    //     $mockRepo->shouldReceive('store')
    //              ->once()
    //              ->with($dto)
    //              ->andReturn(new Project([
    //                  'name' => $dto->name,
    //                  'start_date' => $dto->start_date,
    //                  'end_date' => $dto->end_date,
    //              ]));

    //     // 4. On instancie le service avec le mock
    //     $service = new ProjectService($mockRepo);

    //     // 5. On exécute la logique métier
    //     $result = $service->store($dto);

    //     // 6. On vérifie que le résultat est bien une instance de Project
    //     $this->assertInstanceOf(Project::class, $result);
    //     $this->assertEquals('Project Test', $result->name);
    // }

    // /**
    //  * Teardown pour s'assurer que Mockery nettoie ses mocks après chaque test.
    //  */
    // protected function tearDown(): void
    // {
    //     Mockery::close();
    //     parent::tearDown();
    // }
}
