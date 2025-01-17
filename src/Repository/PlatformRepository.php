<?php declare(strict_types=1);

namespace App\Repository;

class PlatformRepository implements PlatformRepositoryInterface
{
    private PlatformBscRepository $bscRepository;
    private PlatformPolygonRepository $platformPolygonRepository;
    private string $chain;

    public function __construct(
        PlatformBscRepository $bscRepository,
        PlatformPolygonRepository $platformPolygonRepository,
        string $chain
    ) {
        $this->bscRepository = $bscRepository;
        $this->platformPolygonRepository = $platformPolygonRepository;
        $this->chain = $chain;
    }

    public function getPlatform(string $id): array
    {
        switch ($this->chain) {
            case 'bsc':
                return $this->bscRepository->getPlatform($id);
            case 'polygon':
                return $this->platformPolygonRepository->getPlatform($id);
            default:
                throw new \InvalidArgumentException('Invalid platform');
        }
    }

    public function getPlatformChunks(): array
    {
        switch ($this->chain) {
            case 'bsc':
                return $this->bscRepository->getPlatformChunks();
            case 'polygon':
                return $this->platformPolygonRepository->getPlatformChunks();
            default:
                throw new \InvalidArgumentException('Invalid platform');
        }
    }

    public function getPlatforms(): array
    {
        switch ($this->chain) {
            case 'bsc':
                return $this->bscRepository->getPlatforms();
            case 'polygon':
                return $this->platformPolygonRepository->getPlatforms();
            default:
                throw new \InvalidArgumentException('Invalid platform');
        }
    }
}